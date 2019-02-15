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

    <!-- 轮播 -->
    <link rel="stylesheet" href="/pc/Public/css/public/banner/pogo-slider.min.css">
    <script src="/pc/Public/js/banner/jquery.pogo-slider.min.js"></script>
    <script>
    $(function() {
        $('#dowebok').pogoSlider({
            slideTransition: 'fade', //淡入淡出效果
            generateButtons: true, //显示左右控制箭头
            displayProgess: true, //显示进度条
            autoplayTimeout: 4000, //幻灯片自动播放时的间隔
            autoplay: true, //幻灯片自动播放
            generateNav: true, //显示圆点导航
            responsive: false, //响应式
            pauseOnHover: true, //鼠标悬停暂停
            targetWidth: 1180, //指定幻灯片的宽度
            targetHeight: 470, //指定幻灯片的高度
            preserveTargetSize: false, //保持幻灯片大小比例
            slideTransitionDuration: 1000, //幻灯片过度效果持续时间
        });
    });
    </script>
    <div class="warp">
        <!--  轮播 -->
        <div class="banner">
            <div class="dowebok">
                <div class="pogoSlider" id="dowebok">
                    <div class="pogoSlider-slide" data-transition="fade" style="background-image:url(/pc/Public/images/banner/banner0.png);"></div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background-image:url(/pc/Public/images/banner/banner1.png);"></div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background-image:url(/pc/Public/images/banner/banner2.png);"></div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background-image:url(/pc/Public/images/banner/banner3.png);"></div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background-image:url(/pc/Public/images/banner/banner1.png);"></div>
                </div>
            </div>
        </div>
        <div class="main_index">
            <div class="wpn cl">
                <div class="list">
                    <ul class="cl">
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('/Home/Detail/index',array('zpid'=>$vo[zpid]));?>" title="">
                                <img src="<?php echo (C("view_replace_str.qiniu")); echo ($vo["cover"]); ?>" alt="">
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        <div class="wpn">
            <ul class="cl">
                <li class="fl">
                    <ul >
                        <li class="title on">
                            ABOUT
                        </li>
                        <li>
                            MYfineart作为XX爱好者的交流平台，所有
                            作品版权归作者所有.
                        </li>
                    </ul>
                </li>
                <li class="fl on">
                    <ul>
                        <li class="title">
                            友情链接
                        </li>
                        <li>
                            <a href="javascript:;" title="">
                                中国美术网
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="">
                                美术网
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="">
                                艺术中国
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="fr">
                    <ul>
                        <li class="title">
                            联系我们
                        </li>
                        <li class="cl">
                            <i class="fl icon-xinfeng"></i>
                            <span class="fl">325862578@qq.com</span>
                        </li>
                        <li class="cl">
                            <i class="fl icon-qq"></i>
                            <span class="fl">325862578</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>
</body>
</html>