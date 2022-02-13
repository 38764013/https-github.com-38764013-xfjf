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
                                <div class="widget-title am-fl">百度OCR（http://ai.baidu.com/tech/ocr/general/）|
                                    通用文字识别
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> APP_ID </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="ocr[app_id]"
                                           value="<?= $values['app_id'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> API_KEY </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="ocr[api_key]"
                                           value="<?= $values['api_key'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> SecretKey </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="ocr[secret_key]"
                                           value="<?= $values['secret_key'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 识别通道 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="ocr[is_model]" value="10" data-am-ucheck
                                            <?= $values['is_model'] == 10 ? 'checked' : '' ?>> 普通识别
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="ocr[is_model]" value="20" data-am-ucheck
                                            <?= $values['is_model'] == 20 ? 'checked' : '' ?>> 高精度识别
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 题库通道 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="ocr[topic]" value="10" data-am-ucheck
                                            <?= $values['topic'] == 10 ? 'checked' : '' ?>> 通道1（成功率高、不太理想）
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="ocr[topic]" value="20" data-am-ucheck
                                            <?= $values['topic'] == 20 ? 'checked' : '' ?>> 通道2（成功率还行、题库多）
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
