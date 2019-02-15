<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>index</title>
    <link rel="stylesheet" href="/pc/Public/fonts/iconfont.css?v=23">
    <link rel="stylesheet" href="/pc/Public/css/public/public.css?v=2">
    <link rel="stylesheet" href="/pc/Public/css/public/header.css?v=123">
    <link rel="stylesheet" href="/pc/Public/css/public/footer.css">
    <link rel="stylesheet" href="/pc/Public/css/index.css">
    <script src="/pc/Public/js/jquery-1.10.2.js"></script>
    <script src="/pc/Public/layer/layer.js"></script>
    <script src="/pc/Public/js/header.js?v=12"></script>
    <script src="/pc/Public/js/msgtip.js?v=3"></script>
    <script src="/pc/Public/js/jquery.lazyload.js?v=3"></script>
</head>
<body>
    <div class="bg-white header">
        <div class=" wpn cl">
        <!-- <div class="header cl"> -->
            <a class="logo-hd" href="<?php echo U('/Home/Sye');?>" title="">
                <img src="/pc/Public/images/logo.png" alt="">
            </a>
            <ul class="nav-hd cl">
                <li <?php if(CONTROLLER_NAME == 'Sye'): ?>class="on"<?php endif; ?>><a href="<?php echo U('/Home/Sye');?>?">首页</a></li>
                <li <?php if(CONTROLLER_NAME == 'Yh'): ?>class="on"<?php endif; ?>><a href="<?php echo U('/Home/Yh');?>">油画</a></li>
                <li <?php if(CONTROLLER_NAME == 'Sy'): ?>class="on"<?php endif; ?>><a href="<?php echo U('/Home/Sy');?>">摄影</a></li>
                <li <?php if(CONTROLLER_NAME =='List'): ?>class="on"<?php endif; ?>><a href="<?php echo U('/Home/List');?>">全部作品</a></li>
            </ul>
            <div class="y cl">
                <div class="search_warp cl">
                <form id='searchForm' action="/pc/index.php/Home/Search/index.html" method="get">
                    <div class="search-select z">
                        <input type="text" class="search-val" placeholder="请输入您要查找的内容" autocomplete="off" value="" name="keywords" id="keywords">
                    </div>
                    <a class="search-btn z" href="javascript:;"><i class="icon-search"></i></a>
                </form>
                </div>
                <!--  -->
                <ul class="quick-hd cl">
                    <li class="quick-item">
                        <a class="quick-toggle" href="<?php echo U('/Home/Upload/index');?>">
                            <i class="icon-cloud"></i>
                        </a>
                        <ul class="quick-menu quick-list">
                            <li><a href="<?php echo U('/Home/Upload/index');?>"><i class="icon-up-pic"></i>上传作品</a></li>
                        </ul>
                    </li>
                    <li class="quick-item login">
                        <?php if(is_login()): ?><a class="quick-toggle" href="<?php echo U('/Home/Login');?>">
                                登录
                            </a>
                        <?php else: ?>
                            <a class="quick-toggle" href="<?php echo U('/Home/User/index',array('id'=>$userinfo[userid]));?>">
                                <img src="<?php echo (C("view_replace_str.qiniu")); echo ($_SESSION['home_userinfo']['headurl']); ?>" alt="">
                            </a>
                            <ul class="quick-menu quick-list" style="display: none;">
                                <li><a href="<?php echo U('/Home/Sye');?>" class='out'><i class="icon-exit"></i>退出登录</a></li>
                            </ul><?php endif; ?>
                    </li>
                </ul>
            </div>
                    </li>
                </ul>
            </div>

        <!--</div> header -->
        </div><!-- wpn -->
    </div><!-- 头部 -->

<link rel="stylesheet" href="/pc/Public/css/detail.css?v=112">
<script src="/pc/Public/js/detail.js?v=11"></script>
<div class='wpn dtwarp cl'>
  <input type="hidden" class='zpid' value='<?php echo ($data[0][zpid]); ?>'>
  <div class='works-main'>
    <div class='works-top'>
      <div class='title'>
        <?php echo ($data[0][title]); ?>
      </div>
      <div class='det cl'>
          <span class="tag"><?php echo ($data[0][owner]); ?></span>
          <span>分类：<em><?php echo ($data[0][type]); ?></em></span>
      </div>
       <div class='det cl'>
        <span class='time'>
          <i class="icon-time"></i>
          <em><?php echo ($data[0][creattime]); ?></em>
        </span>
      </div>
    </div>
    <!-- 图文 -->
    <div class='works-cont'>
        <p><?php echo ($data[0][des]); ?></p>
        <div class='imgcont'>
            <?php if(is_array($imgurl)): $i = 0; $__LIST__ = $imgurl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
                  <img src="<?php echo (C("view_replace_str.qiniu")); echo ($vo); ?>" alt="">
              </p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
      <!-- 评论 -->
    <div class='comit cl' url='<?php echo (C("view_replace_str.qiniu")); ?>'>
      <div class='comedit'>
         <?php if(is_login()): ?><div class="nologin cl">
            <div class='y'>
              <a class='z' href="<?php echo U('/Home/Reg');?>">注册</a>
              <a class='z login' href="<?php echo U('/Home/Login');?>">登录</a>
            </div>
          </div>
           <?php else: ?>
          <div class='txtarea'>
             <textarea id='profile' class="com-area" name=""></textarea>
             <p class="comment-warn">还可以输入<span id="com-num">501</span>个字</p>
          </div>
          <div class='btnwarp cl'>
            <button class='pl btnpl y' rel='0'>评论</button>
          </div><?php endif; ?>
      </div>
        <div class='comlist'>
           <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datas): $mod = ($i % 2 );++$i;?><li uname="<?php echo ($datas["uname"]); ?>" url='<?php echo (C("view_replace_str.qiniu")); ?>'>
                    <div class='cl'>
                      <div class='left z'>
                          <a href="<?php echo U('/Home/User/index',array('id'=>$datas[pid]));?>" class='head_'>
                            <img src="<?php echo (C("view_replace_str.qiniu")); echo ($datas["headurl"]); ?>" alt="">
                          </a>
                      </div>
                      <div class='right z'>
                          <p class="name"><a href=''><?php echo ($datas["uname"]); ?></a><span class='time'><?php echo ($datas["creattime"]); ?></span></p>
                          <?php if($datas["state"] == 1): ?><div class='retxt'>
                              @<?php echo ($datas["replyname"]); ?>:<?php echo ($datas["replycont"]); ?>
                            </div><?php endif; ?>
                          <p class='cont'><?php echo ($datas["cont"]); ?></p>
                            <span class='reply replybtn' <?php if(is_login()): ?>ref="1"<?php endif; ?>>回复</span>
                          <div class="replycont">
                            <div class='pos'>
                              <textarea id='profile' class="reply-area" name=""></textarea>
                              <p class="comment-warn">还可以输入<span id="com-num">501</span>个字</p>
                            </div>
                            <p>
                              <div class="y">
                                <button class="canl z">取消</button>
                                <button class="pl btnpl z" rel="1">提交</button>
                              </div>
                            </p>
                          </div>
                      </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
  </div>
  <!-- 右侧 -->
  <div class='aside'>
    <div class='wa_cont'>
         <div class='zbd_portrait'>
            <a href="<?php echo U('/Home/User/index',array('id'=>$data[0][userid]));?>">
                <img src="<?php echo (C("view_replace_str.qiniu")); echo ($data[0][headurl]); ?>" alt="">
            </a>
        </div>
        <p class='uname'><?php echo ($data[0][username]); ?></p>
    </div>
  </div>
</div>
 <div class="foot_user">
    <div class="user_warp cl">
      <ul class="fl">
        <li><a href="javascript:;">关于MFY</a></li>
        <li><a href="javascript:;">联系我们</a></li>
        <li><a href="javascript:;">免责申明</a></li>
        <li><a href="javascript:;">官方QQ群</a></li>
      </ul>
      <p class="fl">Powered by © 2017-2030 MFY.CN</p>
    </div>
  </div>
</body>
</html>