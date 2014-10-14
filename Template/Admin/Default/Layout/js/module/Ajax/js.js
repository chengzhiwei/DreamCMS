/**
 * User: Eric Ma
 * Date: 14-8-12
 * Time: 上午8:56
 */
/**
 * @author Eric MA
 * @description ajax构造函数
 */
if (typeof seajs === 'object') {

    define(function (require, exports, module) {
        var $ = require('jquery');
        module.exports = function () {
            var config = {};
            if (arguments.length == 1) {
                config = arguments[0];
            }
            /**
             * @author Eric MA
             * @description 设置Ajax配置 一个参数是参数设置对象 两个参数第一个是配置属性名 第二个是赋值
             */
            this.setConfig = function () {//设置Ajax配置
                if (arguments.length == 1) {
                    config = arguments[0];
                } else if (arguments.length == 2) {//设置Ajax配置
                    eval('config.' + arguments[0] + '=""');
                    for (var t in config) {
                        if (t == arguments[0] && config.hasOwnProperty(t)) {
                            config[t] = arguments[1];
                            break;
                        }
                    }

                }
            };
            this.doAjax = function () {
                $.ajax(config);
            };
        }
    });
} else {
    function Ajax() {
        var config = {};
        if (arguments.length == 1) {
            config = arguments[0];
        }
        /**
         * @author Eric MA
         * @description 设置Ajax配置 一个参数:参数设置对象
         *                          两个参数:参数设置对象属性名 参数设置对象属性值
         */
        this.setConfig = function () {//设置Ajax配置
            if (arguments.length == 1) {
                config = arguments[0];
            } else if (arguments.length == 2) {//设置Ajax配置
                eval('config.' + arguments[0] + '=""');
                for (var t in config) {
                    if (t == arguments[0] && config.hasOwnProperty(t)) {
                        config[t] = arguments[1];
                        break;
                    }
                }

            }
        };
        this.doAjax = function () {
            $.ajax(config);
        };
    }
}
