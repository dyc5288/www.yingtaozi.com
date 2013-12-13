<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/video.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/video.js<{/s}>"></script>
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'video'}>">TV放送局</a> >>  <{$return.video.post_title}>
            </div>

            <div class="jContent">
                <div class="jDvideo">
                    <iframe id="js_play" height=500 width=600 src="" frameborder=0 allowfullscreen></iframe>
                </div>
                <div class="jHeader">
                    <hr class="jHrLeft">
                    <h3>剧集列表</h3>
                    <hr class="jHrRight">
                </div>
                <div class="jOrder">
                    <{if !empty($return.post_content)}>
                        <{foreach from=$return.post_content key=k item=row}>
                            <div url="<{$row.url}>" introduce=""><{$row.id}></div>
                        <{/foreach}>
                    <{/if}>
                </div>
            </div>            
            
            <div class="jContent">
                <div class="jHeader">
                    <hr class="jHrLeft">
                    <h3>分集剧情</h3>
                    <hr class="jHrRight">
                </div>
                <div class="jDcontent" id="js_dcontent">
                    
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="jSide">
    <div class="jCategory">
        <div class="jDHeader">
            动漫列表
        </div>
        <div class="jDcate" id="js_dcate">
            <div>樱桃小丸子</div>
            <div>Hello Kitty</div>
            <div>龙猫</div>
            <div>火影忍者</div>
            <div>咖啡猫</div>
            <div>柯南</div>
            <div>海贼王</div>
            <div>哆啦A梦</div>
            <div>海绵宝宝</div>
            <div>犬夜叉</div>
            <div>阿狸</div>
            <div>IQ博士</div>
            <div>阿童木</div>
            <div>蜡笔小新</div>
            <div>黑执事</div>
            <div>七龙珠</div>
            <div>麦兜</div>
        </div>        
    </div>
    
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
                        <div class="jWord"><{$video.post_title}></div>
                    </a>
                </div>
            <{/foreach}>
        <{/if}>
    </div>
</div>
<{include file='footer.tpl'}>