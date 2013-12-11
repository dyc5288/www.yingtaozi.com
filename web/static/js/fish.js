$(function(){
    var cateas = $("#js_dcatea").find("div");
    cateas.click(function(){
        var keyword = $(this).html();
        window.location.href = '/?c=fish&keyword='+keyword;
        return false;
    });
    var catebs = $("#js_dcateb").find("div");
    catebs.click(function(){
        var keyword = $(this).html();
        window.location.href = '/?c=fish&keyword='+keyword;
        return false;
    });
});