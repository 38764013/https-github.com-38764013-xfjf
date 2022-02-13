<?php

use app\common\enum\CardType as CardTypeEnum;

?>
<link rel="stylesheet" href="assets/common/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加卡密</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">生成数量 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="card[number]"
                                           value="" placeholder="请输入生成次数/数量" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">生成次数 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="card[second]"
                                           value="" placeholder="请输入生成次数，生成次卡必填">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">选择代理 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="card[make_uid]"
                                            data-am-selected="{searchBox: 1, btnSize: 'sm',
                                             placeholder:'请选择已有代理', maxHeight: 400}" required>
                                        <option value=""></option>
                                        <?php if (isset($agent)): foreach ($agent as $item): ?>
                                            <option value="<?= $item['user_id'] ?>"><?= $item['nickName'] ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">生成类型 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="card[type]"
                                            data-am-selected="{searchBox: 1, btnSize: 'sm',
                                             placeholder:'请选择卡密类型', maxHeight: 400}" required>
                                        <option value=""></option>
                                        <?php foreach (CardTypeEnum::data() as $item): ?>
                                            <?php if ($item['value'] == 10): ?>
                                            <option value="<?= $item['value'] ?>"><?= $item['name'] ?></option>
                                            <?php  endif; ?>
                                        <?php endforeach; ?>
                                    </select>
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
        $('#my-form').superForm({success:function (res){
                $.show_success(res.msg)
                setTimeout(function (){
                    window.location.href = "/index.php?s=/store/apps.card.index/index"
                },1500)
                window.location.href = res.url
        }});

    });
</script>