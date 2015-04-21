<?php
class Healthy_Controller extends Super_Controller {

    function index() {
       $this->show();
    }
    
    private function getHeight() {
        $this->session = &load_class('session');      
        $id = $this->session->get('id');
        $this->load->model('user', 'u');
        $height = $this->u->getHeight($id);        
        return $height;
    }
    
    private function getBmi($height, $weight) {
        if (!is_numeric($height) || !is_numeric($weight)) {
            return false;
        }
        $bmi = round($weight/($height*$height/10000), 1);
        $level = '无';
        if ($bmi >= 32) {
            $level = '超过32, 非常肥胖';
        } else if ($bmi >= 28) {
            $level = '超过28, 肥胖';
        } else if ($bmi >= 25) {
            $level = '超过25, 过重';
        } else if ($bmi >= 20) {
            $level = '超过20, 适中';
        } else if ($bmi >= 18.5) {
            $level = '超过18.5, 正常'; 
        } else {
            $level = '小于18.5, 过轻';
        }
        return array('val' => $bmi, 'level' => $level);
    }    
    
    function show() {
        $this->load->model('healthy', 'm');
        $data = $this->m->getStatistic();
        $data['height'] = $this->getHeight();
        $data['bmi']    = $this->getBmi($data['height'], $data['weight']['val']);
        $weightUnitOpt = $this->m->weightUnitOpt;
        $maintenance   = $this->m->maintenance;
        $foodOpt       = $this->m->getFoodOpt();
        require('views/healthy_view.php'); 
    }
    
    function showStatistics() {
        $this->load->model('healthy', 'm');
        $data = $this->m->getStatistic();
        $data['height'] = $this->getHeight();
        $data['bmi']    = $this->getBmi($data['height'], $data['weight']['val']);
        $weightUnitOpt = $this->m->weightUnitOpt;
        require('views/healthy_statistics_view.php'); 
    }
    
    // recode body weight daily
    function updateWeight() {
        if (isset($_POST['weight']) && isset($_POST['unit'])) {
            $weight = $_POST['weight'];
            $unit   = $_POST['unit'];

            //validation
            $weight = floatval($weight);
            if (!($weight > 0 && $weight < 1000)) {
                throw new Exception('输入的重量范围不在0到1000之间!');
            }
            
            $this->load->model('healthy', 'm');
            if (false === array_key_exists($unit, $this->m->weightUnitOpt)) {
                throw new Exception('输入的重量单位错误!');
            }
            $this->session = &load_class('session');
            if ($this->m->updateWeight($weight, $unit) === true) {
                echo json_encode(array('status' => 0));
            }
        }
    }
    
    // record food`s calorie 
    function updateDiet() {
        $this->load->model('healthy', 'm');
        if (isset($_POST['dietType'])) {
            $dietType = $_POST['dietType'];
            $foodId   = 0;
            $copies   = intval($_POST['copies']);

            // validation
            if ($copies < 1) {
                throw new Exception('份数值不为整数或小于1!');
            }
            if ($dietType === 'new') {
                $calorie = intval($_POST['calorie']);
                $name    = $_POST['foodName'];
                $price   = floatval($_POST['price']);

                if (strlen(utf8_decode($name)) > 15) {  
                    throw new Exception('输入的食物名称长度超过15个字!');
                }
                if ($calorie < 1) {
                    throw new Exception('输入的卡路里值不为整数或小于1!');
                }
                if ($price <= 0) {
                    throw new Exception('价格低于0元!');
                }
                $price = round($price, 2);

                // valid whether the new food exists in db or not
                $ret = $this->m->getFoodDataByName($name);                        

                if (!empty($ret) && (intval($ret['calorie']) !== $calorie ||
                    round($ret['price'], 2) !== $price)) {
                    // update price or/and calorie when the new food exists in db.
                    $id  = $ret['id'];
                    $this->m->updateFoodInfo($calorie, $price, $id);
                    $foodId = $id;
                } else if (empty($ret)) {
                    // insert new food row which don`t exists in db.                    
                    $foodId = $this->m->addNewFood($name, $calorie, $price);
                } else {
                    $foodId = $ret['id'];
                }
                // have finished to handle diti.food table        
            } else if ($dietType === 'old') {
                $foodId = intval($_POST['foodId']);
                // valid whether the food id exists in table or not
                if (false === $this->m->checkFoodIdExist($foodId)) {
                    throw new Exception('食品名称数据篡改!');
                }
                // have got safe data
            } else {
                throw new Exception("incorrect diet type!");
            }
            if (true === $this->m->addNewDiets(array($foodId, $copies))) {
                echo json_encode(array('status' => 0));
            }            
        }
    }
    
    // record energy consumption
    function updateWorkout() {
        if (isset($_POST['burn']) && ($_POST['burn'] === '1')) {
            $type = $_POST['type'];
            $cal  = intval($_POST['cal']);

            if ($cal <= 0 || $cal > 10000) {
                throw new Exception('卡路里输入范围在1到10000之间!');
            }
            if (strlen(utf8_decode($type)) > 10) {
                throw new Exception('输入的运行类型字符超10个字');
            }
            
            $this->load->model('healthy', 'm');
            if ($this->m->addWorkout(array($cal, $type)) ===  true) {
                echo json_encode(array('status' => 0));
            }
        }        
    }
}