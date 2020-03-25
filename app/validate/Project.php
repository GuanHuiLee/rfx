<?php

namespace app\validate;


class Project extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'integer|>:0|isExist',
        'name|项目名称' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [];

    protected $scene = [
        'update' => ['id', 'name'],
        'save' => ['name'],
        'delete' => ['id'],
        'read' => ['id']
    ];
}
