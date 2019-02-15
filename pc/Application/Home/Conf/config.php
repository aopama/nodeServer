<?php
return array(
	//'配置项'=>'配置值'
   'view_replace_str'       => [
        '__PUBLIC__'=>'/public/',
        '__ROOT__' => '/',
        'qiniu'=>'http://oz4u4pvh2.bkt.clouddn.com/',
    ]
);
return array(
  //'配置项'=>'配置值'
  'URL_PATHINFO_DEPR'=>'_',
  //url访问模式为rewrite模式
  'URL_MODEL'=>'2',
  //开启伪静态
  'URL_HTML_SUFFIX' =>'.html',
  //开启路由
  'URL_ROUTER_ON' =>true,
  //路由规则
  'URL_ROUTE_RULES'=>array(
  'User/:id' => 'Home/User/index'
  ),
);