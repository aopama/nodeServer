$(function(){
//滑过导航显示子导航
  $(".quick-hd li").hover( function () {
    $(this).addClass("on");
      $(this).find(".quick-menu").show();
   },function () {
    $(this).removeClass("on");
      $(this).find(".quick-menu").hide();
  });

  $(document).click(function(){
    $(".search_warp").removeClass('on').find('input').blur();
  });
  $(".search_warp .icon-search").click(function(ev){
      var ev = ev || event, // enent做兼容
      isTrue = $(".search_warp").is(".on"); // 判断.search-hd是否是展开状态
      ev.stopPropagation(); // 阻止冒泡
      if($(".search_warp").addClass('on').find('input').val() == ""){ // 在输入框没有文字时执行
            if(isTrue){ // isTrue等于 true 移除on，false就添加on
              $(".search_warp").removeClass('on').find('input').blur();
            }else{
              $(".search_warp").addClass('on').find('input').focus();
            }
      }else{
         if(isTrue){
          $("#searchForm").submit();
        }
      }
  })
$(document).on('click','.search_warp',function(ev){
   ev.stopPropagation();
})
	 //退出
    $(document).on('click','.out',function(){
        $.ajax({
            type: "post",
            url: "http://localhost/pc/index.php/Home/Login/lgout",
            data: {
            },
            dataType: "json",
            success: function(result) {
              if(result.status=='1'){
                $(".login").load(location.href+".login");
                $('.tip').text(result.msg);
              }
            },
            error: function(result, a, b) {

            }
        });
    })
      //回车提交
    $(document).on("keydown","#keywords",function(e){
        var keyVal = $(this).val();
         if(keyVal=='' && e.keyCode == 13){
            e.preventDefault();
         }
    })
})