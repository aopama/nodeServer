$(function(){
    //登录
    $(document).on('click','.sign',function(){
        $.ajax({
            type: "post",
            url: "http://localhost/pc/index.php/Home/Login/login",
            data: {
                name:$('.name').val(),
                pwd:$('.pwd').val()
            },
            dataType: "json",
            success: function(result) {
              if(result.status=='-1'){
                $('.tip').text(result.msg);
              }else if(result.status==1){
                 $('.tip').text(result.msg);
                  window.location.href='http://localhost/pc/index.php/Home/Sye';
              }
            },
            error: function(result, a, b) {

            }
        });
    })
})