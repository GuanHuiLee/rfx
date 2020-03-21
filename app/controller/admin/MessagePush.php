<?php

namespace app\controller\admin;

use app\controller\common\Base;
use think\Request;
use JPush\Client as JPush;

class MessagePush extends Base
{
    protected $excludeValidateCheck = ['save'];

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
        $client = new JPush('185a6ab4c9324673b5007353', 'dc97d04cd9cb220be90b52c2');

        $client->push()
            ->setPlatform('all')
            ->addAllAudience()
            ->setNotificationAlert('Hello, JPush')
            ->send();

        return showSuccess($this->M->save());
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
