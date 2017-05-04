/**
 * 	四级地址库级联操作
 *	前提条件： jQuery库、包含省市的静态地址库region0.js
 */

(function($) {

    "use strict";

    $.fn.region = function(options) {

        if (options) {
            $.extend(true, $.fn.region.settings, options);
        }

        $.fn.region.obj = $(this);

        // 初始化
        $.fn.region.init();

    };

    // 默认参数设置
    $.fn.region.settings = {
        pid: -1, //pid:省份id
        cid: -1, //cid:城市id
        did: -1, //did:区id
        tid: -1 //tid:街道id
    };


    // 初始化
    $.fn.region.init = function() {
        var $this = $.fn.region.obj;
        $.fn.region.province = $this.find("select[name=province_id]");
        $.fn.region.city = $this.find("select[name=city_id]");
        $.fn.region.district = $this.find("select[name=district_id]");
        $.fn.region.town = $this.find("select[name=town_id]");
        $.fn.region.pselect();
        $.fn.region.actions();
    };


    // 省
    $.fn.region.pselect = function() {

        var tempHtml = '',
        	pid = $.fn.region.settings.pid;

        if (!arrCity0) {
            alert('addresses error.');
            return false;
        }

        if (-1 === pid) {
            $.fn.region.city.html('<option value="-1" selected>请选择</option>');
            $.updatelabel($.fn.region.city);
            $.fn.region.district.html('<option value="-1" selected>请选择</option>');
            $.updatelabel($.fn.region.district);
            $.fn.region.town.html('<option value="-1" selected>请选择</option>');
            $.updatelabel($.fn.region.town);
        }

        for (var i = 0; i < arrCity0.length; i++) {

            var id = parseInt(arrCity0[i].id),
                name = arrCity0[i].name,
                sub = arrCity0[i].sub;

            if (id === pid) {

                tempHtml += '<option value="' + id + '" selected>' + name + '</option>';

                if (sub && sub.length > 0) {
                    $.fn.region.cselect(sub);
                }

            } else {

                tempHtml += '<option value="' + id + '">' + name + '</option>';

            }

        }

        $.fn.region.province.html(tempHtml);
        $.updatelabel($.fn.region.province);

    };


    // 市
    $.fn.region.cselect = function(cities) {

        var tempHtml = '';

        if (cities.length > 0) {

            for (var i = 0; i < cities.length; i++) {

                var id = parseInt(cities[i].id),
                    name = cities[i].name,
                    cid = $.fn.region.settings.cid;

                if ((0 === i && -1 === cid) || (id === cid)) {

                    tempHtml += '<option value="' + id + '" selected>' + name + '</option>';

                    $.extend(true, $.fn.region.settings, {
                        cid: id
                    });

                    $.fn.region.rselect(id);

                } else {

                    tempHtml += '<option value="' + id + '">' + name + '</option>';

                }

            }

        } else {

            $.fn.region.rselect(0);

        }

        $.fn.region.city.html(tempHtml);
        $.updatelabel($.fn.region.city);

    };


    // 区
    $.fn.region.rselect = function(cityid) {

        var tempHtml = '';

        if (cityid != 0) {

            var url = OPPO.conf.STORE_URL + '/lib/regions/region' + cityid + '.js';

            $.getJSON(url, function(data, textStatus) {

                for (var i = 0; i < data.length; i++) {

                    var id = parseInt(data[i].id),
                        name = data[i].name,
                        sub = data[i].sub,
                        did = $.fn.region.settings.did;

                    if ((0 === i && -1 === did) || (id === did)) {

                        tempHtml += '<option value="' + id + '" selected>' + name + '</option>';

                        $.extend(true, $.fn.region.settings, {
                            did: id
                        });

                        if (sub.length > 0) {
                            $.fn.region.tselect(sub);
                        } else {
                            $.fn.region.tselect([]);
                        }

                    } else {

                        tempHtml += '<option value="' + id + '">' + name + '</option>';

                    }

                }

                $.fn.region.district.html(tempHtml);
                $.updatelabel($.fn.region.district);

            });

        }

    };


    // 镇
    $.fn.region.tselect = function(towns) {

        var tempHtml = '';

        for (var i = 0; i < towns.length; i++) {

            var id = parseInt(towns[i].id),
                name = towns[i].name,
                tid = $.fn.region.settings.tid;

            if ((0 === i && -1 === tid) || (id === tid)) {

                tempHtml += '<option value="' + id + '" selected>' + name + '</option>';

            } else {

                tempHtml += '<option value="' + id + '">' + name + '</option>';

            }

        }

        $.fn.region.town.html(tempHtml);
        $.updatelabel($.fn.region.town);

    };


    // 事件监听
    $.fn.region.actions = function() {

        $.fn.region.province.on("change", function() {

            var id = parseInt($(this).val());

            $.extend(true, $.fn.region.settings, {
                pid: id,
                cid: -1,
                did: -1,
                tid: -1
            });

            $.fn.region.pselect(arrCity0);

        });


        $.fn.region.city.on("change", function() {

            var id = parseInt($(this).val());

            $.extend(true, $.fn.region.settings, {
                cid: id,
                did: -1,
                tid: -1
            });

            $.fn.region.rselect(id);

        });


        $.fn.region.district.on("change", function() {

            var id = parseInt($(this).val());

            $.extend(true, $.fn.region.settings, {
                did: id,
                tid: -1
            });

            $.fn.region.rselect($.fn.region.settings.cid);

        });

    };


    // 更新select组件上span标签内显示内容
    $.updatelabel = function(obj) {
        $(obj).parent().find(".select_label").html("<span>" + $(obj).find("option:selected").text() + "</span>");
    };

})(jQuery);
