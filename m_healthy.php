<?php
$weightUnitOpt = array('kilograms' => '公斤/千克', 'jin' => '斤',
                       'pounds'    => '磅');

$dbh = new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
$foodOpt = $dbh->query('SELECT id, name FROM food')->fetchAll(PDO::FETCH_ASSOC);
$weight = $dbh->query('SELECT val, unit FROM weight WHERE date(datetime) = current_date()')->fetch(PDO::FETCH_ASSOC);
return;
// recode body weight daily
if (isset($_POST['weight']) && isset($_POST['unit'])) {
    $weight = $_POST['weight'];
    $unit   = $_POST['unit'];
    
    //validation
    $weight = floatval($weight);
    if (!($weight > 0 && $weight < 1000)) {
        throw new Exception('输入的重量范围不在0到1000之间!');
    }
    if (false === array_key_exists($unit, $weightUnitOpt)) {
        throw new Exception('输入的重量单位错误!');
    }
    
    // insert new weight record into db
    $sql = "INSERT INTO weight VALUES(null, $weight, '$unit', default, 1)";
    $affectedRow = $dbh->exec($sql);
    if ($affectedRow !== 1) {
        throw new Exception('更新体重数据失败!');
    }
    echo json_encode(array('status' => 0));
    
 // record food`s calorie 
} else if (isset($_POST['dietType'])) {
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
        $sql = 'SELECT id, calorie, price FROM food WHERE name = ?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($name));
        $ret = $sth->fetch(PDO::FETCH_ASSOC);        
        
        if (!empty($ret) && (intval($ret['calorie']) !== $calorie ||
            round($ret['price'], 2) !== $price)) {
            // update price or/and calorie when the new food exists in db.
            $id  = $ret['id'];
            $sql = "UPDATE food SET calorie = $calorie, price = $price " .
                    "WHERE id = $id";
            echo $sql;
            $affectedRow = $dbh->exec($sql);
            if ($affectedRow !== 1) {
                echo $affectedRow;
                throw new Exception("更新食物[{$name}]时失败!");
            }
            $foodId = $id;
        } else if (empty($ret)) {
            // insert new food row which don`t exists in db.
            $sql = "INSERT INTO food VALUES(NULL, ?, ?, ?)";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($name, $calorie, $price));
            $affectedRow = $sth->rowCount();            
            if ($affectedRow !== 1) {
                throw new Exception('录入新食品数据失败!');
            }
            $foodId = $dbh->lastInsertId();
        } else {
            $foodId = $ret['id'];
        }
        // have finished to handle diti.food table        
    } else if ($dietType === 'old') {
        $foodId = intval($_POST['foodId']);
        // valid whether the food id exists in table or not
        $sql = 'SELECT id FROM food WHERE id = ?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($foodId));
        if (empty($sth->fetchAll(PDO::FETCH_ASSOC))) {
            throw new Exception('食品名称数据篡改!');
        }
        // have got safe data
    } else {
        throw new Exception("incorrect diet type!");
    }
    $sql = 'INSERT INTO diets(foodId, copies, datetime) VALUES(?, ?, DEFAULT)';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($foodId, $copies));
    if ($sth->rowCount() !== 1) {
        $errorInfo = $sth->errorInfo();
        throw new Exception($errorInfo[2]);
    }    
    echo json_encode(array('status' => 0));

// record energy consumption
} else if (isset($_POST['burn']) && ($_POST['burn'] === '1')) {
    $type = $_POST['type'];
    $cal  = intval($_POST['cal']);
    
    if ($cal <= 0 || $cal > 10000) {
        throw new Exception('卡路里输入范围在1到10000之间!');
    }
    if (strlen(utf8_decode($type)) > 10) {
        throw new Exception('输入的运行类型字符超10个字');
    }
    
    $sql = 'INSERT INTO workout(userId, calorie, type, datetime) ' .
            'VALUES(1, ?, ?, DEFAULT)';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($cal, $type));
    if ($sth->rowCount() !== 1) {
        throw new Exception('添加信息失败');
    }    
    echo json_encode(array('status' => 0));
}