define(function (require, exports, module) {
    require('errorBox/css.css');
    var $ = require('jquery');
    module.exports = function () {
        var errorBox = $('#errorBox');
        var top = 0;
        var time = 4;
        var width = 945;
        var t, msg;
        switch (arguments.length) {
            case 1:
                msg = arguments[0];
                break;
            case 2:
                msg = arguments[0];
                top = arguments[1];
                break;
            case 3 :
                msg = arguments[0];
                top = arguments[1];
                width = arguments[2];
        }
        if (errorBox.length !== 0) {
            errorBox.remove();
            clearTimeout(t);
        }
        $('body').append('<div class="errorBox" id="errorBox"><span>' + msg + '</span><a href="javascript:void(0)">x</a></div>');
        errorBox = $('#errorBox');
        errorBox.css('top', top + 'px');
        errorBox.css('width', width + 'px');
        errorBox.css('z-index', '999');
        function clearErrorBox() {
            clearTimeout(t);
            errorBox.fadeOut('fast', function () {
                errorBox.remove();
            });
        }

        t = setTimeout(clearErrorBox, time * 1000);
        errorBox.find('a').click(clearErrorBox);
    };
});