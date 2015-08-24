<div class="row">
    <div class="small-12 small-centered columns">
        <accordion close-others="true">
            <accordion-group heading="总结" is-open="initData.weight !== false">
                <p ng-if="initData.weight === false">无</p>
                <p ng-if="initData.weight !== false">
                    <p ng-if="initData.height !== false">
                        今天的体重是<span class="label" ng-bind="initData.weight.val + initData.weightUnitOpt[initData.weight.unit]"></span>
                        ,身高是<span class="label" ng-bind="initData.height + '厘米'"></span><br/>
                        BMI=<span class="label" ng-bind="initData.bmi.val"></span>
                        ,<span class="label" ng-bind="initData.bmi.level"></span>,
                    </p>
                    <p ng-if="initData.height === false">
                        今天的体重是<span class="label" ng-bind="initData.weight.val + initData.weightUnitOpt[initData.weight.unit] + '.'"></span>
                    </p>
                    请将今天的总卡路里摄入量控制在<span class="alert label" ng-bind="initData.calPerDay + 'calories'"></span>以下.<br/>
                    运动消耗掉<span class="success label" ng-bind="initData.workout + 'calories'"></span>.<br/>
                    今日已摄入总热量: <b ng-bind="initData.intake + '卡'"></b>, 包括:
                    <table ng-if="initData.weight !== false">
                        <thead>
                            <tr>
                                <th width="200">名称</th>
                                <th width="150">热量</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in initData.dietItems">
                                <td ng-bind="item[0]"></td>
                                <td ng-bind="item[1]"></td>
                            </tr>
                        </tbody>
                    </table>
                </p>    
            </accordion-group>
            <accordion-group heading="记录体重" is-open="initData.weight === false">
                <div data-alert class="alert-box info radius" ng-if="initData.weight === false" id="weightAlter1">Hi, {{initData.nick}}!今天你还没有记录你的体重!<br/>赶紧去测一下吧！</div>
                <div data-alert class="alert-box info radius" ng-if="initData.weight !== false" id="weightAlter2">Hi, {{initData.nick}}!你已经记录了你的体重, 但还可以再次测试~</div>
                <form id="weightForm">
                    <div class="row">
                        <div class="large-3 medium-3 small-3 columns">
                            <label class="right inline">体重</label>                                
                        </div>
                        <div class="large-3 medium-3 small-9 columns">
                            <input type="text" name="weight" id="weight" ng-model="formData.weight"
                                placeholder="{{initData.weight !== false ? initData.weight.val + initData.weightUnitOpt[initData.weight.unit] : ''}}">
                        </div>
                        <div class="large-6 columns hide-for-small-only"></div>
                    </div>
                    <div class="row">
                        <div class="large-3 medium-3 small-3 columns">
                            <label class="right inline">单位</label>
                        </div>
                        <div class="large-3 medium-3 small-9 columns">
                            <select ng-model="formData.unit" ng-options="k as v for (k, v) in initData.weightUnitOpt">
                            </select>
                        </div>
                        <div class="large-6 columns hide-for-small-only"></div>
                    </div>
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns">
                            <a href="#" class="button tiny radius expand"
                                ng-click="submitWeight()">提交
                            </a>
                        </div>
                    </div>
                </form>
            </accordion-group>
            <accordion-group heading="记录饮食热量">
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
                        <div class="large-3 medium-3 small-3 columns">
                            <label class="right inline">名称</label>
                        </div>
                        <div class="large-3 medium-3 small-9 columns">
                            <select id="foodOptions">
                                <option selected="selected" value="">请选择</option>
                                <?php foreach ($data['foodOpt'] as $v) { ?>
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
                            <select id="copies">                                   
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>                                    
                            </select>
                        </div>
                        <div class="large-3 columns hide-for-small-only"></div>
                    </div>
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns">
                            <a href="#" class="button tiny radius expand"
                               id="submitDietBtn">提交
                            </a>
                        </div>
                    </div>
                </form>
            </accordion-group>
            <accordion-group heading="记录运动消耗的热量">
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
                        <div class="large-12 medium-12 small-12 columns">
                            <a href="#" class="button tiny radius expand"
                               id="submitBurnBtn">提交
                            </a>
                        </div>
                    </div>
                </form>
            </accordion-group>
        </accordion>
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
            dataType: "json",
            success: function(ret) {
                $('#statistic').html(ret.data);
            }
        });
    }
    
    $('#submitWeightBtn').click(function() {
        // validation
        clearAllErrorClass();
        var weight = $('#weight').val(),
            unit   = $('#weightUnit>option:selected').val();
        if (!/^[1-9][0-9]{0,2}(\.[0-9])?$/.test(weight)) {
            addErrorClass($('#weight'), '范围[0.0-999.9]');
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
            return false;
        }        
        if (type === 'new') {
            var cal      = $('#calorie').val(),
                foodName = $('#foodName').val(),
                price    = $('#price').val();
            if ((!/^\d+$/.test(cal)) || (cal < 1)) {
                addErrorClass($('#calorie'), '必填且为正整数');
                return false;
            }
            if (foodName.length > 15 || foodName.length < 1) {
                addErrorClass($('#foodName'), '必填且不超过15个字');
                return false;
            }
            if (!/^[1-9][0-9]{0,9}(\.[0-9]{1,2})?$/.test(price)) {
                addErrorClass($('#price'), '格式错误');
                return false;
            }
        } else if (type === 'old') {
            var foodId = $('#foodOptions>option:selected').val();
            if (!/^\d+$/.test(foodId) || foodId === '') {
                addErrorClass($('#foodOptions'), '请选择食物名称');
                return false;
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
            return false;
        }
        if (type.length > 10 || type.length < 1) {
            addErrorClass(typeDom, '必填且不超过10个字');
            return false;
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
        $('[heading=记录体重]').trigger('click');
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
