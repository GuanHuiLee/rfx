<?php

namespace app\validate;

class MessagePush extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'integer|>:0|isExist',
        'title|标题' => 'require',
        'content|内容' => 'require',
        'type' => 'require|integer|in:0,1',
        'plat' => 'require|integer|in:0,1,2'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [];

    protected $scene = [
        'update' => ['title', 'content', 'type', 'plat'],
        'save' => ['title', 'content', 'type', 'plat'],
        'delete' => ['id'],
        'read' => ['id']
    ];

}
