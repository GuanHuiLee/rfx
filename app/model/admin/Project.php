<?php

namespace app\model\admin;

use app\model\common\BaseModel;

/**
 * @mixin think\Model
 */
class Project extends BaseModel
{
    // 关联预约
    public function appointments()
    {
        return $this->hasMany('Appointment');
    }

    // 列表
    public function Mlist()
    {
        $arr = $this->order([
            'id' => 'asc'
        ])->select();
        return $arr;
    }

}
