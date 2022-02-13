<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-body">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">页面链接</div>
                    </div>
                    <div class="link-list">
                        <ul class="">
                            <li class="link-item">
                                <div class="row page-name">文章列表页</div>
                                <div class="row am-cf">
                                    <div class="am-fl">地址：</div>
                                    <div class="am-fl">
                                        <span class="x-color-green">/pages/article/index</span>
                                    </div>
                                </div>
                                <div class="row am-cf">
                                    <div class="am-fl">参数：</div>
                                    <div class="am-fl">
                                        <p class="param">
                                            <span class="x-color-green">category_id</span>
                                            <span>文章分类ID</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="link-item">
                                <div class="row page-name">文章详情</div>
                                <div class="row am-cf">
                                    <div class="am-fl">地址：</div>
                                    <div class="am-fl">
                                        <span class="x-color-green">/pages/article/detail/index</span>
                                    </div>
                                </div>
                                <div class="row am-cf">
                                    <div class="am-fl">参数：</div>
                                    <div class="am-fl">
                                        <p class="param">
                                            <span class="x-color-green">article_id</span>
                                            <span>文章ID</span>
                                            <span class="x-color-red">　--必填</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row am-cf">
                                    <div class="am-fl">例如：</div>
                                    <div class="am-fl">
                                        <span class="x-color-c-gray-5f">/pages/article/detail/index?article_id=10001</span>
                                    </div>
                                </div>
                            </li>
                            <li class="link-item">
                                <div class="row page-name">拍照搜题</div>
                                <div class="row am-cf">
                                    <div class="am-fl">地址：</div>
                                    <div class="am-fl">
                                        <span class="x-color-green">/pages/answer/callback/index</span>
                                    </div>
                                </div>
                            </li>
                            <li class="link-item">
                                <div class="row page-name">次数充值</div>
                                <div class="row am-cf">
                                    <div class="am-fl">地址：</div>
                                    <div class="am-fl">
                                        <span class="x-color-green">/pages/answer/recharge/index</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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
