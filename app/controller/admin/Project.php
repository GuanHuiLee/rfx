<?php

namespace app\controller\admin;

use app\controller\common\Base;
use think\Request;

class Project extends Base
{
    protected $excludeValidateCheck = ['index'];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return showSuccess($this->M->Mlist());
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        return showSuccess($this->M->Mcreate());
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
}
