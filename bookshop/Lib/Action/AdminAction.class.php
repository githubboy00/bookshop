<?php
class AdminAction extends Action {
    public function admin(){
        $check=$_SESSION[C('USER_AUTH_KEY')];

        if(!($check == 'imadmin'))
        {
            $this->error('pls login');

        }

        $Data = M('Items');
        $User = M('User');
        $this->data = $Data->select();
        $this->user = $User->select();
        $this->display();

    }
    public function check(){
        $check=D("Admin");
        if( $vo =$check->create())
        {
            $username=$_POST['admin'];
            $password=$_POST['pw'];
            $userinfo=$check->where("admin='$username'")->find();

            if(!empty($userinfo))
            {
                if($userinfo['pw'] == $password)
                {
                    $this->assign("jumpUrl","admin");

                    $_SESSION[C('USER_AUTH_KEY')]='imadmin';
                    $this->success('ok');

                }
                else
                {
                    $this->error('pw wrong');
                }
            }
            else
            {
                $this->error('no this admin');
            }
        }
        else
        {

            header("Content-Type:text/html; charset=GB2312");
            exit($check->getError() . ' [ <a href="javascript:history.back()">back</a> ]');
        }



    }


    public function login(){
        $this->display();

    }



    public function update(){

        $Form = M("Items");

        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['price'] = $_POST['price'];
        $result = $Form->save($data);

            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }

    public function detail($id=0){
        $Form   =   M('Items');
        // 读取数据
        $data =   $Form->find($id);
        if($data) {
            $this->data =   $data;
        }else{
            $this->error('数据错误');
        }
        $this->display();

    }


    public function ditems(){
        $Form   =   M('Items');
        if(file_exists('./Public/Uploads/s_'.$_POST['image'])){
            unlink('./Public/Uploads/s_'.$_POST['image']);
        }

        // 读取数据
        $data =   $Form->delete($_POST['id']);
        if($data) {

            $this->redirect('index.php/Admin/admin');
        }else{
            $this->error('数据错误');
        }

    }

    public function addone(){

        $Form   =   D('Items');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }

    public function duser($id=0){
        $Form   =   M('User');
        // 读取数据
        $data =   $Form->delete($id);
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


    public function uedit(){
        $check=$_SESSION[C('USER_AUTH_KEY')];

        if(!($check == 'imadmin'))
        {
            $this->error('pls login');

        }



        $User = M('User');

        $this->user = $User->select();
        $this->display();

    }

    public function upload() {
        if (!empty($_FILES)) {

            $this->_upload();
        }
    }


    public function _upload() {
        import('ORG.Net.UploadFile');

        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Public/Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = 'ORG.Util.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 's_';
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '100';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('ORG.Util.Image');


            $_POST['image'] = $uploadList[0]['savename'];
        }
        $model  = M('Items');
        //保存当前数据对象

        if(file_exists('./Public/Uploads/'.$_POST['purl'])){
            unlink('./Public/Uploads/'.$_POST['purl']);
        }

        $data['id']          = $_POST['id'];
        $data['image']          = $_POST['image'];
        $data['create_time']    = NOW_TIME;
        //$list   = $model->add($data);
        $list   = $model->save($data);
        if ($list !== false) {
            $this->success('上传图片成功！');
        } else {
            $this->error('上传图片失败!');
        }
    }



    }




