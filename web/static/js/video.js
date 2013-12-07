$(function(){
    var fbutton = $(".jOrder").find("div");
    fbutton.click(function(){
        var url = $(this).attr('url');
        var play = $("#js_play");
        var cur_url = play.attr('src');
        if (url != cur_url) {
            $(".jOrder").find(".jCurrent").toggleClass("jCurrent");
            $(this).toggleClass("jCurrent");
            play.attr('src', url);
        }
        return false;
    });
    var firstV = fbutton.first();
    if (firstV) {
        $("#js_play").attr('src', firstV.attr('url'));        
    }
});