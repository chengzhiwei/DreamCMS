define(function (require, exports, module) {
    require('popBoxV3/css.css');
    var $ = require('jquery');
    module.exports = function (id, boxAry, act, callBack) {
        var boxId = id; //窗口识别ID
        var myThis = this;
        var box = boxAry; //窗口数组
        var popBoxV3Bg = '';
        var popBoxV3Box = '';
        var popBoxV3Close = '';
        var popBoxV3TilBtn = '';
        var popBoxV3Body = '';
        this.skin = [];
        this.popBoxV3BodyDomList = [];
        this.popBoxV3TilDomList = [];

        for (var i = 0; i < boxAry.length; i++) {
            this.popBoxV3TilDomList.push($('<a href="javascript:void(0)" class="popBoxV3Til js_' + boxId + '_til_btn">' + box[i].title + '</a>'));
            this.popBoxV3BodyDomList.push($('<div class="popBoxV3Body js_' + boxId + '_body" style="width:' + box[i].width + 'px; height:' + box[i].height + 'px">' + box[i].html + '</div>'));
        }

        this.addStyle = function () {
            var linkHtml = '';
            for (var i = 0; i < this.skin.length; i++) {
                linkHtml += '<link rel="stylesheet" PopBoxV3="' + boxId + '" type="text/css" href="' + this.skin[i] + '"/>'
            }
            $('link:last').after(linkHtml);
        };

        this.createTil = function () { //生成标题HTML结构
            var tilHtml = $('<div class="popBoxV3Head"></div>');
            if (box.length === 1) {
                this.popBoxV3TilDomList[0].removeAttr('href').removeClass('js_' + boxId + '_til_btn');
                var tmpDom = $('<div></div>');
                this.popBoxV3TilDomList[0] = $(tmpDom.html(this.popBoxV3TilDomList[0]).html().replace(/^<[a|A]/, '<span').replace(/<\/[a|A]>$/, '</span>'));
            } else {
                this.popBoxV3TilDomList[0].addClass('cur');
            }
            tilHtml.append(this.popBoxV3TilDomList[0]);

            for (var i = 1; i < box.length; i++) {
                tilHtml.append('<span class="popBoxV3Line"></span>');
                tilHtml.append(this.popBoxV3TilDomList[i]);
            }
            tilHtml.append('<a href="javascript:void(0)" class="popBoxV3Close" id="popBoxV3Close_' + boxId + '"></a>');
            return tilHtml;
        };

        this.createBody = function () { //生成主体HTML结构
            var bodyHtml = $('<div></div>');
            this.popBoxV3BodyDomList[0].addClass('cur');
            bodyHtml.append(this.popBoxV3BodyDomList[0]);

            for (var i = 1; i < box.length; i++) {
                bodyHtml.append(this.popBoxV3BodyDomList[i]);
            }
            return bodyHtml;
        };

        this.createBox = function () { //创建弹出框全部结构
            var popBoxHtml = $('<div class="popBoxV3Box" id="popBoxV3Box_' + boxId + '"></div>');

            popBoxHtml.append(this.createTil());
            popBoxHtml.append(this.createBody().children());
            $('body').append('<div class="popBoxV3Bg" id="popBoxV3Bg_' + boxId + '"></div>').append(popBoxHtml);
            popBoxV3Bg = $('#popBoxV3Bg_' + boxId);
            popBoxV3Box = $('#popBoxV3Box_' + boxId);
            popBoxV3Close = $('#popBoxV3Close_' + boxId);
            $(window).resize(function () {
                myThis.resize();
            });
            this.changeBox();
            popBoxV3Close.click(function () {
                myThis.hideBox();
            });
            act();
        };

        this.hideBox = function () {//窗体隐藏
            if (popBoxV3Box != '') {
                popBoxV3Bg.hide();
                popBoxV3Box.hide();
                callBack();
                if (this.skin.length != 0) {
                    $('link[PopBoxV3="' + boxId + '"]').remove();
                }
            }
        };

        this.showBox = function () {//窗体显示
            if (this.skin.length != 0) {
                this.addStyle();
            }
            if (popBoxV3Box == '') {
                this.createBox();
            } else {
                popBoxV3Bg.show();
                popBoxV3Box.show();
            }
            this.resize();
        };

        this.resize = function () {
            var windowHeight = $(window).height();
            var boxHeight = popBoxV3Box.outerHeight();
            var boxWidth = popBoxV3Box.outerWidth();
            popBoxV3Bg.height(windowHeight);
            popBoxV3Box.css('top', (windowHeight - boxHeight) / 2 + 'px');
            popBoxV3Box.css('margin-left', 0 - (boxWidth / 2) + 'px');
        };

        this.changeBox = function () {
            popBoxV3TilBtn = $('.js_' + boxId + '_til_btn');
            popBoxV3Body = $('.js_' + boxId + '_body');
            popBoxV3TilBtn.click(function () {
                var mThis = $(this);
                popBoxV3TilBtn.removeClass('cur');
                popBoxV3Body.removeClass('cur');
                mThis.addClass('cur');
                popBoxV3Body.eq(mThis.index('.js_' + boxId + '_til_btn')).addClass('cur');
                myThis.resize();
            });
        };

    };
});