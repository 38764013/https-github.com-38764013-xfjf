<?php
/**
 * 后台菜单配置
 *    'home' => [
 *       'name' => '首页',                // 菜单名称
 *       'icon' => 'icon-home',          // 图标 (class)
 *       'index' => 'index/index',         // 链接
 *     ],
 */
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
    'store' => [
        'name' => '管理员',
        'icon' => 'icon-guanliyuan',
        'index' => 'store.user/index',
        'submenu' => [
            [
                'name' => '管理员列表',
                'index' => 'store.user/index',
                'uris' => [
                    'store.user/index',
                    'store.user/add',
                    'store.user/edit',
                    'store.user/delete',
                ],
            ],
            [
                'name' => '角色管理',
                'index' => 'store.role/index',
                'uris' => [
                    'store.role/index',
                    'store.role/add',
                    'store.role/edit',
                    'store.role/delete',
                ],
            ],
        ]
    ],
    'user' => [
        'name' => '用户管理',
        'icon' => 'icon-user',
        'index' => 'user/index',
        'submenu' => [
            [
                'name' => '用户列表',
                'index' => 'user/index',
            ],
            [
                'name' => '会员等级',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '等级管理',
                        'index' => 'user.grade/index',
                        'uris' => [
                            'user.grade/index',
                            'user.grade/add',
                            'user.grade/edit',
                            'user.grade/delete',
                        ]
                    ],
                ]
            ],
            [
                'name' => '余额记录',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '充值记录',
                        'index' => 'user.recharge/order',
                    ],
                    [
                        'name' => '余额明细',
                        'index' => 'user.balance/log',
                    ],
                ]
            ],
        ]
    ],
    'banner' => [
        'name' => '轮播图',
        'icon' => 'icon-marketing',
        'index' => 'banner/index',
        'submenu' => [
            [
                'name' => '轮播图列表',
                'index' => 'banner/index',
                'uris' => [
                    'banner/index',
                    'banner/add',
                    'banner/edit',
                    'banner/delete',
                ],
            ]
        ]
    ],
    'content' => [
        'name' => '内容管理',
        'icon' => 'icon-wenzhang',
        'index' => 'content.article/index',
        'submenu' => [
            [
                'name' => '文章管理',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '文章列表',
                        'index' => 'content.article/index',
                        'uris' => [
                            'content.article/index',
                            'content.article/add',
                            'content.article/edit',
                        ]
                    ],
                    [
                        'name' => '文章分类',
                        'index' => 'content.article.category/index',
                        'uris' => [
                            'content.article.category/index',
                            'content.article.category/add',
                            'content.article.category/edit',
                        ]
                    ],
                ]
            ],
            [
                'name' => '文件库管理',
                'submenu' => [
                    [
                        'name' => '文件分组',
                        'index' => 'content.files.group/index',
                        'uris' => [
                            'content.files.group/index',
                            'content.files.group/add',
                            'content.files.group/edit',
                        ]
                    ],
                    [
                        'name' => '文件列表',
                        'index' => 'content.files/index'
                    ],
                    [
                        'name' => '回收站',
                        'index' => 'content.files/recycle',
                    ],
                ]
            ],
        ]
    ],
    'wxapp' => [
        'name' => '小程序',
        'icon' => 'icon-wxapp',
        'color' => '#36b313',
        'index' => 'wxapp/setting',
        'submenu' => [
            [
                'name' => '小程序设置',
                'index' => 'wxapp/setting',
            ]
        ],
    ],
    'apps' => [
        'name' => '应用中心',
        'icon' => 'icon-application',
        'is_svg' => true,   // 多色图标
        'index' => 'apps.spool.index/index',
        'submenu' => [
            [
                'name' => '流量主',
                'index' => 'apps.spool.index/index',
            ], [
                'name' => '激励视频',
                'index' => 'apps.inspire.index/index',
            ],
            [
                'name' => '会员卡',
                'index' => 'apps.card.index/index',
                'submenu' => [
                    [
                        'name' => '生成记录',
                        'index' => 'apps.card.index/index',
                        'uris' => [
                            'apps.card.index/index',
                            'apps.card.index/add',
                            'apps.card.index/export',
                        ]
                    ],
                    [
                        'name' => '类型配置',
                        'index' => 'apps.card.setting/index'
                    ]
                ]
            ],
            [
                'name' => '用户充值',
                'index' => 'apps.card.recharge/index',
                'submenu' => [
                    [
                        'name' => '充值套餐',
                        'index' => 'apps.card.recharge.plan/index',
                        'uris' => [
                            'apps.card.recharge.plan/index',
                            'apps.card.recharge.plan/add',
                            'apps.card.recharge.plan/export',
                        ]
                    ],
                    [
                        'name' => '充值配置',
                        'index' => 'apps.card.recharge/setting'
                    ]
                ]
            ],
            [
                'name' => '首页导航',
                'index' => 'apps.card.recharge/index',
                'submenu' => [
                    [
                        'name' => '导航管理',
                        'index' => 'apps.navigation.index/index',
                        'uris' => [
                            'apps.navigation.index/index',
                            'apps.navigation.index/add',
                            'apps.navigation.index/edit',
                        ]
                    ],
                    [
                        'name' => '链接配置',
                        'index' => 'apps.navigation.index/links'
                    ]
                ]
            ],
        ]
    ],
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'setting/store',
        'submenu' => [
            [
                'name' => '系统设置',
                'index' => 'setting/store',
            ],
            [
                'name' => '百度OCR',
                'index' => 'setting/ocr',
            ],
            [
                'name' => '邀请有奖',
                'index' => 'setting/share',
            ],
            [
                'name' => '上传设置',
                'index' => 'setting/storage',
            ],
            [
                'name' => '小票打印机',
                'submenu' => [
                    [
                        'name' => '打印机管理',
                        'index' => 'setting.printer/index',
                        'uris' => [
                            'setting.printer/index',
                            'setting.printer/add',
                            'setting.printer/edit'
                        ]
                    ],
                    [
                        'name' => '打印设置',
                        'index' => 'setting/printer'
                    ]
                ]
            ],
            [
                'name' => '其他',
                'submenu' => [
                    [
                        'name' => '清理缓存',
                        'index' => 'setting.cache/clear'
                    ]
                ]
            ]
        ],
    ],
];
