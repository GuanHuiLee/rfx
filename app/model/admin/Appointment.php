<?php

namespace app\model\admin;

use think\Model;

/**
 * @mixin think\Model
 */
class Appointment extends Model
{
    // 关联用户
    public function User()
    {
        return $this->belongsTo('User');
    }

}
