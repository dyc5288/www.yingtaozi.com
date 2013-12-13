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
    var mwidth = width / 2;
    $("#js_change").mousemove(function(e){
        var x = e.offsetX;
        if (x > mwidth) {
            
        } else {
            
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
    });
    
    function set_image(url) {        
        _image.attr('src', url);
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