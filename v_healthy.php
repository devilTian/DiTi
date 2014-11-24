<div class="row">
    <div class="small-12 small-centered columns">
        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a href="#weightRecord">记录体重</a>
                <div id="weightRecord" class="content active">
                    <div data-alert class="alert-box info radius" id="weightAlter1">Hi, **!今天你还没有记录你的体重!<br/>赶紧去测一下吧！</div>
                    <div data-alert class="alert-box info radius hide" id="weightAlter2">Hi, **!你已经记录了你的体重, 但还可以再次测试~</div>
                    <form id="weigthForm">
                        <div class="row">
                            <div class="large-3 small-3 columns">
                                <label class="right inline">体重</label>
                            </div>
                            <div class="large-3 small-9 columns">
                                <input type="text" name="weigth" id="weigth"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-3 small-3 columns">
                                <label class="right inline">单位</label>
                            </div>
                            <div class="large-3 small-9 columns">
                                <select id="weightUnit">
                                    <?php foreach ($weightUnitOpt as $k => $v) { ?>
                                    <option value="<?php echo $k ?>"><?php echo $v ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-6 small-8 small-centered columns">
                                <ul class="button-group">
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="submitWeightBtn">提交
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="jumpToDietCalBtn">跳过</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#dietCal">记录饮食热量</a>
                <div id="dietCal" class="content">
                    <div data-alert class="alert-box info radius" id="dietAlter1">记录你当前吃下的食物的热量~</div>
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right">类型</label>
                        </div>
                        <div class="large-6 small-9 columns">
                            <input type="radio" name="dietType" value="new" id="newDiet" checked="checked"><label for="newDiet">新食物</label>&nbsp;
                            <input type="radio" name="dietType" value="old" id="oldDiet"><label for="oldDiet">已存食物</label>
                        </div>
                        <div class="large-3 columns hide-for-small-only"></div>
                    </div>
                    <div class="row dietNewDiv">
                        <div class="large-3 small-3 columns">
                            <label class="right inline">热量</label>
                        </div>
                        <div class="large-3 small-9 columns">
                            <input type="text" name="calorie" id="calorie"/>
                        </div>
                        <div class="large-6 columns hide-for-small-only"></div>
                    </div>
                    <div class="row dietNewDiv">
                        <div class="large-3 small-4 columns">
                            <label class="right inline">食物名称</label>
                        </div>
                        <div class="large-3 small-8 columns">
                            <input type="text" name="calorie" id="calorie"/>
                        </div>
                        <div class="large-6 columns hide-for-small-only"></div>
                    </div>
                    <div class="row dietOldDiv">
                        <div class="large-3 columns hide-for-small-only">
                            <label class="right inline">食物名称</label>
                        </div>
                        <div class="large-3 small-12 columns">
                            <select id="foodOptions">
                                <?php foreach ($foodOpt as $v) { ?>
                                <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="large-6 columns hide-for-small-only"></div>
                    </div>
                    <div class="row">
                        <div class="large-3 small-3 columns">
                            <label class="right inline">份数</label>
                        </div>
                        <div class="large-3 small-9 columns">
                            <input type="text" name="copies" id="copies" value="1"/>
                        </div>
                        <div class="large-3 columns hide-for-small-only"></div>
                    </div>
                    <div class="row">
                            <div class="large-6 small-8 small-centered columns">
                                <ul class="button-group">
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="submitDietBtn">提交
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="jumpToFinalBtn">跳过</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#panel3">Accordion 3</a>
                <div id="panel3" class="content">
                    Panel 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </dd>
        </dl>    
    </div>
</div>
<script type="text/javascript">
$(document).foundation().ready(function() {
    $('#submitWeightBtn').click(function() {
        $.ajax({
            type: "POST",
            url: 'm_healthy.php',
            data: {
                weight: $('#weigth').val(),
                unit  : $('#weightUnit>option:selected').val()
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    $('#weightAlter1').hide();
                    $('#weightAlter2').removeClass('hide');
                    $('a[href=#dietCal]').trigger('click');
                    $('#weigthForm')[0].reset();
                }
            }
        });
    });
    $('#jumpToDietCalBtn').click(function() {
        $('a[href=#dietCal]').trigger('click');
    });
    $('input[type=radio][name=dietType]').click(function() {
        var type = $(this).val();
        if (type === 'old') {
            $('div.dietNewDiv').hide();
            $('div.dietOldDiv').show();
        } else if (type === 'new') {
            $('div.dietNewDiv').show();
            $('div.dietOldDiv').hide();
        } else {
            alert('incorrect diet type!');
        }
    }).filter(':checked').trigger('click');
});
</script>