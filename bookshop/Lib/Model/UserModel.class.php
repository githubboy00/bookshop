<?php

class UserModel extends Model {
    // �����Զ���֤
    protected $_validate    =   array(
        array('user','require','�����'),
        array('user','','�ʺ������Ѿ����ڣ�',0,'unique',1),
    );

}