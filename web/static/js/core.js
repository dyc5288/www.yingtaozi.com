/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $(".jNav li").mouseenter(function(){
        $(".class_cur").toggleClass("current_page_item");
        $(".jNav li").toggleClass("page_item");
        $(this).toggleClass("current_page_item");
        return false;
    }).mouseleave(function(){
        $(this).toggleClass("current_page_item");
        $(".jNav li").toggleClass("page_item");
        $(".class_cur").toggleClass("current_page_item");
        return false;
    }).click(function(){
        var url = $(this).find('a').attr('href');
        window.location.href=url;
        return false;
    });
    var jkey = $("#js_keyword");
    if (jkey.val() != '搜索') {
        jkey.css('color', '#444');        
    }
    jkey.focus(function(){
        var val = $(this).val();
        if (val == '搜索') {
            $(this).val('');
            $(this).css('color', '#444');
        }
        return false;
    }).blur(function(){
        var val = $(this).val();
        if (!val) {
            $(this).val('搜索');
            $(this).css('color', '#bebebe');
        }
        return false;
    });
});
