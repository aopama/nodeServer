<?php
namespace Home\Controller;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class SyeController extends Controller {
  public function index(){
    $userinfo = session('home_userinfo');
    $this->assign('userinfo',$userinfo);

    $User = M('works'); //实例化User对象

    $list= $User->order('rand()')->limit(9)->select();
    $this->assign('data',$list);// 赋值数据集
    $this->display();
  }
}