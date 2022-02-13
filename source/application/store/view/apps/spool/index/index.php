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
                                <div class="widget-title am-fl">流量主设置</div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 插屏广告ID </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="spool[ins_ad]"
                                           value="<?= $values['ins_ad'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group am-margin-bottom">
                                <label class="am-u-sm-3 am-form-label form-require"> 底部格子广告ID </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="spool[ins_bottom]"
                                           value="<?= $values['ins_bottom'] ?>" required>
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
