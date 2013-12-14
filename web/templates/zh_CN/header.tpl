<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>樱桃子</title>
        <meta name="baidu_union_verify" content="f6cb118815ad833938e4f64529026c7a" />
        <link rel="stylesheet" href="<{s}>css/core.css<{/s}>" type="text/css" media="screen" />
        <script type="text/javascript" src="<{s}>js/jquery.js<{/s}>"></script>
        <script type="text/javascript" src="<{s}>js/core.js<{/s}>"></script>
    </head>
    <body class="home blog">
        <div class="junP jun950">
            <div class="junH">
                <div class="jSite">
                    <h1 class="jLogo"><a href="<{$URL}>">樱桃子之家</a></h1>
                </div>
                <div class="jNav">
                    <ul class="jMenu clearfix">
                        <li <{if $return.nav == 'index'}>class="current_page_item class_cur"<{else}>class="page_item"<{/if}>><a href="<{$URL}>">首页</a></li>
                        <li <{if $return.nav == 'info'}>class="current_page_item  class_cur"<{else}>class="page_item"<{/if}>><a href="<{$URL}>/?c=info">情报站</a></li>
                        <li <{if $return.nav == 'video'}>class="current_page_item  class_cur"<{else}>class="page_item"<{/if}>><a href="<{$URL}>/?c=video">TV放送局</a></li>
                        <li <{if $return.nav == 'fish'}>class="current_page_item  class_cur"<{else}>class="page_item"<{/if}>><a href="<{$URL}>/?c=fish">淘周边</a></li>
                        <li <{if $return.nav == 'draw'}>class="current_page_item  class_cur"<{else}>class="page_item"<{/if}>><a href="<{$URL}>/?c=draw">图集</a></li>
                    </ul>
                    <div class="jSearch">
                        <form method="post" id="searchform" action="<{$URL}>/?c=<{if $return.nav == 'index'}>fish<{else}><{$return.nav}><{/if}>">
                            <input type="text" class="jSKey" value="<{if !empty($return.keyword)}><{$return.keyword}><{else}>搜索<{/if}>"  name="keyword" id="js_keyword" />
                            <button class="jSBtn">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="junC">
                <div class="jLay jLayMS">