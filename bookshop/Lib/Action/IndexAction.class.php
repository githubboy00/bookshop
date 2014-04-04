<?php
class IndexAction extends Action {
    public function index(){
        $Data = M('items');
        $this->data = $Data->select();
        $check=$_SESSION[C('USER_AUTH_KEY')];
        if(isset($check))
        {
            $id=$_SESSION[C('USER_AUTH_KEY')];
            $this->assign(id,$id);


        }
        else{
            $id="还没登陆";
            $this->assign(id,$id);
        }
        $this->display();
    }

    public function check(){
        $check=D("user");
        if( $vo =$check->create())
        {
            $username=$_POST['user'];
            $password=$_POST['pw'];
            $userinfo=$check->where("user='$username'")->find();

            if(!empty($userinfo))
            {
                if($userinfo['pw'] == $password)
                {
                    $this->assign("jumpUrl","index");
                    // Session::set(C('USER_AUTH_KEY'),$userinfo['id']);
                    $_SESSION[C('USER_AUTH_KEY')]=$userinfo['user'];
                    $this->success('ok'.$_SESSION[C('USER_AUTH_KEY')]);

                }
                else
                {
                    $this->error('pw wrong');
                }
            }
            else
            {
                $this->error('no this user');
            }
        }
        else
        {
            // $this->error($cheack->getError());
            header("Content-Type:text/html; charset=GB2312");
            exit($check->getError() . ' [ <a href="javascript:history.back()">back</a> ]');
        }
    }

    public function order(){
        $Form   =   D('order');
        if($Form->create()) {
            $data['user']  = $_SESSION[C('USER_AUTH_KEY')];
            $data['in']  =   $_POST['in'];
            $data['no']  =   $_POST['no'];
            $data['image']  =   $_POST['image'];
            $result =   $Form->add($data);
            if($result) {
                $this->success('操作成功！');
            }else{

                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }


    public function signup(){
        $Form   =   D('User');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                header("Content-Type:text/html; charset=GB2312");
                $this->success('操作成功！');
            }else{
                header("Content-Type:text/html; charset=GB2312");
                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }

    public function orderlist(){
        $Form   =   M('Order');
        $condition['user'] = $_SESSION[C('USER_AUTH_KEY')];
        $this->data = $Form->where($condition)->select();
        $this->display();


    }

    public function dorder(){
        $User = M("Order");
        $id = $this->_post('id');
        $data =   $User->delete($id);
        if($data) {
            $this->success('操作成功！');
        }else{
            $this->error('数据错误');
        }

    }

    public function signout(){
        session_unset();
        session_destroy();
        $this->redirect('index.php/Index/index');


    }

    public function a(){
        $this->display();

    }


}