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

<link rel="stylesheet" href="/pc/Public/css/up.css?v=12">
<link rel="stylesheet" href="/pc/Public/css/ups.css?v=121211">
<script src="/pc/Public/js/ajaxfileupload.js?v=101"></script>
<div class="nav_bg"></div>
<!-- 内容 -->
<div class="main_warp">
    <div class="main">
        <div class="title cl">
            <div class="p1 z">
                作品标题
            </div>
            <div class="z">
                <input class="inp" type="text" name="" value="" placeholder="25字以内">
            </div>
        </div>
        <div class="title cl">
            <div class="p1 z">
                所有者
            </div>
            <div class="z select">
                <div class="sele">
                    <span class='txt owner' rel='0'>原创作品</span>
                    <i class="arrow"></i>
                    <ul class="sel_option">
                        <li rel='0'>原创作品</li>
                        <li rel='1'>署名作品</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="title cl">
            <div class="p1 z">
                类型
            </div>
            <div class="z select">
                <div class="sele">
                    <span class='txt type' rel='0'>水墨油彩</span>
                    <i class="arrow"></i>
                    <ul class="sel_option">
                        <li rel='0'>水墨油彩</li>
                        <li rel='1'>摄影</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="title cl">
            <div class="p1 z">
                描述
            </div>
            <div class="z txta">
                <textarea placeholder="可以说明作品的创作背景、设计思路、团队成员等等有助于网友们进一步了解与探讨" name="profile" id="profile"></textarea>
                <p>还可以输入
                    <em>500</em>个字符</p>
            </div>
        </div>
        <!-- 封面 -->
        <div class="title cl">
            <div class="p1 z">
                上传封面
            </div>
            <div class="z">
                <div class="fmup">
                    <div class='close hide'>
                        <i class='icon-close'></i>
                    </div>
                    <div class='up'>
                        <i class='icon-add-bold'></i>
                    </div>
                    <input type="file" id="file" name="file" accept="image/*">
                </div>
            </div>
        </div>
        <!-- 作品 -->
        <div class="title cl">
            <div class="p1 z">
                上传作品
            </div>
            <div class="z">
                <div class="page-container">
                    <div id="uploader" class="wu-example">
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div id="filePicker"></div>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none">
                            <div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fabu cl">
            <button class="fabusave btn">发布</button>
        </div>
    </div>
</div>
<script src="/pc/Public/js/up.js?v=104"></script>
<script src="/pc/Public/js/webuploader.min.js"></script>
<script src="/pc/Public/js/extend-webuploader.js?v=132"></script>
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