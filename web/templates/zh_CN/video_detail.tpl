<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/video.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/video.js<{/s}>"></script>
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="">TV放送局</a> >>  视频列表
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
                            <{if $k == 1}>
                                <div class="jCurrent" url="<{$row.url}>"><{$row.id}></div>
                            <{else}>
                                <div url="<{$row.url}>"><{$row.id}></div>
                            <{/if}>
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
                <div class="jDcontent">
                    该片讲述了小丸子上幼稚园和小学低年级的故事，大家已经熟知了这个俏皮、童真、聪慧、富有创意又缺点一大把的女孩子。而在第二部中，小丸子已经升入了三年级。故事自然还是围绕着她在生活和学习中与家人、朋友、老师、同学之间发生的一桩桩有趣的情景展开，有关于亲情、爱心以及同学之间的友情。[3]或是一些生活小事，但当中有笑有泪，令人回想起童年的稚气。最特别的，当在故事人物尴尬时的招牌表情，会突然出现在脸上的黑线，有时还会伴随着一阵寒风从头后吹过。[2]
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
        <div class="jDcate">
            <div class="jCurrent">樱桃小丸子</div>
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
        
        <div class="jHotVideo">
            <a href="">
                <div class="jHotImg">
                    <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                </div>            
                <div class="jWord">殷桃小丸子 20周年</div>
            </a>
        </div>
        <div class="jHotVideo">
            <a href="">
                <div class="jHotImg">
                    <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                </div>            
                <div class="jWord">殷桃小丸子 20周年</div>
            </a>
        </div>
        <div class="jHotVideo">
            <a href="">
                <div class="jHotImg">
                    <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                </div>            
                <div class="jWord">殷桃小丸子 20周年</div>
            </a>
        </div>
        <div class="jHotVideo">
            <a href="">
                <div class="jHotImg">
                    <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                </div>            
                <div class="jWord">殷桃小丸子 20周年</div>
            </a>
        </div>
        <div class="jHotVideo">
            <a href="">
                <div class="jHotImg">
                    <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                </div>            
                <div class="jWord">殷桃小丸子 20周年</div>
            </a>
        </div>
    </div>
</div>
<{include file='footer.tpl'}>