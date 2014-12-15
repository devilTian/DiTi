<?php if($data['weight'] === false) { ?>
    <a href="#" class="button tiny radius" id="jumpToWeightBtn">记录今天的体重</a>
<?php } else { ?>
    <p>
        今天的体重是<span class="label"><?php echo $data['weight']['val'] . $weightUnitOpt[$data['weight']['unit']]?></span>.<br/>
        请将今天的总卡路里摄入量控制在<span class="alert label"><?php echo $data['calPerDay'] ?>calories</span>以下.<br/>
        运动消耗掉<span class="success label"><?php echo $data['workout']?>calories</span>.<br/>
        今日已摄入总热量: <b><?php echo $data['intake'] ?>卡</b>, 包括:
        <ul class="disc">
            <?php foreach($data['dietItems'] as $v) {?>
            <li><?php echo "[{$v[0]}]<br/>{$v[1]}"?></li>
            <?php } ?>
        </ul>
    </p>    
<?php } ?> 