// JavaScript Document
seajs.config(_seajsConfing);

seajs.use(['jquery'], function ($) {
    function resizeIframe() {
        var main = $('#main');
        main.height($(window).height() - main.offset().top);
    }

    $(function () {
        resizeIframe();
        $(window).resize(function () {
            resizeIframe();
        });

        //左侧切换
        $('.js_menu_button').click(function () {
            var myThis = $(this);
            $('.js_menu_button').removeClass('mmac');
            myThis.addClass('mmac');
            $('.js_list').hide();
            $('.js_list').eq(myThis.index()).show();
        });

        //左侧展开收起
        $('.js_bitem').click(function () {
            var myThis = $(this);
            myThis.next().slideToggle(0, function () {
                if (myThis.next().is(":hidden")) {
                    myThis.parent().removeClass('bitem1');
                } else {
                    myThis.parent().addClass('bitem1');
                }
            })

        });

        //左侧跳转页面
        $('.js_sitemu a,#ac_qucikadd').click(function () {
            var src = $(this).attr('src');
            $('#main').attr('src', src);
        });

        //语言切换
        $('#ac_qucikmenu').click(function () {
            if ($('#qucikmenu').is(':hidden')) {
                $('#qucikmenu').show();
				$('#qucikmenu>ul>li>a').click(function(){
					$('#ac_qucikmenu').html($(this).html());
					$('#qucikmenu').hide();
				})
            } else {
                $('#qucikmenu').hide();
            }
        });

        $('#qucikmenu').mouseleave(function () {
            $(this).hide();
        });
		
    })
});