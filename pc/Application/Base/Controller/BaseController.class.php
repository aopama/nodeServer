<?php
namespace Base\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class BaseController extends Controller{
    public function _initialize(){
       // 自动运行方法
        if(!isset(session("userinfo"))){
            $this->error("没有登录");
        }
    }
}