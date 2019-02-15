<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*');//允许跨域
class RegController extends Controller {
    //注册
    public function reg(){
        $verify=I('verify');
        $name=I('name');
        $pwd=I('pwd');
        $pwds=I('pwds');
        $email=I('email');
        if(!empty($name)&&!empty($pwd)&&!empty($pwds)&&!empty($email)){//如果用户名和密码非空
            //  $preg = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
            // if(!preg_match($preg,$name)){
            //     $this->ajaxReturn(array('status'=>'-1', 'msg'=>'账号或密码格式不正确!(含数字字母组合)'));
            // }
            if(!$this->check_verify($verify)){
                $this->ajaxReturn(array('status'=>'-2', 'msg'=>'验证码错误'));
            }
            $where['name'] = trim($name);
            $info=M('userinfo')->where($where)->find();
             if($info){
                $this->ajaxReturn(array('status'=>"1",'msg'=>'该用户已经注册！'));
             }
            $User = M('userinfo');
            $data['name'] = $name;
            $data['password'] = md5(trim($pwds));
            $data['status']=$status;
            $data['email']=$email;
            $User->add($data);
            $this->ajaxReturn(array('status'=>"1",'msg'=>'注册成功！'));
        }else{
           $this->ajaxReturn(array('status'=>"-1",'msg'=>'用户名、密码、邮箱不能为空！'));
        }
    }
    // 验证码
    public function verify(){
        $Verify = new Verify();
        $Verify->codeSet = '0123456789';
        $Verify->imageW  =  150;
        $Verify->imageH  =  58;
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->useCurve = false;
        $Verify->entry();
    }
    // 验证码校验
    private function check_verify($code, $id=''){
        $verify = new Verify();
        return $verify->check($code, $id);
    }
}