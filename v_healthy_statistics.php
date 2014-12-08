<?php
$dbh = new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
$weight = $dbh->query('SELECT val, unit FROM weight WHERE date(datetime) = current_date() ORDER BY datetime DESC limit 1')->fetch(PDO::FETCH_ASSOC);
$maintenance = array('kilograms' => 39.6, 'jin' => 19.8, 'pounds' => 18);
$weightUnitOpt = array('kilograms' => '公斤/千克', 'jin' => '斤',
                       'pounds'    => '磅');
if ($weight !== false) {
    $calPerDay = round($weight['val'], 2) * round($maintenance[$weight['unit']], 2);
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
?>
<?php if($weight === false) { ?>
    <a href="#" class="button tiny radius" id="jumpToWeightBtn">记录今天的体重</a>
<?php } else { ?>
    <p>
        今天的体重是<span class="label"><?php echo $weight['val'] . $weightUnitOpt[$weight['unit']]?></span>.<br/>
        请将今天的总卡路里摄入量控制在<span class="alert label"><?php echo $calPerDay ?>calories</span>以下.<br/>
        运动消耗掉<span class="success label"><?php echo $workout?>calories</span>.<br/>
        已摄入<b><?php echo $intake ?>卡</b>, 包括: <?php echo $eatFoodNameStr ?>
    </p>    
<?php } ?> 