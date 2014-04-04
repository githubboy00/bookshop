<?php

class UserModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('user','require','标题必'),
        array('user','','帐号名称已经存在！',0,'unique',1),
    );

}