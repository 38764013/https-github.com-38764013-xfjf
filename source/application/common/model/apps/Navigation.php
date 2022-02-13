<?php


namespace app\common\model\apps;


use app\common\model\BaseModel;
use app\common\model\UploadFile;

class Navigation extends BaseModel
{
    protected $name = "camera_navigation";

    /**
     * 关联封面图
     * @return \think\model\relation\HasOne
     */
    public function image()
    {
        return $this->hasOne(UploadFile::class, 'file_id', 'image_id');
    }

    /**
     * 详情
     * @param $banner_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($banner_id)
    {
        return self::get($banner_id);
    }
}