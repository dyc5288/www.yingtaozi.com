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
        <a href="http://re.taobao.com/eauction?e=HO3yoWCP7M%2FghojqVNxKsarnc6yQ59ouWIYUy9WxI16LltG5xFicOcVMu84rFBr8JPePkNk3onE3avkGnQR%2BPocMiCVs0rVkk%2B0jBdlPG77XcOrG9huDtQ%3D%3D&ptype=100008&unid=&refpos=274_102170_12,a,null&refpid=mm_30908564_3410813_11007308&clk1=885c3239ad31c658c9f3a36ca9c5ece1&upsid=885c3239ad31c658c9f3a36ca9c5ece1&spm=0.0.0.0.0_0.0.0.0" target="_blank"><img src="http://img02.taobaocdn.com/bao/uploaded/i1/15225031331019981/T1wkjRFhxeXXXXXXXX_!!0-item_pic.jpg_b.jpg" alt=""></a>
    </div>
</div>
<{include file='footer.tpl'}>