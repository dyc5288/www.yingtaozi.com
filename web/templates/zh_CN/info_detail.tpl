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
                        <script type="text/javascript">
                            var div = document.createElement('div');
                            var data =<{$return.info.post_content|wpautop}>;
                             div.innerHTML = data.html;
                            document.write(div.innerHTML);
                        </script>
                    <{else}>
                        不存在！
                    <{/if}>
                </div>                
                <div class="jRelative">
                    <{if !empty($return.previous)}><div>上一篇：<a href="<{$return.previous.ID|url:"info_detail"}>"><{$return.previous.post_title}></a></div><{/if}>             
                    <{if !empty($return.next)}><div>下一篇：<a href="<{$return.next.ID|url:"info_detail"}>"><{$return.next.post_title}></a></div><{/if}> 
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
                <a href="<{''|url:'info'}>">more>></a>
            </div>
            <div class="jBoxC">
                <ul class="jTxtList jNewsList">
                    <{if !empty($return.hot)}>
                        <{foreach from=$return.hot item=info}>
                            <li><a href="<{$info.ID|url:"info_detail"}>"><{$info.post_title|truncate:37}></a></li>
                        <{/foreach}>
                    <{/if}>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="jAds">
        <a href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3DsAYxOYL4rKbghojqVNxKsRL4aV4Y1Or8AUuPt4hhrd%252BLltG5xFicOSZqewpHPyZzQbUn1Y0sOqQH7D7yRIFAqiRyjfoi5h6Dn4hSYUu131OB3ujUJI0OeA%253D%253D%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_4042950_14768231" target="_blank"><img src="http://img03.taobaocdn.com/bao/uploaded/i3/T1YRu8XmlbXXb0UGs4_051707.jpg_250x250.jpg" title="日本内野樱桃小丸子微笑面巾 纯棉毛巾 无捻纱 柔软吸水 可爱卡通"></a>
    </div>
    <{*<div class="jAds">
        <a href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3Dawbz3NDHuXPebLdhAWchHPXpv%252BIEo7QGHF349Ju02cmLltG5xFicOSZqewpHPyZzQbUn1Y0sOqQH7D7yRIFAqiRyjfoi5h6Dn4hSYUu131OB3ujUJI0OeA%253D%253D%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_4042950_14768231" target="_blank"><img src="http://img01.taobaocdn.com/bao/uploaded/i1/T1zLZzFk8dXXXXXXXX_!!0-item_pic.jpg_250x250.jpg" title="明德四季樱桃小丸子拼图地垫 泡沫地垫 大号宝宝爬行垫子"></a>
    </div>
    <div class="jAds">
        <a href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3DRvFtKHNJn6nghojqVNxKsVj%252FGnY7mvpZ1Ickk%252BNWjqOLltG5xFicOSZqewpHPyZzQbUn1Y0sOqQH7D7yRIFAqiRyjfoi5h6Dn4hSYUu131OB3ujUJI0OeA%253D%253D%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_4042950_14768231" target="_blank"><img src="http://img03.taobaocdn.com/bao/uploaded/i3/T1zOcxXbJeXXa0TXQ0_033857.jpg_250x250.jpg" title="特价 明德樱桃小丸子儿童泡沫拼图地垫 宝宝游戏爬行垫子 9片/包"></a>
    </div>
    <div class="jAds">
        <a href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3DsAYxOYL4rKbghojqVNxKsRL4aV4Y1Or8AUuPt4hhrd%252BLltG5xFicOSZqewpHPyZzQbUn1Y0sOqQH7D7yRIFAqiRyjfoi5h6Dn4hSYUu131OB3ujUJI0OeA%253D%253D%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_4042950_14768231" target="_blank"><img src="http://img03.taobaocdn.com/bao/uploaded/i3/T1YRu8XmlbXXb0UGs4_051707.jpg_250x250.jpg" title="日本内野樱桃小丸子微笑面巾 纯棉毛巾 无捻纱 柔软吸水 可爱卡通"></a>
    </div>
    <div class="jAds">
        <a href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3DOhDmvQ30Q9XebLdhAWchHKcXmqBhDrgvd0WM9ezukg2LltG5xFicOSZqewpHPyZzQbUn1Y0sOqQH7D7yRIFAqiRyjfoi5h6Dn4hSYUu131OB3ujUJI0OeA%253D%253D%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_4042950_14768231" target="_blank"><img src="http://img04.taobaocdn.com/bao/uploaded/i4/12883022423913042/T1tEmrXBXXXXXXXXXX_!!0-item_pic.jpg_250x250.jpg" title=" 妈妈推荐明德樱桃小丸子儿童拼图地垫 EVA泡沫拼接宝宝爬行"></a>
    </div>*}>
</div>
<{include file='footer.tpl'}>