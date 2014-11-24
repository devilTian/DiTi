<?php
$weightUnitOpt = array('kilograms' => '公斤/千克', 'jin' => '斤',
                       'pounds'    => '磅');

$dbh = new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
$foodOpt = $dbh->query('SELECT name FROM food')->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['weight']) && isset($_POST['unit'])) {    
    $weight = $_POST['weight'];
    $unit   = $_POST['unit'];
    
    //validation
    $weight = floatval($weight);
    if (!($weight > 0 && $weight <= 1000)) {
        throw new Exception('输入的重量范围不在0到1000之间!');
    }
    if (false === array_key_exists($unit, $weightUnitOpt)) {
        throw new Exception('输入的重量单位错误!');
    }
    
    $dbh = new PDO('mysql:dbname=diti;host=192.168.1.103;', 'spidertianye', 'root');
    $sql = "INSERT INTO weight VALUES(null, $weight, '$unit', default, 1)";
    //$affectedRow = $dbh->exec($sql);
    $affectedRow = 1;
    if ($affectedRow !== 1) {
        throw new Exception('更新体重数据失败!');
    }
    echo json_encode(array('status' => 0));
}

