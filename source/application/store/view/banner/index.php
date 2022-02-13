<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">轮播图列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <?php if (checkPrivilege('banner/add')): ?>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius"
                                           href="<?= url('banner/add') ?>">
                                            <span class="am-icon-plus"></span> 新增
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>轮播图ID</th>
                                <th>标题</th>
                                <th>封面图</th>
                                <th>目标地址</th>
                                <th>APPID</th>
                                <th>类型</th>
                                <th>添加时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['banner_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"
                                           style="max-width: 400px;"><?= $item['title'] ?></p>
                                    </td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['image']['file_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['image']['file_path'] ?>" height="72" alt="">
                                        </a>
                                    </td>
                                    <td class="am-text-middle"><?= $item['url'] ?></td>
                                    <td class="am-text-middle"><?= $item['app_id'] ?></td>
                                    <td class="am-text-middle">
                                           <span class="am-badge am-badge-<?= $item['show_type'] ? 'success' : 'warning' ?>">
                                               <?= $item['show_type'] == 10 ? '小程序内链' : ($item['show_type'] == 20 ? '外链地址' : '跳转小程序') ?>
                                           </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle"><?= $item['update_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <?php if (checkPrivilege('banner/edit')): ?>
                                                <a href="<?= url('banner/edit',
                                                    ['banner_id' => $item['banner_id']]) ?>">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                            <?php endif; ?>
                                            <?php if (checkPrivilege('banner/delete')): ?>
                                                <a href="javascript:void(0);"
                                                   class="item-delete tpl-table-black-operation-del"
                                                   data-id="<?= $item['banner_id'] ?>">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="10" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('banner/delete') ?>";
        $('.item-delete').delete('banner_id', url);
    });
</script>

