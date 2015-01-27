var verify = {
    type: '',
    msg: '',
    cusreg: '',
    value: '',
    //必填
    require: function () {
        if ($.trim(this.value) == '')
        {
            return false;
        }
        return true;
    },
    //邮箱
    email: function ()
    {
        var szReg = /^[A-Za-zd]+([-_.][A-Za-zd]+)*@([A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
        var bChk = szReg.test(this.value);
        return bChk;
    },
    //数字
    int: function ()
    {
        var reg = /^[-+]?\d*$/;
        return reg.test(this.value);
    },
    //英文字母
    letter: function () {
        var reg = /^[a-zA-Z]+$/;
        return reg.test(this.value);
    },
    //自定义正则验证
    reg: function ()
    {
        var reg = this.cusreg;
        return reg.test(this.value);
    }
};
var poshytips = {
    tips: function (obj, content) {
        obj.poshytip({
            content: content,
            showOn: 'none',
            alignTo: 'target',
            alignX: 'right',
            alignY: 'center',
            offsetX: 10,
            offsetY: 0
        });
        obj.poshytip('show');
        obj.poshytip('hideDelayed', 2000);
    },
};
var settypeval = {
    name: '',
    id: '',
    checkbox: function () {
        var val = '';
        $("[name='" + this.name + "'][checked]").each(function () {
            val += $(this).val() + ',';
        });
        return val;
    },
    radio: function () {

    }

}
$(function () {

    $('.verifyForm').submit(function () {
         var bool=true;
        $(this).find("[verify]").each(function () {
            var verifyval = $(this).attr('verify');
            var jsonobj = jQuery.parseJSON(verifyval);
            var type = $(this).attr('type');
            obj = $(this);
            $.each(jsonobj, function (i, item) {
                verify.value = obj.val();
                var b = verify[item[0]]();
                if (!b)
                {
                    poshytips.tips(obj, item[1]);
                    bool=false;
                    return false;
                }
            });
        });
        return bool;
    });
})
