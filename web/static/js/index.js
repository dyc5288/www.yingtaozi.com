$(function(){
    /* 涛周边 */
    var fimg = $("#js_fish").find("img");
    var fi = $("#js_fish_img");
    var Y = {};
    Y.index = 0;
    Y.len = 12;
    fimg.mouseenter(function(){
        var _this = $(this);
        fi.attr('src', _this.attr('src'));     
        fi.attr('title', $(this).attr('title'));
        var fia = fi.parent();
        var fimga = $(this).parent();
        fia.attr('href', fimga.attr('href'));
        Y.index = $(this).attr('key');
        return false;
    });
    var firstV = fimg.first();
    if (firstV) {
        fi.attr('src', firstV.attr('src'));
        fi.attr('title', firstV.attr('title'));
        var fia = fi.parent();
        var fimga = firstV.parent();
        fia.attr('href', fimga.attr('href'));
    }    
    
    Y.switchimg = function(){
        if (Y.index >= Y.len - 1) {
            Y.index = 0;
        } else {
            Y.index = parseInt(Y.index) + 1;
        }
        fi.fadeOut(80);
        fi.hide();
        var cur = $("#js_fish").find('[key="'+Y.index+'"]');
        fi.attr('src', cur.attr('src'));
        fi.attr('title', cur.attr('title'));
        var fia = fi.parent();
        var fimga = cur.parent();
        fia.attr('href', fimga.attr('href'));
        fi.fadeIn();
        _time = window.setTimeout(function(){
            window.clearTimeout(_time);
            Y.switchimg();
        },3000);
    }    
    
    /*var _time = window.setTimeout(function(){
        window.clearTimeout(_time);
        Y.switchimg();
    },3000);*/
    
    /* 图集 */
    var dimg = $("#js_draw").find("img");
    var di = $("#js_draw_img");
    var D = {};
    D.index = 0;
    D.len = 12;
    dimg.mouseenter(function(){
        var _this = $(this);
        di.attr('src', _this.attr('url'));     
        di.attr('title', $(this).attr('title'));
        var dia = di.parent();
        var dimga = $(this).parent();
        dia.attr('href', dimga.attr('href'));
        D.index = $(this).attr('key');
        return false;
    });
    var firstD = dimg.first();
    if (firstD) {
        di.attr('src', firstD.attr('url'));
        di.attr('title', firstD.attr('title'));
        var dia = di.parent();
        var dimga = firstD.parent();
        dia.attr('href', dimga.attr('href'));
    }    
    
    D.switchimg = function(){
        if (D.index >= D.len - 1) {
            D.index = 0;
        } else {
            D.index = parseInt(D.index) + 1;
        }
        di.fadeOut(80);
        var cur = $("#js_draw").find('[key="'+D.index+'"]');
        di.attr('src', cur.attr('url'));
        di.attr('title', cur.attr('title'));
        var dia = di.parent();
        var dimga = cur.parent();
        dia.attr('href', dimga.attr('href'));
        di.fadeIn();
        _dtime = window.setTimeout(function(){
            window.clearTimeout(_dtime);
            D.switchimg();
        },5000);
    }    
    
    var _dtime = window.setTimeout(function(){
        window.clearTimeout(_dtime);
        D.switchimg();
    },5000);
    
});