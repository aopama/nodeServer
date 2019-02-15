<?php

//七牛上传函数
/*
 * $size 上传文件大小
 * $bucket 空间名称
 * $domin 空间默认域名
 */
function QiniuUpload(){
    $config=array(
        'maxSize' => '553145728',
        'rootPath' => './',
        'saveName' => array ('uniqid', ''),
        'driver' => 'Qiniu',
        'driverConfig' => array (
            'secretKey' => 'cuKrnMCMpSRv1tBAw8js1qMvUaZ1qNKIyJn1MFCL',
            'accessKey' => 'ARQQhePWLuJadcyuEyJLZGgGLfHa0vIs24Iuz30E',
            'domain' => 'oz4u4pvh2.bkt.clouddn.com/',
            'bucket' => 'ksssss',
        ),
    );
    $Upload = new \Think\Upload($config);
    $info = $Upload->upload($_FILES);
    if($info){
      echo json_encode($info,true);
    }else{
       echo $Upload->getError();
    }
}

//删除七牛上的文件
/*
 * $file 删除的文件
 * $bucket 空间名称
 * $domin 空间默认域名
 */
function QiniuDel($file){
        $config=array(
            'driverConfig' => array (
                'secretKey' => 'cuKrnMCMpSRv1tBAw8js1qMvUaZ1qNKIyJn1MFCL',
                'accessKey' => 'ARQQhePWLuJadcyuEyJLZGgGLfHa0vIs24Iuz30E',
                'domain' => 'oz4u4pvh2.bkt.clouddn.com/',
                'bucket' => 'ksssss',
            ),
        );
        $file_name = $file;//要删除的文件名称

        $Qiniu = new Think\Upload\Driver\Qiniu\QiniuStorage($config['driverConfig']);

        $result = $Qiniu->del($file_name);

        $error = $Qiniu->errorStr;//错误信息
        if(is_array($result) && !($error))
        {
            $data = ['status'=>1,'msg'=>'删除文件成功'];
        }
        else
        {
            $data = ['status'=>0,'msg'=>'删除文件失败，'.$error];
        }

        echo json_encode($data);

        exit;
}
//多图删除
function QiniuDels($files){
        $config=array(
            'driverConfig' => array (
                'secretKey' => 'cuKrnMCMpSRv1tBAw8js1qMvUaZ1qNKIyJn1MFCL',
                'accessKey' => 'ARQQhePWLuJadcyuEyJLZGgGLfHa0vIs24Iuz30E',
                'domain' => 'oz4u4pvh2.bkt.clouddn.com/',
                'bucket' => 'ksssss',
            ),
        );
        $file_name = $files;//要删除的文件名称

        $Qiniu = new Think\Upload\Driver\Qiniu\QiniuStorage($config['driverConfig']);
        $result = $Qiniu->delBatch($file_name);

        $error = $Qiniu->errorStr;//错误信息
        if(is_array($result) && !($error))
        {
            $data = ['status'=>1,'msg'=>'删除文件成功'];
        }
        else
        {
            $data = ['status'=>0,'msg'=>'删除文件失败，'.$error];
        }

        echo json_encode($data);

        exit;
}
//判断是否登录
/*
 *
 *
 *
 */
function is_login(){
// 判断用户是否登陆
    $user = isset($_SESSION['home_userinfo']['name']) ? $_SESSION['home_userinfo']['name'] :null;
    if(!$user){
        return true;
    }
}
