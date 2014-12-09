<?php if($data['weight'] === false) { ?>
    <a href="#" class="button tiny radius" id="jumpToWeightBtn">记录今天的体重</a>
<?php } else { ?>
    <p>
        今天的体重是<span class="label"><?php echo $data['weight']['val'] . $weightUnitOpt[$data['weight']['unit']]?></span>.<br/>
        请将今天的总卡路里摄入量控制在<span class="alert label"><?php echo $data['calPerDay'] ?>calories</span>以下.<br/>
        运动消耗掉<span class="success label"><?php echo $data['workout']?>calories</span>.<br/>
        已摄入<b><?php echo $data['intake'] ?>卡</b>, 包括: <?php echo $data['eatFoodNameStr'] ?>
    </p>    
<?php } ?> 