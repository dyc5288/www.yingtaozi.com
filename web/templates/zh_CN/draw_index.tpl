<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/draw.css<{/s}>" type="text/css" media="screen" />
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'draw'}>">图集</a> >>  列表
            </div>

            <div class="jContent">
                <{if !empty($return.data)}>
                    <{foreach from=$return.data key=k item=draw}>
                        <a href="<{$URL}>/?c=draw&a=detail">
                            <div class="jContainer<{'1'|draw:$k}>">
                                <div class="jTitle">
                                    <{$draw.post_title}>
                                </div>
                                <div class="jNine">
                                    <{'2'|draw:$draw.post_content}>
                                </div>
                            </div>
                        </a>
                    <{/foreach}>
                <{/if}> 
            </div>
        </div>        
    </div>
</div>
<{include file='footer.tpl'}>