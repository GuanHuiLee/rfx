<?php

namespace app\model\admin;

use app\model\common\BaseModel;

/**
 * @mixin think\Model
 */
class Appointment extends BaseModel
{
    // 关联用户
    public function User()
    {
        return $this->belongsTo('User');
    }

    // 关联分类
    public function project()
    {
        return $this->belongsTo('Project');
    }


    // 列表
    public function Mlist()
    {
        $arr = $this->order([
            'id' => 'desc'
        ])->select();
        return $arr;
    }

    // 加入购物车
    public function addAppointment()
    {
        $param = request()->param();
        $user = request()->UserModel;
        $data = [
            'user_id' => $user->id,
            'name' => $param['name'],
            'phone' => $param['phone'],
            'car_number' => $param['car_number'],
            'project_id' => $param['project_id'],
        ];
        return $this->create($data);
    }
}
