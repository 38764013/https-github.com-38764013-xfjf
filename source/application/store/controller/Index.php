<?php

namespace app\store\controller;

use app\common\service\JiebaTokenizer;
use app\common\service\TNTSearchService;
use app\store\model\camera\Cloud;
use app\store\model\camera\Exam;
use app\store\model\camera\Question;
use app\store\model\camera\Subject;
use app\store\model\Store as StoreModel;
use think\Config;
use think\Db;

/**
 * 后台首页
 * Class Index
 * @package app\store\controller
 */
class Index extends Controller
{
    /**
     * 后台首页
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function index()
    {
        return $this->fetch('index');
    }

    public function NoRand($begin = 0, $end = 20, $limit = 5)
    {
        $rand_array = range($begin, $end);
        shuffle($rand_array);//调用现成的数组随机排列函数
        return array_slice($rand_array, 0, $limit);//截取前$limit个
    }

    public function exam()
    {
//        $db = Config::get('00913');
//        $res = \db("camera_subject_img")->insertAll($db);
//        var_dump($res);die;
//        $model = new Question();
//        echo "<pre>";
//        for ($i=0;$i<10;$i++){
//            $orderSn = 'YC' .substr(time(), -3) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
//            /**飞鸟慕鱼博客 */
//            var_dump($orderSn);
//        }
//        $number = $this->NoRand();
//        $result = $model->allowField(true)->saveAll($db);
//        var_dump($result);
//        die;
//        $db = Config::get('cloud_db_4_7');
//        $cloud = new Cloud();
//        $result = $cloud->allowField(true)->saveAll($db);
//        echo "<pre>";
//        var_dump($result);die;
    }

}
