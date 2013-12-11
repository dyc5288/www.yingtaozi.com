$(function(){
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
        if (Y.index == 12) {
            Y.index = 0;
        } else {
            Y.index += 1;
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
    
    var _time = window.setTimeout(function(){
        window.clearTimeout(_time);
        Y.switchimg();
    },3000);
});