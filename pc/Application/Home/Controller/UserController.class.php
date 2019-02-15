<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class UserController extends Controller {
 public function index(){
    $userinfo = session('home_userinfo');
    $this->assign('userinfo',$userinfo);
    //用户信息
    $userid=I('get.id');
    $udata=M('userinfo')->getById($userid);
    $this->assign('udata',$udata);
    //用户作品列表分页
    $User = M('works'); // 实例化User对象
    $count      = $User->where('userid='.$userid)->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $Page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');//设置显示的样式
    $show       = $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $User->where('userid='.$userid)->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('count',$count);// 符合条件总条数
    $this->display();
  }
}