<?php
class Healthy_Model extends Super_Model {
    
    public $weightUnitOpt = array('kilograms' => '公斤/千克', 'jin' => '斤',
                                  'pounds'    => '磅');
    public $maintenance = array('kilograms' => 39.6, 'jin' => 19.8,
                                'pounds'    => 18);
    
    function __construct() {
        parent::__construct();
    }
    
    function getFoodOpt() {
        $sql = 'select food.id, food.name from food left join diets ' .
            'on food.id = diets.foodId group by (foodId) ' .
            'order by sum(copies) desc';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);        
    }
    
    function getFoodDataByName($name) {
        $sql = 'SELECT id, calorie, price FROM food WHERE name = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($name));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function checkFoodIdExist($foodId) {
        $sql = 'SELECT id FROM food WHERE id = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($foodId));
        $ret = count($sth->fetchAll(PDO::FETCH_ASSOC)) > 0 ? true : false;
        return $ret;
    }
    
    function getStatistic() {
        $result = array('weight'    => false,
                        'calPerDay' => 0,
                        'workout'   => 0,
                        'intake'    => 0.0,
                        'dietItems' => array()
        );
        
        $sql = 'SELECT val, unit FROM weight ' .
            'WHERE date(datetime) = current_date() ' .
            'ORDER BY datetime DESC limit 1';        
        $result['weight'] = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($result['weight'] !== false) {
            $result['calPerDay'] = round($result['weight']['val'], 2) *
                    round($this->maintenance[$result['weight']['unit']], 2);
            $sql = 'SELECT sum(copies) as copies, name, calorie FROM ' .
                'diets LEFT JOIN food ON diets.foodId = food.id ' .
                'WHERE date(diets.datetime) = current_date() ' .
                'GROUP BY(food.name) ORDER BY diets.datetime DESC';
            $dietItems = '';
            foreach ($this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $v) {
                $result['intake'] +=
                        round($v['calorie'], 2) * intval($v['copies']);
                $result['dietItems'][] =
                        array($v['name'],
                              "{$v['copies']}份, 热量{$v['calorie']}Cal/份."
                        );
            }

            $sql = 'SELECT calorie FROM workout ' .
                'WHERE date(datetime) = current_date()';
            foreach ($this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $v) {
                $result['workout'] += $v['calorie'];
            }
        }
        return $result;
    }
    
    // insert new weight record into db
    function updateWeight($weight, $unit) {
        $sql = "INSERT INTO weight VALUES(null, $weight, '$unit', default, 1)";
        $affectedRow = $this->db->exec($sql);
        if ($affectedRow !== 1) {
            throw new Exception('更新体重数据失败!');
        }
        return true;
    }
    
    function addWorkout($data) {
        $sql = 'INSERT INTO workout(userId, calorie, type, datetime) ' .
                'VALUES(1, ?, ?, DEFAULT)';
        $sth = $this->db->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            throw new Exception('添加信息失败');
        }
        return true;
    }
    
    function updateFoodInfo($calorie, $price, $id) {
        $sql = "UPDATE food SET calorie = $calorie, price = $price " .
            "WHERE id = $id";
        $affectedRow = $this->db->exec($sql);
        if ($affectedRow !== 1) {
            echo $affectedRow;
            throw new Exception("更新食物[{$name}]时失败!");
        }
        return true;
    }
    
    
    function addNewFood($name, $calorie, $price) {
        $sql = "INSERT INTO food VALUES(NULL, ?, ?, ?)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array($name, $calorie, $price));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('录入新食品数据失败!');
        }
        return $this->db->lastInsertId();
    }
    
    function addNewDiets($data) {
        $sql = 'INSERT INTO diets(foodId, copies, datetime) VALUES(?, ?, DEFAULT)';
        $sth = $this->db->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            $errorInfo = $sth->errorInfo();
            throw new Exception($errorInfo[2]);
        }
        return true;
    }
}