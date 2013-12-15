<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/fish.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/fish.js<{/s}>"></script>
<div class="jMain">
    <div class="jWrap">
        <div class="jPost" id="post-171">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'fish'}>">淘周边</a>  >> 产品列表
            </div>
            <div class="jContent">      
                <div class="jCol jFirst">
                    <div class="jProduct jCate">
                        <div class="jTheme" id="js_dcatea" cur_keyword="<{$return.keyword}>">
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
                        <div class="jCategory" id="js_dcateb">
                            <div>家居</div>
                            <div>服饰</div>
                            <div>文具</div>
                            <div>玩偶</div>
                            <div>配件</div>
                            <div>书籍</div>
                            <div>零食</div>
                            <div>个性</div>
                        </div>
                    </div>
                    <{if !empty($return.data)}>
                        <{foreach from=$return.data key=k item=product}>
                            <{$k|remainder:$return.lsize}>
                            <div class="jProduct">
                                <a href="<{$product.ID|url:"fish_detail"}>">
                                    <img src="<{$product.post_excerpt|excerpt}>" alt="">
                                    <div class="jWord">
                                        <{$product.post_title}>
                                    </div>
                                    <div class="jPrice">
                                        <{$product.post_excerpt|excerpt:'price'}>￥
                                    </div>
                                </a>
                            </div>
                        <{/foreach}>
                    <{/if}>            
                </div>
                <{$return.page}>
            </div>
        </div>
    </div>
</div>
<{include file='footer.tpl'}>