<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/video.css<{/s}>" type="text/css" media="screen" />
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'video'}>">TV放送局</a> >>  视频列表
            </div>

            <div class="jContent">
                <div class="jHeader">
                    <hr class="jHrLeft"/>
                    <h3>视频列表</h3>
                    <hr class="jHrRight"/>
                </div>

                <div class="jMain2">
                    <{foreach from=$return.data item=video}>
                        <div class="jVideo">
                            <a href="<{$video.ID|url:"video_detail"}>">
                                <img src="<{$video.post_excerpt|excerpt}>" alt="">
                                <div class="jWord">
                                    <{$video.post_title}>
                                </div>
                            </a>
                        </div>
                    <{/foreach}>
                </div>               

                <{$return.page}>
            </div>
        </div>        
    </div>
</div>
<div class="jSide">
    <div class="jHot">
        <div class="jHeader">
            <hr class="jHrLeft"/>
            <h3>精彩推荐</h3>
            <hr class="jHrRight"/>
        </div>                
           
        <{if !empty($return.hot)}>
            <{foreach from=$return.hot item=video}>
                <div class="jHotVideo">
                    <a href="<{$video.ID|url:"video_detail"}>">
                        <div class="jHotImg">
                            <img src="<{$video.post_excerpt|excerpt}>" alt="<{$video.post_title}>">
                        </div>            
                        <div class="jWord"><{$video.post_title|truncate:17}></div>
                    </a>
                </div>
            <{/foreach}>
        <{/if}>
    </div>
</div>
<{include file='footer.tpl'}>