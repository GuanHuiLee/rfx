<?php

namespace app\validate;

use think\Validate;

class Appointment extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'integer|>:0|isExist',
        'project_id|项目' => 'require',
        'name|姓名' => 'require',
        'phone|手机号' => 'require',
        'car_number|车牌号' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [];

    protected $scene = [
        'update' => ['id', 'car_number', 'name', 'project_id', 'phone'],
        'save' => ['car_number', 'name', 'project_id', 'phone'],
        'delete' => ['id'],
        'read' => ['id'],
        'updateState' => ['id']
    ];
}
