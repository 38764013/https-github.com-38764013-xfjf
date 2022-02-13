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
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">系统设置</div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 系统名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[name]"
                                           value="<?= $values['name'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 首页公告 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[notice]"
                                           value="<?= $values['notice'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 注册赠送 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">
                                    <input type="text" name="store[register_give]"
                                           value="<?= $values['register_give'] ?>"
                                           class="am-form-field">
                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">次</span>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 充值比例 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">
                                    <span class="am-input-group-label am-input-group-label__left">一元 = </span>
                                    <input type="text" name="store[recharge_ratio]"
                                           value="<?= $values['recharge_ratio'] ?>"
                                           class="am-form-field">
                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">个DB</span>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 兑换比例 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end am-input-group am-margin-bottom">
                                    <span class="am-input-group-label am-input-group-label__left">1DB = </span>
                                    <input type="text" name="store[exchange_ratio]"
                                           value="<?= $values['exchange_ratio'] ?>"
                                           class="am-form-field">
                                    <span class="widget-dealer__unit am-input-group-label am-input-group-label__right">元</span>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 系统版权 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[copyright]"
                                           value="<?= $values['copyright'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 用户支付 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_recharge]" value="1" data-am-ucheck
                                            <?= $values['is_recharge'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_recharge]" value="0" data-am-ucheck
                                            <?= $values['is_recharge'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 代理支付 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_pay]" value="1" data-am-ucheck
                                            <?= $values['is_pay'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_pay]" value="0" data-am-ucheck
                                            <?= $values['is_pay'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> IOS支付 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_ios_pay]" value="1" data-am-ucheck
                                            <?= $values['is_ios_pay'] == 1 ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="store[is_ios_pay]" value="0" data-am-ucheck
                                            <?= $values['is_ios_pay'] == 0 ? 'checked' : '' ?>> 关闭
                                    </label>
                                </div>
                            </div>
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
