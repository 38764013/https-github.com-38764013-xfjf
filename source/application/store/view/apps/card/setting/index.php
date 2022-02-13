<?php

use app\common\enum\DeliveryType as DeliveryTypeEnum;

?>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 次卡 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">
                                    <span class="am-input-group-label am-input-group-label__left">1次 = </span>
                                    <input placeholder="请输入比例" type="text" name="card[second]" value="<?= $values['second'] ?>"
                                           class="am-form-field">
                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">个DB</span>
                                </div>
                            </div>
<!--                            <div class="am-form-group">-->
<!--                                <label class="am-u-sm-3 am-form-label form-require"> 月卡 </label>-->
<!--                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">-->
<!--                                    <span class="am-input-group-label am-input-group-label__left">30天 = </span>-->
<!--                                    <input placeholder="请输入比例" type="text" name="card[month]" value="--><?//= $values['month'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <input placeholder="请输入总次数" type="text" name="card[month_number]" value="--><?//= $values['month_number'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">个DB</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="am-form-group">-->
<!--                                <label class="am-u-sm-3 am-form-label form-require"> 季卡 </label>-->
<!--                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">-->
<!--                                    <span class="am-input-group-label am-input-group-label__left">90天 = </span>-->
<!--                                    <input placeholder="请输入比例" type="text" name="card[quarter]" value="--><?//= $values['quarter'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <input placeholder="请输入总次数" type="text" name="card[quarter_number]" value="--><?//= $values['quarter_number'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">个DB</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="am-form-group">-->
<!--                                <label class="am-u-sm-3 am-form-label form-require"> 年卡 </label>-->
<!--                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">-->
<!--                                    <span class="am-input-group-label am-input-group-label__left">365天 = </span>-->
<!--                                    <input placeholder="请输入比例" type="text" name="card[year]" value="--><?//= $values['year'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <input placeholder="请输入总次数" type="text" name="card[year_number]" value="--><?//= $values['year_number'] ?><!--"-->
<!--                                           class="am-form-field">-->
<!--                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">个DB</span>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>