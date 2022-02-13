<?php

namespace app\common\enum;

/**
 * 商城设置枚举类
 * Class Setting
 * @package app\common\enum
 */
class Setting extends EnumBasics
{
    // 商城设置
    const STORE = 'store';

    // 会员卡设置
    const CARD = 'card';

    // 百度OCR
    const OCR = 'ocr';

    // 邀请有奖
    const SHARE = 'share';

    // 流量主
    const SPOOL = 'spool';

    const INSPIRE = 'inspire';

    // 交易设置
    const TRADE = 'trade';

    // 短信通知
    const SMS = 'sms';

    // // 模板消息
    // const TPL_MSG = 'tplMsg';

    // 上传设置
    const STORAGE = 'storage';

    // 小票打印
    const PRINTER = 'printer';

    // 满额包邮设置
    const FULL_FREE = 'full_free';

    // 充值设置
    const RECHARGE = 'recharge';

    // 积分设置
    const POINTS = 'points';

    // 订阅消息设置
    const SUBMSG = 'submsg';

    /**
     * 获取订单类型值
     * @return array
     */
    public static function data()
    {
        return [
            self::STORE => [
                'value' => self::STORE,
                'describe' => '商城设置',
            ],
            self::OCR => [
                'value' => self::OCR,
                'describe' => 'OCR设置',
            ],
            self::SPOOL => [
                'value' => self::SPOOL,
                'describe' => '流量主',
            ],
            self::INSPIRE => [
                'value' => self::INSPIRE,
                'describe' => '激励视频',
            ],
            self::SHARE => [
                'value' => self::SHARE,
                'describe' => '邀请有奖',
            ],
            self::CARD => [
                'value' => self::CARD,
                'describe' => '会员卡设置',
            ],
            self::TRADE => [
                'value' => self::TRADE,
                'describe' => '交易设置',
            ],
            self::SMS => [
                'value' => self::SMS,
                'describe' => '短信通知',
            ],
            // self::TPL_MSG => [
            //     'value' => self::TPL_MSG,
            //     'describe' => '模板消息',
            // ],
            self::STORAGE => [
                'value' => self::STORAGE,
                'describe' => '上传设置',
            ],
            self::PRINTER => [
                'value' => self::PRINTER,
                'describe' => '小票打印',
            ],
            self::FULL_FREE => [
                'value' => self::FULL_FREE,
                'describe' => '满额包邮设置',
            ],
            self::RECHARGE => [
                'value' => self::RECHARGE,
                'describe' => '充值设置',
            ],
            self::POINTS => [
                'value' => self::POINTS,
                'describe' => '积分设置',
            ],
            self::SUBMSG => [
                'value' => self::SUBMSG,
                'describe' => '小程序订阅消息',
            ],
        ];
    }

}