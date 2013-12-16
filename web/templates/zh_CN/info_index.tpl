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
                                    <script type="text/javascript">
                                        var div = document.createElement('div');
                                        div.innerHTML ='<{$info.post_content|truncate:250}>';
                                        document.write(div.innerHTML);
                                    </script>                                    
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
</div>
<{include file='footer.tpl'}>