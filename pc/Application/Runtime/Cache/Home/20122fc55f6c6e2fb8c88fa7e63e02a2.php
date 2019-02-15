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

<link rel="stylesheet" href="/pc/Public/css/list.css?v=1">
<script src="/pc/Public/js/list.js?v=1"></script>
<body>
  <div class='list_warp wpn'>
    <div class='nav'>
    </div>
    <div class='listcont'>
        <ul class='cl'>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <div class='top'>
                <a href="<?php echo U('/Home/Detail/index',array('zpid'=>$vo[zpid]));?>" class='img'>
                  <img  class="lazy" data-original="<?php echo (C("view_replace_str.qiniu")); echo ($vo["cover"]); ?>" alt="">
                </a>
              </div>
              <div class='bot'>
                <p class='title'><?php echo ($vo["title"]); ?></p>
                <div class='cl info'>
                    <a href="<?php echo U('/Home/User/index',array('id'=>$vo[userid]));?>" class='head z'>
                        <img src="<?php echo (C("view_replace_str.qiniu")); echo ($vo["headurl"]); ?>" alt="">
                    </a>
                    <div class='name z'>
                      <?php echo ($vo["username"]); ?>
                    </div>
                </div>
              </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="page cl">
          <?php echo ($page); ?>
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

</body>

<script type="text/javascript" charset="utf-8">
  $(function() {
      $("img.lazy").lazyload({effect: "fadeIn"});
  });
</script>