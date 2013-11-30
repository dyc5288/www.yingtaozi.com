<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/info.css<{/s}>" type="text/css" media="screen" />
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="<{$URL}>/?c=info">情报站</a> >> 资讯列表
            </div>

            <div class="jContent">
                <{if !empty($return.data)}>
                    <{foreach from=$return.data item=info}>                        
                        <div class="jArticle">
                            <div class="jRightImg">
                                <a href="<{$info.ID|url:"info_detail"}>"><img src="<{$info.post_excerpt|excerpt}>" alt=""></a>
                            </div>
                            <div class="jLeftContent">
                                <h3><a href="<{$info.ID|url:"info_detail"}>"><{$info.post_title}></a></h3>
                                <div class="jTimeFrom">
                                    <span>时间：<{$info.post_date}></span> <span>来源：<{$info.post_excerpt|excerpt:'from'}></span>
                                </div>
                                <div class="jArticleContent">
                                    <{$info.post_content|truncate:250}>
                                </div>
                            </div>
                        </div>
                    <{/foreach}>
                <{else}>
                    <div class="jArticle">
                        暂无情报！
                    </div>
                <{/if}>           
                <{$return.page}>
            </div>
        </div>
    </div>
</div>
<div class="jSide">
    <div class="jHot">
        <div class="jBox">
            <div class="jBoxH">
                <h3>热点资讯</h3>
                <a href="">more>></a>
            </div>
            <div class="jBoxC">
                <ul class="jTxtList jNewsList">
                    <li><a href="http://www.yingtaozi.com/?p=171">【漫画版】小丸子懂得了可惜</a></li>
                    <li><a href="http://www.yingtaozi.com/?p=165">【漫画版】小丸子的专属运动衫</a></li>
                    <li><a href="http://www.yingtaozi.com/?p=149">麦当劳推出2013年樱桃小丸子麦乐卡</a></li>
                    <li><a href="http://www.yingtaozi.com/?p=132">❤小丸子和大野❤在一起的日子</a></li>
                    <li><a href="http://www.yingtaozi.com/?p=119">12星座版“陈欧代言体”</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="jAds">
        <a href="www.baidu.com" target="_blank"><img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐"></a>
    </div>
</div>
<{include file='footer.tpl'}>