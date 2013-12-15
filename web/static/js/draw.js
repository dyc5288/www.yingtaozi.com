$(function(){
    var data = $("#js_data").find('div');
    var first = data.first();
    var _image = $("#js_image");
    var cur = 0;
    var len = data.length;
    if (first) {
        set_image(first.attr('url'));
    }
    var width = 618;
    var mwidth = width / 3;
    var cleft = $("#js_change").offset().left;
    $("#js_change").mousemove(function(){
        var x = event.clientX;
        if (x - cleft > mwidth) {
            $(this).removeClass('jPreImg');            
            $(this).addClass('jNextImg');
        } else {
            $(this).removeClass('jNextImg');            
            $(this).addClass('jPreImg');
        }
        return false;
    }).click(function(e){
        var x = e.offsetX;
        if (x > mwidth) {
            next_image();
        } else {
            pre_image();
        }
        var cur_div = $("#js_data").find('[key="'+cur+'"]');
        if (cur_div) {
            var url = cur_div.attr('url');
            set_image(url);
        }
        return false;
    }).blur(function(){
        $(this).removeClass('jPreImg');
        $(this).removeClass('jNextImg');
        return false;
    });
    
    function set_image(url) {        
        _image.ReloadImage(url);
    }
    
    function next_image() {
        if (cur >= len-1) {
            cur = 0;
        } else {
            cur += 1;
        }
    }
    
    function pre_image() {
        if (cur <= 0) {
            cur = len-1;
        } else {
            cur -= 1;
        }
    }
});