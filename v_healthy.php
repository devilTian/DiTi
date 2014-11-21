<div class="row">
    <div class="small-12 small-centered columns">
        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a href="#weightRecord">记录体重</a>
                <div id="weightRecord" class="content active">
                    <div data-alert class="alert-box info radius">Hi, **!今天你还没有记录你的体重!<br/>赶紧去测一下吧！</div>
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
                                  <option value="kilograms" selected="selected">公斤/千克</option>
                                  <option value="jin">斤</option>
                                  <option value="pounds">磅</option>
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
                    Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
            success: function(html) {
                $('#mainContent').html(html);
            }
        });
    });
    $('#jumpToDietCalBtn').click(function() {
        $('a[href=#dietCal]').trigger('click')
    });
});
</script>