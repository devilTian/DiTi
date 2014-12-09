<?php
class Healthy_Controller extends Super_Controller {
    
    function index() {
       $this->show();
    }
    
    function show() {
        $this->loadModel('healthy', 'm');
        $data = $this->m->getStatistic();
        $weightUnitOpt = $this->m->weightUnitOpt;
        $maintenance   = $this->m->maintenance;
        $foodOpt       = $this->m->getFoodOpt();
        require('views/healthy_view.php'); 
    }
    
    function showStatistics() {
        $this->loadModel('healthy', 'm');
        $data = $this->m->getStatistic();
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
            
            $this->loadModel('healthy', 'm');
            if (false === array_key_exists($unit, $this->m->weightUnitOpt)) {
                throw new Exception('输入的重量单位错误!');
            }
            
            if ($this->m->updateWeight($weight, $unit) === true) {
                echo json_encode(array('status' => 0));
            }
        }
    }
    
    // record food`s calorie 
    function updateDiet() {
        $this->loadModel('healthy', 'm');
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
                if (false === $this->m->checkFoodIdExist($id)) {
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
            
            $this->loadModel('healthy', 'm');
            if ($this->m->addWorkout(array($cal, $type)) ===  true) {
                echo json_encode(array('status' => 0));
            }
        }        
    }
}