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

/* 
**************图片预加载插件****************** 
///作者：没剑(2008-06-23) 
///http://regedit.cnblogs.com 

///说明：在图片加载前显示一个加载标志，当图片下载完毕后显示图片出来 
可对图片进行是否自动缩放功能 
此插件使用时可让页面先加载，而图片后加载的方式， 
解决了平时使用时要在图片显示出来后才能进行缩放时撑大布局的问题 
///参数设置： 
scaling 是否等比例自动缩放 
width 图片最大高 
height 图片最大宽 
loadpic 加载中的图片路径 
*/ 
jQuery.fn.LoadImage=function(scaling,width,height,loadpic){ 
    if(loadpic==null)loadpic="/static/images/loading.gif"; 
    return this.each(function(){ 
        var t=$(this); 
        var src=$(this).attr("src") 
        var img=new Image(); 
        //alert("Loading") 
        img.src=src; 
        //自动缩放图片 
        var autoScaling=function(){ 
            if(scaling){ 
                if(img.width>0 && img.height>0){ 
                    if(img.width/img.height>=width/height){ 
                        if(img.width>width){ 
                            t.width(width); 
                            t.height((img.height*width)/img.width); 
                        }else{ 
                            t.width(img.width); 
                            t.height(img.height); 
                        } 
                    } 
                    else{ 
                        if(img.height>height){ 
                            t.height(height); 
                            t.width((img.width*height)/img.height); 
                        }else{ 
                            t.width(img.width); 
                            t.height(img.height); 
                        } 
                    } 
                } 
            } 
        } 
        //处理ff下会自动读取缓存图片 
        if(img.complete){ 
            //alert("getToCache!"); 
            autoScaling(); 
            return; 
        } 
        $(this).attr("src",""); 
        var loading=$("<img alt=\"加载中\" title=\"图片加载中\" src=\""+loadpic+"\" />"); 

        t.hide(); 
        t.after(loading); 
        $(img).load(function(){ 
            autoScaling(); 
            loading.remove(); 
            t.attr("src",this.src); 
            t.show(); 
        }); 

    }); 
}

jQuery.fn.ReloadImage=function(url){ 
    loadpic="/static/images/loading.gif"; 
    return this.each(function(){ 
        $(this).attr("src",loadpic); 
        var t=$(this); 
        var img=new Image(); 
        img.src=url; 
        $(img).load(function(){ 
            t.attr("src",url); 
        }); 
    }); 
}