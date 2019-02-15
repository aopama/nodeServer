<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class DetailController extends Controller {
 public function index(){
    $userinfo = session('home_userinfo');
    $this->assign('userinfo',$userinfo);
    //作品信息
    $zpid=I('get.zpid');
    $User = M('works'); //实例化User对象
    $map['zpid'] =$zpid;
    $list = $User->where($map)->select();
    $this->assign('data',$list);// 赋值数据集
    $this->assign('imgurl',explode(",",$list[0][imgurl]));// 赋值作品数据集
    //作品评论
    $Zp = M('comit'); //实例化User对象
    $map['zpid'] =$zpid;
    $plist = $Zp->where($map)->order('creattime desc')->select();
    $this->assign('plist',$plist);// 赋值数据集
    $this->display();
 }
 //评论
 public function pl(){
    $session=session('home_userinfo');
    if(empty($session)){
      $this->redirect('/Home/Login');
      return false;
    }else{
      $userinfo = session('home_userinfo');
      $this->assign('userinfo',$userinfo);
    }
    $cont= I('cont'); //获取内容
    $zpid=I('zpid');
    $replyname=I('replyname');
    $replycont=I('replycont');
    $state=I('status');
    if(!empty($cont)){
      $User = M('comit');
      $data['cont'] = $cont;
      $data['state'] = $state;
      $data['replyname'] = $replyname;
      $data['replycont'] = $replycont;
      $data['creattime']=date("Y-m-d H:i" ,time());
      $data['zpid']=$zpid;
      $data['pid']=session('home_userinfo')[userid];
      $data['uname']=session('home_userinfo')[name];
      $data['headurl']=session('home_userinfo')[headurl];
      $User->add($data);
      $this->ajaxReturn(array('status'=>"1",'msg'=>'评论成功！','result'=>$data));
    }else{
        $this->ajaxReturn(array('status'=>"-1",'msg'=>'评论失败！'));
    }
 }
}