/**
 * User: Eric Ma
 * Date: 14-8-4
 * Time: 上午9:20
 */
define(function (require, exports, module) {
    module.exports = {number: {
        random: Math.random(),
        getRandom: function (min, max) {
            return min + Math.round(Math.random() * (max - min));
        }
    },
        dataTime: {
            nowDate: new Date(),//现在的事件对象
            toFullYear: function (int) {//转四位年
                return parseInt(this.nowDate.getFullYear() / 100) * 100 + int;
            },
            addZero: function (int) {//个位数前面补0
                return '0' + int;
            },
            ssToms: function (int) {//秒到毫秒
                return int * 1000;
            },
            mmToss: function (int) {//分到秒
                return int * 60;
            },
            hhTomm: function (int) {//时到分
                return int * 60;
            },
            ddTohh: function (int) {//天到时
                return int * 24;
            },
            /**
             * @description 指定日期的其后几天的日期
             * @param {Date} d   日期对象
             * @param {object} obj   时间距离对象
             * @return {Date} Date
             */
            getDate: function (d, obj) {//指定天数
                return this.timestampToDate(this.dateToTimestamp(d) + this.getTimeLengthMs(obj));
            },
            /**
             * @description 今天的前后几天的指定日期
             * @param {object} obj  参数描述
             * @return {Date} Date
             */
            getTodayDate: function (obj) {
                return this.getDate(this.nowDate, obj)
            },
            /**
             * @author Eric MA
             * @description 时间距离对象转毫秒
             * @param {Object} obj  时间距离对象
             * obj = {
         *      dd:int,
         *      hh:int,
         *      mm:int,
         *      ss:int,
         *      ms: int
         * }
             * @return {int} int 整型毫秒时间长度
             */
            getTimeLengthMs: function (obj) {//时
                var int = 0;
                for (var p  in obj) {
                    switch (p) {
                        case 'dd':
                            int += this.ssToms(this.mmToss(this.hhTomm(this.ddTohh(parseInt(obj.dd)))));
                            break;
                        case 'hh':
                            int += this.ssToms(this.mmToss(this.hhTomm(parseInt(obj.hh))));
                            break;
                        case 'mm':
                            int += this.ssToms(this.mmToss(parseInt(obj.mm)));
                            break;
                        case 'ss':
                            int += this.ssToms(parseInt(obj.ss));
                            break;
                        case 'ms':
                            int += parseInt(obj.ms);
                            break;
                    }
                }
                return int;
            },
            /**
             * @author Eric MA
             * @description 毫秒转时间距离对象
             * @param {int} int  毫秒
             * obj = {
         *      dd:int,
         *      hh:int,
         *      mm:int,
         *      ss:int,
         *      ms: int
         * }
             * @return {obj} obj 时间距离对象
             */
            getTimeLengthObj: function (int) {
                var obj = {};
                var m = int;
                obj.dd = parseInt(m / 86400000);
                m = m % 86400000;
                if (m != 0) {
                    obj.hh = parseInt(m / 3600000);
                    m = m % 3600000;
                    if (m != 0) {
                        obj.mm = parseInt(m / 60000);
                        m = m % 60000;
                        if (m != 0) {
                            obj.ss = parseInt(m / 1000);
                            m = m % 1000;
                            if (m != 0) {
                                obj.ms = m;
                            }
                        }
                    }
                }
                return obj;
            },
            timestampToDate: function (int) {//时间戳转时间对象
                var d = false;
                if (int >= 0) {
                    d = new Date(int);
                }
                return d;
            },
            dateToTimestamp: function (d) {
                return d.getTime();
            },
            arrayToDate: function (ary) {//数组转时间对象
                var d = false;
                if (ary.length == 6) {
                    d = new Date(ary[0], ary[1], ary[2], ary[3], ary[4], ary[5]);
                } else if (ary.length == 7) {
                    d = new Date(ary[0], ary[1], ary[2], ary[3], ary[4], ary[5], ary[6]);
                }
                return d;
            },
            dateToArray: function (d) {//数组转时间对象
                var ary = [];
                ary.push(d.getFullYear());
                ary.push(d.getMonth() + 1);
                ary.push(d.getDate());
                ary.push(d.getHours());
                ary.push(d.getMinutes());
                ary.push(d.getSeconds());
                ary.push(d.getMilliseconds());
                return ary;
            },
            stringToDate: function (str) {//字符串转时间对象
                var d = false;
                var t = str.match(/\d+/g);
                if (t != null && t.length >= 1) {
                    var tAry = [1700, 0, 1, 0, 0, 0, 0];
                    var l = t.length;
                    if (t.length > tAry.length) {
                        l = tAry.length;
                    }
                    if (t[0].length == 2) {
                        t[0] = this.toFullYear(parseInt(t[0]));
                    }
                    for (var i = 0; i < l; i++) {
                        if (i != 1) {
                            tAry[i] = parseInt(t[i]);
                        } else {
                            tAry[i] = parseInt(t[i]) - 1;
                        }
                    }
                    d = new Date(tAry[0], tAry[1], tAry[2], tAry[3], tAry[4], tAry[5], tAry[6]);
                }
                return d;
            }
        },
        string: {
            trimRight: function (str) {//去除右空格
                return str.replace(/[" "|"　"]*$/, "");
            },
            trimLeft: function (str) {//去除左空格
                return str.replace(/^[" "|"　"]*/, "");
            },
            trim: function (str) {//去除左右空格
                return this.trimRight(this.trimLeft(str));
            },
            upperCase: function (str) {//字符串首字母大写
                return str.slice(0, 1).toUpperCase() + str.slice(1);
            },
            lowerCase: function (str) {
                return str.slice(0, 1).toLowerCase() + str.slice(1);
            },
            capitalize: function (str) {//单词符串首字母大写
                var ary = str.split(' ');
                var s = '';
                for (var i = 0; i < ary.length; i++) {
                    s += ' ' + this.upperCase(ary[i]);
                }
                return s.slice(1);
            },
            bigCamelCase: function (str) {//大驼峰命名
                return this.capitalize(str).replace(/ /g, '');
            },
            camelCase: function (str) {//小驼峰命名
                return this.lowerCase(this.bigCamelCase(str));
            }
        },
        /*常用正则表达式*/
        regex: {
            postCode: function (str) {//邮政编码
                var reg = /^\d{6}$/;
                return reg.test(str);
            },
            mobPhone: function (str) {//移动电话
                var reg = /^(\d{11})$/;
                return reg.test(str);
            },
            telPhone: function (str) {//固定电话
                var reg = /^(\d{3,4}-\d{7,8})$/;
                return reg.test(str);
            },
            phone: function (str) {//电话
                var reg = /^(\d{3,4}-\d{7,8})$|^(\d{11})$/;
                return reg.test(str);
            },
            email: function (str) {//email
                var reg = /^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/;
                return reg.test(str);
            },
            url: function (str) {//url
                var reg = /^([a-z]+:\/\/)?([a-z]([a-z0-9\-]*\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)|(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}[0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])(:[0-9]{1,5})?(\/[a-z0-9_\-\.~]+)*(\/([a-z0-9_\-\.]*)(\?[a-z0-9+_\-\.%=&amp;]*)?)?(#[a-z][a-z0-9_]*)?$/;
                return reg.test(str);
            },
            reg: function (reg, str) {//自定义正则表达式
                return reg.test(str);
            }
        }};
});
