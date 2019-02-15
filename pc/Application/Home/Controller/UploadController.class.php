<?php
namespace Home\Controller;
use Home\Controller\BaseController ;

header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class UploadController extends BaseController {
      public function index(){
        $userinfo = session('home_userinfo');
        $this->assign('userinfo',$userinfo);
        $this->display();
      }
      //上传
      public function upload(){
        QiniuUpload();
      }
      //单个删除
      public function del(){
        $file= I('file'); // 获取用户名
        QiniuDel($file);
      }
      //批量删除
      public function dels(){
        $file=array(''); // 获取用户名
        QiniuDels($file);
      }
      //插入数据库数据
      public function works(){
        $session=session('home_userinfo');
        if(empty($session)){
          $this->redirect('/Home/Login');
          return false;
        }else{
          $userinfo = session('home_userinfo');
          $this->assign('userinfo',$userinfo);
        }
          $session=session('home_userinfo');
          $userid=$session['userid'];//用户id
          $title= I('title'); // 获取用户名
          $owner= I('owner'); //作品所有者
          $type= I('type'); //作品类型
          $profile= I('profile'); //作品描述
          $fmname= I('fmname'); //作品封面
          $zpname=I('zpname');//作品名称
          $time=date("Y-m-d H:i:s" ,time());

          if(!empty($title)){
              $User = M('works');
              $data['userid'] = $userid;
              $data['title'] = $title;
              $data['owner'] = $owner;
              $data['type']=$type;
              $data['headurl']=$session['headurl'];
              $data['des']=$profile;
              $data['cover']=$fmname;
              $data['imgurl']=$zpname;
              $data['creattime']=$time;
              $User->add($data);
              $this->ajaxReturn(array('status'=>"1",'msg'=>'添加成功！'));
          }else{
              $this->ajaxReturn(array('status'=>"-1",'msg'=>'添加失败！'));
          }
      }
}