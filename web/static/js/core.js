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
});
