<?php if($data['weight'] === false) { ?>
    <a href="#" class="button tiny radius" id="jumpToWeightBtn">记录今天的体重</a>
<?php } else { ?>
    <p>
        今天的体重是<span class="label"><?php echo round($data['weight']['val'],1) . $data['weightUnitOpt'][$data['weight']['unit']]?></span>
            <?php if ($data['height'] === false ) {?>
                .
            <?php } else { ?>
                , 身高是<span class="label"><?php echo $data['height']?>厘米</span><br/>
                BMI=<span class="label"><?php echo $data['bmi']['val'];?></span>,
                <span class="label"><?php echo $data['bmi']['level'];?></span>, 
            <?php } ?><br/>
        请将今天的总卡路里摄入量控制在<span class="alert label"><?php echo $data['calPerDay'] ?>calories</span>以下.<br/>
        运动消耗掉<span class="success label"><?php echo $data['workout']?>calories</span>.<br/>
        今日已摄入总热量: <b><?php echo $data['intake'] ?>卡</b>, 包括:
        <table>
            <thead>
                <tr>
                    <th width="200">名称</th>
                    <th width="150">热量</th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($data['dietItems'] as $v) { ?>
                <tr><td><?php echo $v[0] ?></td><td><?php echo $v[1] ?></td></tr>
                <?php } ?>
            </tbody>
        </table>
    </p>    
<?php } ?> 
