<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/info.css<{/s}>" type="text/css" media="screen" />
<div class="jMain">
    <div class="jWrap">
        <div class="jPost">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'info'}>">情报站</a> >> 正文
            </div>
            
            <div class="jDetailContent">
                <h3><a href=""><{if !empty($return.info)}><{$return.info.post_title}><{/if}></a></h3>
                <div class="jTimeFrom">
                    <div class="jTimeFromLeft">
                        <span>时间：<{if !empty($return.info)}><{$return.info.post_date}><{/if}></span> <span>来源：腾讯</span>
                    </div>
                    <div class="jShare">
                        <!-- Baidu Button BEGIN -->
                        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                        <span class="bds_more">分享到：</span>
                        <a class="bds_qzone"></a>
                        <a class="bds_tsina"></a>
                        <a class="bds_tqq"></a>
                        <a class="bds_renren"></a>
                        <a class="bds_t163"></a>
                        <a class="shareCount"></a>
                        </div>
                        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=5010029" ></script>
                        <script type="text/javascript" id="bdshell_js"></script>
                        <script type="text/javascript">
                        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                        </script>
                        <!-- Baidu Button END -->
                    </div>
                </div>
                <div class="jArticleContent">
                    <{if !empty($return.info)}>
                        <{$return.info.post_content|wpautop}>
                    <{else}>
                        不存在！
                    <{/if}>
                </div>                
                <div class="jRelative">
                    <div>上一篇：<a href="">《魁拔2》首度上映 让80后心头一热</a></div>                    
                    <div>下一篇：<a href="">《蓝精灵2》亮相坎昆 凯蒂派瑞蓝裙性感可爱</a></div>
                </div>
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
                    <li><a href="<{$URL}>/?c=info&a=detail&p=171">【漫画版】小丸子懂得了可惜</a></li>
                    <li><a href="<{$URL}>/?c=info&a=detail&p=165">【漫画版】小丸子的专属运动衫</a></li>
                    <li><a href="<{$URL}>/?c=info&a=detail&p=149">麦当劳推出2013年樱桃小丸子麦乐卡</a></li>
                    <li><a href="<{$URL}>/?c=info&a=detail&p=132">❤小丸子和大野❤在一起的日子</a></li>
                    <li><a href="<{$URL}>/?c=info&a=detail&p=119">12星座版“陈欧代言体”</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="jAds">
        <a href="www.baidu.com" target="_blank"><img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐"></a>
    </div>
</div>
<{include file='footer.tpl'}>