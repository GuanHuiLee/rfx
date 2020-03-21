<?php

namespace app\model\admin;

use app\model\common\BaseModel;

/**
 * @mixin think\Model
 */
class MessagePush extends BaseModel
{
    // 关联用户
    public function User()
    {
        return $this->belongsTo('User');
    }

}
