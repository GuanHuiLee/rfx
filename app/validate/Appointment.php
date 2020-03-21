<?php
declare (strict_types=1);

namespace app\validate;

use think\Validate;

class Appointment extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'integer|>:0|isExist',
        'project|标题' => 'require',
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
        'update' => ['car_number', 'name', 'project', 'phone'],
        'save' => ['car_number', 'name', 'project', 'phone'],
        'delete' => ['id'],
        'read' => ['id']
    ];
}
