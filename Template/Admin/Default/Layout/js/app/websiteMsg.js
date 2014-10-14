// JavaScript Document
seajs.config(_seajsConfing);
seajs.use(['jquery'], function ($) {
    $(function () {
        //展开收起
        $('.js_raw_jj').click(function () {
            var myThis = $(this);
            var par = myThis.parent().parent().next();
            par.slideToggle(0, function () {
                if (par.is(":hidden")) {
                    myThis.removeClass('raw_jian');
                } else {
                    myThis.addClass('raw_jian');
                }
            })
        });

        //删除
        $('.js_delete').click(function () {
            var par = $(this).parent().parent().parent();
            var classid = par.attr('classid');
            if (confirm('确定要删除该栏目吗？')) {
                $.ajax({
                    type: "POST",
                    url: '',
                    data: 'classid=' + classid,
                    success: function (result) {
                        par.remove();
                        //window.location.reload();
                    }
                });
            }
        })
    })
});