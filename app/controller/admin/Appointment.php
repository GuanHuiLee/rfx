<?php

namespace app\controller\admin;

use app\controller\common\Base;
use getui\GeTui;
use think\Request;

class Appointment extends Base
{
    protected $excludeValidateCheck = ['index', 'get'];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $appointment = request()->UserModel->appointments()->with(['project'])->select();
        return showSuccess($appointment);
    }

    public function get()
    {
        $param = request()->param();
        $limit = intval(getValByKey('limit', $param, 10));
        $model = $this->M;
        $totalCount = $model->count();
        $list = $model->page($param['page'], $limit)
            ->with(['project'])
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
        return showSuccess($this->M->addAppointment());
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
        return showSuccess($this->M->Mupdate());
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        return showSuccess($this->M->Mdelete());
    }

    // 修改服务状态
    public function updateState()
    {
        $request = request();
        $info = new GeTui();//实例化个推类
        $re = new \app\model\admin\MessagePush();

        $name = $request->Model->name;
        $project = $request->Model->project->name;
        $create_time = $request->Model->create_time;
        echo request()->UserModel->id;

        $re->save([
            'title' => '订单完成',
            'content' => '您' . '提交的预约订单项目-' . $project . '-已完成',
            'type' => 1,
            'user_id' =>$request->Model->user_id
        ]);

        $info->pushMessageToSingle($re);
        return showSuccess($request->Model->save(['state' => $request->param('state')]));
    }
}
