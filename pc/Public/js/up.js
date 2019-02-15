$(function () {
    // 个人中心评论输入字数限制
    $(document).on('focus', '#profile', function () {
        var insertArea_ucent = $(this);
        var insertRemind_ucent = $(this).parent().find("p").find('em');
        //输入框   限制字数   提醒框
        wordLimit(insertArea_ucent, 500, insertRemind_ucent);
    });
    wordLimit = function (obj, num, chg) {
        obj.keyup(function () {
            var content = obj.val();
            if (obj.val().length > num) {
                obj.val(obj.val().substr(0, num));
            } else {
                chg.text(num - obj.val().length);
            }
        });
        if (obj.val().length >= 1 && obj.val().length <= num) {
            chg.text(num - obj.val().length);
        }
    };
    // 选择下拉框
    $(".select").click(function (e) {
        var $this = $(this);
        e.stopPropagation();
        var o = $(this).find('ul').css('display');
        if (o == 'none') {
            $(".sel_option").slideUp();
            $this.find(".sel_option").slideDown();
        } else {
            $this.find(".sel_option").slideUp();
        }
    })
    $(".sel_option").click(function (e) {
        e.stopPropagation();
    });
    $(document).click(function () {
        $(".sel_option").slideUp();
    });
    $(".sel_option li").click(function () {
        var list = $(this).parents(".sele");
        var titVal = $(this).text();
        list.find("span").text(titVal)
        list.find("span").attr('rel', $(this).attr('rel'))
        list.find(".sel_option").slideUp();
    })
    //上传
    var con = {
        fmdata: null,
    }
    //上传封面
    $(document).on("change", "#file", function () {
        var objUrl = getObjectURL(this.files[0]);
        if (objUrl) {
            $('.fmup .up').html('<img src="' + objUrl + '" alt="" />');
            $('.fmup .close').removeClass('hide');
        }
        function getObjectURL(file) {
            var url = null;
            if (window.createObjectURL != undefined) { // basic
                url = window.createObjectURL(file);
            } else if (window.URL != undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file);
            } else if (window.webkitURL != undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file);
            }
            return url;
        }
        //return false;
    });
    //删除封面
    $(document).on("click", ".fmup .close", function () {
        $('.fmup .up').html('<i class="icon-add-bold"></i>');
        $('.fmup .close').addClass('hide');
        $('#file').replaceWith('<input name="file" type="file" id="file"  />');
    })
    //作品
});
window.webuploader = {
    config: {
        thumbWidth: 110, //缩略图宽度，可省略，默认为110
        thumbHeight: 110, //缩略图高度，可省略，默认为110
        wrapId: 'uploader', //必填
    },
    //处理客户端新文件上传时，需要调用后台处理的地址, 必填
    uploadUrl: 'http://localhost/pc/index.php/Home/Upload/upload',
    //处理客户端原有文件更新时的后台处理地址，必填
    updateUrl: 'http://localhost/pc/index.php/Home/Upload/upload',
    //当客户端原有文件删除时的后台处理地址，必填
    removeUrl: 'http://localhost/pc/index.php/Home/Upload/upload',
    //初始化客户端上传文件，从后台获取文件的地址, 可选，当此参数为空时，默认已上传的文件为空
}