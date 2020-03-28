<?php

namespace app\controller\admin;

use app\controller\common\Base;
use getui\GeTui;
use think\Request;


class MessagePush extends Base
{
    protected $excludeValidateCheck = ['index', 'get'];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user_id = request()->UserModel->id;

        $carts = request()->UserModel->messagePushes()
            ->whereOr([
                ['user_id', 'like', $user_id],//指定用户 推送消息
                ['type', 'like', 0], //系统消息 所有人可见
            ])
            ->order('id', 'desc')->select();
        return showSuccess($carts);
    }

    public function get()
    {
        $param = request()->param();
        $limit = intval(getValByKey('limit', $param, 10));
        $model = $this->M;
        $totalCount = $model->count();
        $list = $model->page($param['page'], $limit)
            ->order(['id' => 'desc'])
            ->select();

        return showSuccess([
            'list' => $list,
            'totalCount' => $totalCount,
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $info = new GeTui();//实例化个推类
        $re = $this->M->Mcreate();

//       echo request()->UserModel->id;

        if ($re->type == 0) {//群发
            $info->pushMessageToApp($re);
        } else {//单发
            $info->pushMessageToSingle($re);
        }


    }


    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
