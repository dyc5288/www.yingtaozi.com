/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $(".jNav li").mouseenter(function(){
        $(".jNav li").toggleClass("page_item");
        $(this).toggleClass("current_page_item");
    }).mouseleave(function(){
        $(".jNav li").toggleClass("page_item");
        $(this).toggleClass("current_page_item");
    });
});
