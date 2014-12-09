<?php
class Healthy_Model {
    
    public $weightUnitOpt = array('kilograms' => '公斤/千克', 'jin' => '斤',
                                  'pounds'    => '磅');
    public $maintenance = array('kilograms' => 39.6, 'jin' => 19.8,
                                'pounds'    => 18);
    
    function __contruct() {        
        
    }
    
    function getdbh() {
        return new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
    }
    
    function getFoodOpt() {
        $dbh = $this->getdbh();
        $sql = 'SELECT diets.foodId AS id, food.name AS name ' .
            'FROM diets inner join food on diets.foodId = food.id ' .
            'GROUP BY(diets.foodId) ORDER BY sum(diets.copies) DESC';
        return $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);        
    }
    
    function getFoodDataByName($name) {
        $dbh = $this->getdbh();
        $sql = 'SELECT id, calorie, price FROM food WHERE name = ?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($name));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function checkFoodIdExist($id) {
        $dbh = $this->getdbh();
        $sql = 'SELECT id FROM food WHERE id = ?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($foodId));
        $ret = !empty($sth->fetchAll(PDO::FETCH_ASSOC));
        return $ret;
    }
    
    function getStatistic() {
        $dbh = $this->getdbh();
        $sql = 'SELECT val, unit FROM weight ' .
            'WHERE date(datetime) = current_date() ' .
            'ORDER BY datetime DESC limit 1';        
        $weight = $dbh->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($weight !== false) {
            $calPerDay = round($weight['val'], 2) * round($this->maintenance[$weight['unit']], 2);
            $sql = 'SELECT sum(copies) as copies, name, calorie FROM ' .
                'diets LEFT JOIN food ON diets.foodId = food.id ' .
                'WHERE date(diets.datetime) = current_date() GROUP BY(food.name) ';
            $intake = 0.0;
            $eatFoodNameStr = '';
            foreach ($dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $v) {
                $intake += round($v['calorie'], 2) * intval($v['copies']);
                $eatFoodNameStr .= "{$v['copies']}份[{$v['name']}],";
            }
            $eatFoodNameStr = substr_replace($eatFoodNameStr, '.' , -1, 1);

            $sql = 'SELECT calorie FROM workout WHERE date(datetime) = current_date()';
            $workout = 0;
            foreach ($dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $v) {
                $workout += $v['calorie'];
            }
        }
        return array('weight'         => $weight,
                     'calPerDay'      => $calPerDay,
                     'workout'        => $workout,
                     'intake'         => $intake,
                     'eatFoodNameStr' => $eatFoodNameStr);
    }
    
    // insert new weight record into db
    function updateWeight($weight, $unit) {
        $dbh = $this->getdbh();        
        $sql = "INSERT INTO weight VALUES(null, $weight, '$unit', default, 1)";
        $affectedRow = $dbh->exec($sql);
        if ($affectedRow !== 1) {
            throw new Exception('更新体重数据失败!');
        }
        return true;
    }
    
    function addWorkout($data) {
        $dbh = $this->getdbh();    
        $sql = 'INSERT INTO workout(userId, calorie, type, datetime) ' .
                'VALUES(1, ?, ?, DEFAULT)';
        $sth = $dbh->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            throw new Exception('添加信息失败');
        }
        return true;
    }
    
    function updateFoodInfo($calorie, $price, $id) {
        $dbh = $this->getdbh(); 
        $sql = "UPDATE food SET calorie = $calorie, price = $price " .
            "WHERE id = $id";
        $affectedRow = $dbh->exec($sql);
        if ($affectedRow !== 1) {
            echo $affectedRow;
            throw new Exception("更新食物[{$name}]时失败!");
        }
        return true;
    }
    
    
    function addNewFood($name, $calorie, $price) {
        $dbh = $this->getdbh();  
        $sql = "INSERT INTO food VALUES(NULL, ?, ?, ?)";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($name, $calorie, $price));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('录入新食品数据失败!');
        }
        return $dbh->lastInsertId();
    }
    
    function addNewDiets($data) {
        $dbh = $this->getdbh();    
        $sql = 'INSERT INTO diets(foodId, copies, datetime) VALUES(?, ?, DEFAULT)';
        $sth = $dbh->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            $errorInfo = $sth->errorInfo();
            throw new Exception($errorInfo[2]);
        }
        return true;
    }
}

