<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">会员卡列表</div>
                </div>
                <div class="widget-body am-fr">
                    <!-- 工具栏 -->
                    <div class="page_toolbar am-margin-bottom am-cf">
                        <form class="toolbar-form" action="">
                            <input type="hidden" name="s" value="/<?= $request->pathinfo() ?>">
                            <div class="am-u-sm-12 am-u-md-3">
                                <div class="am-form-group">
                                    <?php if (checkPrivilege('apps.card.index/add')): ?>
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-success"
                                               href="<?= url('apps.card.index/add') ?>">
                                                <span class="am-icon-plus"></span> 新增
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-9">
                                <div class="am fr">
                                    <div class="am-form-group am-fl">
                                        <?php $is_export = $request->get('is_export'); ?>
                                        <select name="is_export"
                                                data-am-selected="{btnSize: 'sm', placeholder: '导出状态'}">
                                            <option value=""></option>
                                            <option value="-1" <?= $is_export === '-1' ? 'selected' : '' ?>>不导出</option>
                                            <option value="1" <?= $is_export === '1' ? 'selected' : '' ?>>搜索导出</option>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <?php $state = $request->get('state'); ?>
                                        <select name="state"
                                                data-am-selected="{btnSize: 'sm', placeholder: '卡密状态'}">
                                            <option value=""></option>
                                            <option value="-1" <?= $state === '-1' ? 'selected' : '' ?>>全部</option>
                                            <option value="1" <?= $state === '1' ? 'selected' : '' ?>>已使用</option>
                                            <option value="0"<?= $state === '0' ? 'selected' : '' ?>>未使用</option>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <div class="am-input-group am-input-group-sm tpl-form-border-form">
                                            <input type="text" class="am-form-field" name="make_uid"
                                                   placeholder="请输入代理ID"
                                                   value="<?= $request->get('make_uid') ?>">
                                        </div>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <div class="am-input-group am-input-group-sm tpl-form-border-form">
                                            <input type="text" class="am-form-field" name="code"
                                                   placeholder="请输入卡密编码"
                                                   value="<?= $request->get('code') ?>">
                                            <div class="am-input-group-btn">
                                                <button class="am-btn am-btn-default am-icon-search"
                                                        type="submit"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>卡密ID</th>
                                <th>卡密标题</th>
                                <th>卡密类型</th>
                                <th>时长/次数</th>
                                <th>卡密状态</th>
                                <th>卡密编码</th>
                                <th>使用者</th>
                                <th>创建者</th>
                                <th>创建时间</th>
                                <th>使用时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['card_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"
                                           style="max-width: 400px;"><?= $item['title'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['type'] ?></td>
                                    <td class="am-text-middle"><?= $item['number'] ?></td>
                                    <td class="am-text-middle">
                                           <span class="am-badge am-badge-<?= $item['use_uid'] ? 'warning' : 'success' ?>">
                                               <?= $item['use_uid'] ? '已使用' : '未使用' ?>
                                           </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['code'] ?></td>
                                    <td class="am-text-middle"><?= $item['use_uid'] ?></td>
                                    <td class="am-text-middle"><?= $item["make"]["nickName"] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle"><?= $item['use_time'] ?></td>
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
        var url = "<?= url('content.article/delete') ?>";
        $('.item-delete').delete('article_id', url);
    });
</script>

