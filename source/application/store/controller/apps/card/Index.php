<?php

namespace app\store\controller\apps\card;

use app\store\controller\Controller;
use app\store\model\apps\Card;
use app\store\model\User;
use app\store\model\user\Grade;

class Index extends Controller
{
    public function index()
    {
        $card = new Card();
        $param = $this->request->param();
        $list = $card->getList($this->request->param());
        if (isset($param['is_export']) && $param['is_export'] == 1 && $list) {
            $fileName = time() . '.text';
            foreach ($list as $key => $val) {
                file_put_contents($fileName, $val['code'] . PHP_EOL, FILE_APPEND);
            }
            header('Location:' . $fileName);
        }
        return $this->fetch('index', compact("list"));
    }

    public function add()
    {
        $model = new Card;
        if (!$this->request->isAjax()) {
            $grade = (new Grade())->where("is_agent", 1)->select();// (new User())->join("grade","")->where("")->select();
            $agent = [];
            $index = 0;
            foreach ($grade as $key => $val) {
                $data = (new User())->where("grade_id", $val["grade_id"])->select()->toArray();
                foreach ($data as $k => $v) {
                    $agent[$index] = $v;
                    $index++;
                }
            }
            return $this->fetch('add', compact("agent"));
        }
        // 新增记录
        if ($model->add($this->postData('card'))) {
            return $this->renderSuccess('添加成功', url("apps.card.index/down"));
        }
        return $this->renderError($model->getError() ?: '添加失败');
    }

    public function down()
    {
        $file_url = "./" . md5(md5($this->getWxappId())) . ".txt";
        Header("Content-type: application/octet-stream");
        header('content-type:application/octet-stream');
        header('content-disposition:attachment; filename=' . basename($file_url));
        header('content-length:' . filesize($file_url));
        readfile($file_url);
    }
}