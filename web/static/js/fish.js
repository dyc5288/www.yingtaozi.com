$(function(){
    var cateas = $("#js_dcatea").find("div");
    cateas.click(function(){
        var keyword = $(this).html();
        window.location.href = '/?c=fish&keyword='+keyword;
        return false;
    });
    var cur_keyword=$("#js_dcatea").attr('cur_keyword');
    cateas.each(function(){
        var k = $(this).html();
        if (k == cur_keyword) {
            $(this).addClass('jCurrent');
            return false;
        }
    });
    var catebs = $("#js_dcateb").find("div");
    catebs.click(function(){
        var keyword = $(this).html();
        window.location.href = '/?c=fish&keyword='+keyword;
        return false;
    });
    catebs.each(function(){
        var k = $(this).html();
        if (k == cur_keyword) {
            $(this).addClass('jCurrent');
            return false;
        }
    });
});