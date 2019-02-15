<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class SetController extends Controller {
    public function index(){
    $userinfo = session('home_userinfo');
    $this->assign('userinfo',$userinfo);
       $this->display();
      }
}