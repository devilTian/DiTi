<?php session_start(); ?>
<div class="row">
    <div class="small-12 small-centered columns">
        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a href="#statistic">总结</a>
                <div id="statistic" class="content active">                    
                    <?php require('healthy_statistics_view.php');?>                   
                </div>
            </dd>            
            <dd class="accordion-navigation">
                <a href="#weightRecord">记录体重</a>
                <div id="weightRecord" class="content">
                    <div data-alert class="alert-box info radius <?php if($data['weight'] !== false) echo 'hide'; ?>" id="weightAlter1">Hi, <?php echo $_SESSION['nickname'] ?>!今天你还没有记录你的体重!<br/>赶紧去测一下吧！</div>
                    <div data-alert class="alert-box info radius <?php if($data['weight'] === false) echo 'hide'; ?>" id="weightAlter2">Hi, <?php echo $_SESSION['nickname']?>!你已经记录了你的体重, 但还可以再次测试~</div>
                    <form id="weightForm">
                        <div class="row">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">体重</label>                                
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <input type="text" name="weight" id="weight"
                                       placeholder="<?php if($data['weight'] !== false) echo $data['weight']['val'] . $weightUnitOpt[$data['weight']['unit']];?>"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">单位</label>
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <select id="weightUnit">
                                    <?php foreach ($weightUnitOpt as $k => $v) { ?>
                                    <option value="<?php echo $k ?>"><?php echo $v ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-6 medium-6 small-8 small-centered columns">
                                <ul class="button-group">
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="submitWeightBtn">提交
                                        </a>
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
                    <div data-alert class="alert-box info radius" id="dietAlter1">记录你当前吃下的食物~</div>
                    <form id="dietForm">
                          <div class="row">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right">类型</label>
                            </div>
                            <div class="large-6 medium-6 small-9 columns">
                                <input type="radio" name="dietType" value="old" id="oldDiet" checked="checked"><label for="oldDiet">已存食物</label>&nbsp;
                                <input type="radio" name="dietType" value="new" id="newDiet"><label for="newDiet">新食物</label>
                            </div>
                            <div class="large-3 columns hide-for-small-only"></div>
                        </div>
                        <div class="row dietNewDiv">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">热量</label>
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <div class="row collapse">
                                    <div class="small-8 columns">
                                        <input type="text" name="calorie" id="calorie" placeholder="calorie"/>
                                    </div>
                                    <div class="small-4 columns">
                                        <a href="#" class="button postfix" id="convertKjToCalBtn">KJ->Cal</a>
                                    </div>
                                </div>                                
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row dietNewDiv">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">名称</label>
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <input type="text" name="foodName" id="foodName"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row dietNewDiv">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">价格</label>
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <input type="text" name="price" id="price"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row dietOldDiv">
                            <div class="large-3 medium-3 columns hide-for-small-only">
                                <label class="right inline">食物名称</label>
                            </div>
                            <div class="large-3 medium-3 small-12 columns">
                                <select id="foodOptions">
                                    <option selected="selected" value="">请选择</option>
                                    <?php foreach ($foodOpt as $v) { ?>
                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-3 medium-3 small-3 columns">
                                <label class="right inline">份数</label>
                            </div>
                            <div class="large-3 medium-3 small-9 columns">
                                <input type="text" name="copies" id="copies" value="1"/>
                            </div>
                            <div class="large-3 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-6 medium-6 small-8 small-centered columns">
                                <ul class="button-group">
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="submitDietBtn">提交
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#burn">记录运动消耗的热量</a>
                <div id="burn" class="content">
                    <form id="burnForm">
                        <div class="row">
                            <div class="large-3 medium-3 small-4 columns">
                                <label class="right inline">消耗</label>
                            </div>
                            <div class="large-3 medium-3 small-8 columns">
                                <input type="text" name="calorie" id="calorie"
                                    placeholder="calorie"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-3 medium-3 small-4 columns">
                                <label class="right inline">运动类型</label>
                            </div>
                            <div class="large-3 medium-3 small-8 columns">
                                <input type="text" name="type" id="type"
                                    value="跑步"/>
                            </div>
                            <div class="large-6 columns hide-for-small-only"></div>
                        </div>
                        <div class="row">
                            <div class="large-6 medium-6 small-8 small-centered columns">
                                <ul class="button-group">
                                    <li>
                                        <a href="#" class="button tiny radius"
                                           id="submitBurnBtn">提交
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>                   
                </div>
            </dd>
        </dl>    
    </div>
</div>
<script type="text/javascript">    
$(document).foundation().ready(function() {
    function clearAllErrorClass() {
        $('input.error').removeClass('error');
        $('small.error').remove();
    }
    function addErrorClass(dom, errMsg) {
        dom.addClass('error');
        dom.after('<small class="error">' + errMsg + '.</small>');
    }
    
    function freshStatisticsData() {
        $.ajax({
            url: 'index.php/healthy/showStatistics',
            dataType: "html",
            success: function(html) {
                $('#statistic').html(html);
            }
        });
    }
    
    $('#submitWeightBtn').click(function() {
        // validation
        clearAllErrorClass();
        var weight = $('#weight').val(),
            unit   = $('#weightUnit>option:selected').val();
        if (!/^[1-9][0-9]{0,2}$/.test(weight)) {
            addErrorClass($('#weight'), '范围应在0到1000之间!');
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: 'index.php/healthy/updateWeight',
            data: {
                weight: weight,
                unit  : unit
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    $('#weightAlter1').addClass('hide');
                    $('#weightAlter2').removeClass('hide');
                    $('#weightForm')[0].reset();
                    $('a[href=#statistic]').trigger('click');
                    freshStatisticsData();
                }
            }
        });
    });
    $('#submitDietBtn').click(function() {
        // validation
        clearAllErrorClass();
        var type   = $('input[type=radio][name=dietType]:checked').val(),
            copies = $('#copies').val();
            
        if ((!/^\d+$/.test(copies)) && (copies < 1)) {
            addErrorClass($('#copies'), '必填且为正整数');
        }        
        if (type === 'new') {
            var cal      = $('#calorie').val(),
                foodName = $('#foodName').val(),
                price    = $('#price').val();
            if ((!/^\d+$/.test(cal)) || (cal < 1)) {
                addErrorClass($('#calorie'), '必填且为正整数');
            }
            if (foodName.length > 15 || foodName.length < 1) {
                addErrorClass($('#foodName'), '必填且不超过15个字');
            }
            if (!/^[1-9][0-9]{0,9}(\.[0-9]{1,2})?$/.test(price)) {
                addErrorClass($('#price'), '格式错误');
            }
        } else if (type === 'old') {
            var foodId = $('#foodOptions>option:selected').val();
            if (!/^\d+$/.test(foodId) || foodId === '') {
                addErrorClass($('#foodOptions'), '请选择食物名称');
            }
        } else {
            return false;
        }
        if ($('input.error').length > 0) {
            return false;
        }        
        var data = {};
        data.dietType = type;
        data.copies   = copies;
        if (data.dietType === 'new') {
            data.calorie  = cal;
            data.foodName = foodName;
            data.price    = price;
        } else if (data.dietType === 'old') {
            data.foodId = foodId;
        } else {
            alert('incorrect diet type!');
        }
        $.ajax({
            type: "POST",
            url: 'index.php/healthy/updateDiet',
            data: data,
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    $('#dietForm')[0].reset();
                    $('input[type=radio][name=dietType]:checked').trigger('click');
                    $('a[href=#statistic]').trigger('click');
                    freshStatisticsData();
                }                
            }
        });
    });
    $('#submitBurnBtn').click(function() {
         // validation
        clearAllErrorClass();
        var calDom  = $('#burnForm').find('#calorie'),
            typeDom = $('#burnForm').find('#type'),
            cal     = calDom.val(),
            type    = typeDom.val();
        if ((!/^\d+$/.test(cal)) || (cal <= 0 ) || (cal > 10000)) {
            addErrorClass(calDom, '范围在1到10000之间');
        }
        if (type.length > 10 || type.length < 1) {
            addErrorClass(typeDom, '必填且不超过10个字');
        }
        $.ajax({
            type: "POST",
            url: 'index.php/healthy/updateWorkout',
            data: {
                burn : 1,
                type : type,
                cal  : cal
            },
            dataType: "JSON",
            success: function(ret) {
                if (ret.status === 0) {
                    $('#burnForm')[0].reset();
                    $('a[href=#statistic]').trigger('click');
                    freshStatisticsData();
                }
            }
        });
    });
    $('#convertKjToCalBtn').click(function() {
        var v = Math.round($('#calorie').val() * 0.2389);
        $('#calorie').val(v);
        return false;
    });
    $('#statistic').on('click', '#jumpToWeightBtn', function() {
        $('a[href=#weightRecord]').trigger('click');
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
