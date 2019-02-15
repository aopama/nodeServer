<?php
namespace Home\Controller;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class LoginController extends Controller {
    //登
    public function login(){
    //判断之前是不是登录过
      $session=session('home_userinfo');
      if(!empty($session['name']) || !empty($session['password'])){
          $name=$session['name'];
          $pwd=$session['password'];
          $this->ajaxReturn(array('status'=>'1', 'msg'=>'登录成功'));
      }else{
           $name= I('name'); // 获取用户名
           $pwd= I('pwd'); // 获取密码
      }
        if(!empty($name)&&!empty($pwd)){//如果用户名和密码非空
               $preg = '/^[A-Za-z0-9]{6,20}$/';
                if(!preg_match($preg, $name)){
                    $this->ajaxReturn(array('status'=>'-1', 'msg'=>'账号格式不正确'));
                }
                //用户名手机号、邮箱登录
                $where['_string'] = "name='{$name}' or phone='{$name}' or email='{$name}'";
                $where['password'] = md5(trim($pwd));
                $info=M('userinfo')->where($where)->find();
                if(!$info){
                     $this->ajaxReturn(array('status'=>'-1', 'msg'=>'账号密码错误'));
                }
                if($info['status']=='0'){
                     $this->ajaxReturn(array('status'=>'-1', 'msg'=>'账号已被冻结'));
                }
              session('home_userinfo', $info);
             $this->ajaxReturn(array('status'=>'1', 'msg'=>'登录成功'));
        }else{
          $this->ajaxReturn(array('status'=>'-1','msg'=>'用户名密码不能为空！'));
        }
      }
      //退出
      public function lgout(){
        session(null);
        $this->ajaxReturn(array('status'=>'1','msg'=>'退出成功！'));
      }

}