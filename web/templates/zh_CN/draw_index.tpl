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
                    <{assign var="k" value=0}>
                    <{foreach from=$return.data item=draw}>
                        <a href="<{$draw.ID|url:"draw_detail"}>">
                            <div class="jContainer<{'1'|draw:$k}>">
                                <div class="jTitle">
                                    <{$draw.post_title}>
                                </div>
                                <div class="jNine">
                                    <{'2'|draw:$draw.post_content}>
                                </div>
                            </div>
                        </a>
                        <{assign var="k" value=$k+1}>
                    <{/foreach}>
                <{/if}> 
                
                <{$return.page}>
            </div>
        </div>        
    </div>
</div>
<{include file='footer.tpl'}>