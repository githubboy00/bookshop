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
                $this->success('�����ɹ���');
            }else{
                $this->error('д�����');
            }
        }

    public function detail($id=0){
        $Form   =   M('Items');
        // ��ȡ����
        $data =   $Form->find($id);
        if($data) {
            $this->data =   $data;
        }else{
            $this->error('���ݴ���');
        }
        $this->display();

    }


    public function ditems(){
        $Form   =   M('Items');
        if(file_exists('./Public/Uploads/s_'.$_POST['image'])){
            unlink('./Public/Uploads/s_'.$_POST['image']);
        }

        // ��ȡ����
        $data =   $Form->delete($_POST['id']);
        if($data) {

            $this->redirect('index.php/Admin/admin');
        }else{
            $this->error('���ݴ���');
        }

    }

    public function addone(){

        $Form   =   D('Items');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('�����ɹ���');
            }else{
                $this->error('д�����');
            }
        }else{
            $this->error($Form->getError());
        }
    }

    public function duser($id=0){
        $Form   =   M('User');
        // ��ȡ����
        $data =   $Form->delete($id);
        if($data) {
            $this->success('�����ɹ���');
        }else{
            $this->error('���ݴ���');
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

        //�����ϴ���
        $upload = new UploadFile();
        //�����ϴ��ļ���С
        $upload->maxSize            = 3292200;
        //�����ϴ��ļ�����
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //���ø����ϴ�Ŀ¼
        $upload->savePath           = './Public/Uploads/';
        //������Ҫ��������ͼ������ͼ���ļ���Ч
        $upload->thumb              = true;
        // ��������ͼƬ����·��
        $upload->imageClassPath     = 'ORG.Util.Image';
        //������Ҫ��������ͼ���ļ���׺
        $upload->thumbPrefix        = 's_';
        //��������ͼ�����
        $upload->thumbMaxWidth      = '100';
        //��������ͼ���߶�
        $upload->thumbMaxHeight     = '100';
        //�����ϴ��ļ�����
        $upload->saveRule           = 'uniqid';
        //ɾ��ԭͼ
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //�����ϴ��쳣
            $this->error($upload->getErrorMsg());
        } else {
            //ȡ�óɹ��ϴ����ļ���Ϣ
            $uploadList = $upload->getUploadFileInfo();
            import('ORG.Util.Image');


            $_POST['image'] = $uploadList[0]['savename'];
        }
        $model  = M('Items');
        //���浱ǰ���ݶ���

        if(file_exists('./Public/Uploads/'.$_POST['purl'])){
            unlink('./Public/Uploads/'.$_POST['purl']);
        }

        $data['id']          = $_POST['id'];
        $data['image']          = $_POST['image'];
        $data['create_time']    = NOW_TIME;
        //$list   = $model->add($data);
        $list   = $model->save($data);
        if ($list !== false) {
            $this->success('�ϴ�ͼƬ�ɹ���');
        } else {
            $this->error('�ϴ�ͼƬʧ��!');
        }
    }



    }




