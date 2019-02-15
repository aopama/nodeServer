<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class BaseController extends Controller{
    public function _initialize(){
      $session=session('home_userinfo');
       // 自动运行方法
        if(empty($session)){
          $this->redirect('/Home/Login');
        }else{
          $userinfo = session('home_userinfo');
          $this->assign('userinfo',$userinfo);
        }
    }
}
