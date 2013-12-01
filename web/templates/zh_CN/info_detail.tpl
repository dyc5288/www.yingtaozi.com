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
        <a href="http://re.taobao.com/eauction?e=HO3yoWCP7M%2FghojqVNxKsarnc6yQ59ouWIYUy9WxI16LltG5xFicOcVMu84rFBr8JPePkNk3onE3avkGnQR%2BPocMiCVs0rVkk%2B0jBdlPG77XcOrG9huDtQ%3D%3D&ptype=100008&unid=&refpos=274_102170_12,a,null&refpid=mm_30908564_3410813_11007308&clk1=885c3239ad31c658c9f3a36ca9c5ece1&upsid=885c3239ad31c658c9f3a36ca9c5ece1&spm=0.0.0.0.0_0.0.0.0" target="_blank"><img src="http://img02.taobaocdn.com/bao/uploaded/i1/15225031331019981/T1wkjRFhxeXXXXXXXX_!!0-item_pic.jpg_b.jpg" alt=""></a>
    </div>
</div>
<{include file='footer.tpl'}>