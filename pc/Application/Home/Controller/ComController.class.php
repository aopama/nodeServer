<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class ComController extends Controller {
  public function index(){
    echo 111;
    $this->display();
  }

}