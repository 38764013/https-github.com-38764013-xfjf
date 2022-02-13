<?php

namespace app\common\enum;

class CardType extends EnumBasics
{
    // 次卡
    const SECOND = 10;
    // 月卡
    const MONTH = 20;
    // 季卡
    const QUARTER = 30;
    // 年卡
    const YEAR = 40;

    /**
     * 获取枚举数据
     * @return array
     */
    public static function data()
    {
        return [
            self::SECOND => [
                'name' => '次卡',
                'value' => self::SECOND,
                'number' => 1
            ],
            self::MONTH => [
                'name' => '月卡',
                'value' => self::MONTH,
                'number' => 30
            ],
            self::QUARTER => [
                'name' => '季卡',
                'value' => self::QUARTER,
                'number' => 90
            ],
            self::YEAR => [
                'name' => '年卡',
                'value' => self::YEAR,
                'number' => 365
            ],
        ];
    }
}