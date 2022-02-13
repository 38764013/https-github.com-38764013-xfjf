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
                                <div class="widget-title am-fl">邀请有奖</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 是否开启邀请有奖 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="share[is_open]" value="1" data-am-ucheck
                                            <?= $values['is_open'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="share[is_open]" value="0" data-am-ucheck
                                            <?= $values['is_open'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 邀请人数 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="share[people]"
                                           value="<?= $values['people'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 奖励次数 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="share[number]"
                                           value="<?= $values['number'] ?>" required>
                                </div>
                            </div>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">自定义分享</div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 分享标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="share[share_title]"
                                           value="<?= $values['share_title'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 封面图URL </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="share[share_cover]"
                                           value="<?= $values['share_cover'] ?>" required>
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
