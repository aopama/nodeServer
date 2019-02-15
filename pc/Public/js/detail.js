/**
 *                    .::::.
 *                  .::::::::.
 *                 :::::::::::
 *             ..:::::::::::'
 *           '::::::::::::'
 *             .::::::::::
 *        '::::::::::::::..
 *             ..::::::::::::.
 *           ``::::::::::::::::
 *            ::::``:::::::::'        .:::.
 *           ::::'   ':::::'       .::::::::.
 *         .::::'      ::::     .:::::::'::::.
 *        .:::'       :::::  .:::::::::' ':::::.
 *       .::'        :::::.:::::::::'      ':::::.
 *      .::'         ::::::::::::::'         ``::::.
 *  ...:::           ::::::::::::'              ``::.
 * ```` ':.          ':::::::::'                  ::::..
 *                    '.:::::'                    ':'````..
 */
$(function(){
  $(document).scroll(function() {
      h = $(window).scrollTop();
      wh=$('.aside').offset().top-20;
      if (h >wh) {
          $('.wa_cont').addClass("fixed")
      }else if (h < wh) {
          $('.wa_cont').removeClass("fixed");
      }
  });
  //评论
  $(document).on('click','.comit .pl',function(){
        var that=$(this);
        var url=$('.comit').attr('url');
        var cont=$(this).parents('.comedit').find('.com-area').val();
        var zpid=$('.zpid').val();
        var status=$(this).attr('rel');
        var replyname='';
        var replycont='';
        if(status=='1'){
          replycont=$(this).parents('li').find('.cont').text();
          replyname=$(this).parents('li').attr('uname');
          var cont=$(this).parents('.replycont').find('.reply-area').val();
        }
        if(cont==''){
          errorTip('评论不能为空!','1');
          return false;
        }
        $.ajax({
            type: "post",
            url: "/pc/index.php/Home/Detail/pl",
            data: {
              cont:cont,
              zpid:zpid,
              status:status,
              replyname:replyname,
              replycont:replycont
            },
            beforeSend: function(){
              that.addClass('pov');
            },
            async : false,
            dataType: "json",
            success: function(result) {
              that.removeClass('pov');
              if(result.status=='1'){
                  $('.comlist').prepend('<li uname="'+result.result.uname+'">'+
                      '<div class="cl">'+
                        '<div class="left z">'+
                            '<a href="http://localhost/pc/index.php/Home/User/index/id/'+ result.result.pid +'" class="head_">'+
                              '<img src="'+url+''+result.result.headurl+'" alt="">'+
                            '</a>'+
                        '</div>'+
                        '<div class="right z">'+
                            '<p class="name"><a href="javascript:;">'+result.result.uname+'</a><span class="time">'+result.result.creattime+'</span></p>'+
                            '<div class="ncont"></div>'+
                            '<p class="cont">'+result.result.cont+'</p>'+
                            '<span class="reply replybtn">回复</span>'+
                            '<div class="replycont">'+
                              '<div class="pos">'+
                                '<textarea id="profile" class="reply-area" name=""></textarea>'+
                                '<p class="comment-warn">还可以输入<span id="com-num">501</span>个字</p>'+
                              '</div>'+
                              '<p>'+
                                '<div class="y">'+
                                  '<button class="canl z">取消</button>'+
                                  '<button class="pl btnpl z" rel="1">提交</button>'+
                                '</div>'+
                              '</p>'+
                            '</div>'+
                        '</div>'+
                      '</div>'+
                  '</li>').slideDown();
                  if(result.result.state=='1'){
                    $('.ncont').html('<div class="retxt">@'+result.result.replyname+':'+result.result.replycont+'</div>');
                    successTip('回复成功！','2')
                    $('.replycont').slideUp();
                    $('.reply-area').val('');
                  }else{
                    successTip('评论成功！','2');
                    $('.com-area').val('');
                  }
                  $('#com-num').text('501');
              }else if(result.status=='-1'){
                 errorTip('评论不能为空!','1');
                return false;
              }
            },
            error: function(result, a, b) {
                errorTip(b,'1');
            }
        })
  })
  //回复显示
  $(document).on('click','.reply',function(){
    if($(this).attr('ref')=='1'){
      errorTip('请登录！','1');
      window.location.href='/pc/index.php/Home/Login';
      return false;
    }else{
       $(this).parents('li').find('.replycont').slideDown(function(){
        $(this).parents('li').find('.reply-area').focus();
        });
    }
  })
    //回复隐藏
   $(document).on('click','.canl',function(){
    $(this).parents('li').find('.replycont').slideUp();
  })
    // 评论输入字数限制
    $(document).on('focus','#profile', function() {
        var insertArea_ucent = $(this);
        var insertRemind_ucent = $(this).parent().find("p").find('span');
         //输入框   限制字数   提醒框
        wordLimit(insertArea_ucent,501,insertRemind_ucent);
    });
    wordLimit = function(obj,num,chg){
        obj.keyup(function(){
            var content = obj.val();
                if(obj.val().length > num){
                    obj.val(obj.val().substr(0, num));
                }else{
                    chg.text(num - obj.val().length);
                }
        });
        if(obj.val().length >= 1 && obj.val().length <=num){
            chg.text(num - obj.val().length);
        }
    };
})