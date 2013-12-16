$(function(){
    var fbutton = $(".jOrder").find("div");
    var play = $("#js_play");
    var intro = $("#js_dcontent");
    var title = $("#js_dtitle");
    fbutton.click(function(){
        var url = $(this).attr('url');
        var cur_url = play.attr('src');
        if (url != cur_url) {
            $(".jOrder").find(".jCurrent").toggleClass("jCurrent");
            $(this).toggleClass("jCurrent");
            play.attr('src', url);
            intro.html($(this).attr('introduce'));
            title.html($(this).attr('title'));
        }
        return false;
    });
    var firstV = fbutton.first();
    if (firstV) {
        firstV.addClass("jCurrent");
        play.attr('src', firstV.attr('url'));
        intro.html(firstV.attr('introduce'));
        title.html(firstV.attr('title'));
    }
    var cates = $("#js_dcate").find("div");
    cates.click(function(){
        var keyword = $(this).html();
        window.location.href = '/?c=video&keyword='+keyword;
        return false;
    });
});