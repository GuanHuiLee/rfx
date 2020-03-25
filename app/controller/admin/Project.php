<?php

namespace app\controller\admin;

use app\controller\common\Base;
use think\Request;

class Project extends Base
{
    protected $excludeValidateCheck = ['index'];

    /**
     * ��ʾ��Դ�б�
     *
     * @return \think\Response
     */
    public function index()
    {
        return showSuccess($this->M->Mlist());
    }

    /**
     * ��ʾ������Դ��ҳ.
     *
     * @return \think\Response
     */
    public function create()
    {

    }

    /**
     * �����½�����Դ
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        return showSuccess($this->M->Mcreate());
    }


    /**
     * ������µ���Դ
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
     * ɾ��ָ����Դ
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        return showSuccess($this->M->Mdelete());
    }
}
