<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/index.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/index.js<{/s}>"></script>
<div class="jMain">
    <div class="jLay">
        <div class="jPost">
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
            
            <div class="jPos">
                <div class="jAds">
                    <a href="http://s.click.taobao.com/t?e=zGU34CA7K%2BPkqB05%2Bm7rfGGjlY60oHcc7bkKOQYjHwtHp1cssGjZM6zyvaQzDFnmSDuEWJZO8FrlgpoJUNMIolnlcgUmnJZrCunRzr6juiSjryrWdKI3mBuehw4Lxm3j2VXmR76ua8cPpp9GpsGm7fs0twhjWQOq4itbdgPe1NhIcSUPAlZEZi4FWg%3D%3D&pid=mm_13740145_0_0">
                        <img src="http://gtms01.alicdn.com/tps/i1/T1zA7MFgpgXXbTMG7M-440-180.jpg" alt="">
                    </a>
                </div>
            </div>
            
            <div class="jPdt">
                <div class="jPhoto">
                    <a href="">
                        <img id="js_draw_img" src="" alt="" id="js-photo">
                    </a>
                </div>
                
                <ul class="jExtImg" id="js_draw">
                    <{if !empty($return.hot_draw)}>
                        <{foreach from=$return.hot_draw key=k item=draw}>
                            <li class="focus" btn="tab">
                                <a href="<{$draw.ID|url:"draw_detail"}>">
                                    <img key=<{$k}> src="<{'4'|draw:$draw.post_content:'url'}>" url="<{'4'|draw:$draw.post_content:'url_l'}>" alt="<{$draw.post_title}>" title="<{$draw.post_title}>">
                                </a>
                            </li>
                        <{/foreach}>
                    <{/if}>
                </ul>               
                
            </div>
            
            <div style="display: none;" class="jAcross">
                <div class="jAds">
                    <iframe name="alimamaifrm" frameborder="0" marginheight="0" marginwidth="0" border="0" scrolling="no" width="900" height="30" src="http://www.taobao.com/go/app/tbk_app/chongzhi_210_30.php?pid=mm_13740145_4042950_14740731&page=chongzhi_210_30.php&size_w=900&size_h=30&stru_phone=1&stru_game=1&stru_travel=1&size_cat=cst" ></iframe>
                    
                </div>                
            </div>
            
            <div class="jFish">
                <div class="jBox">
                    <div class="jBoxH">
                        <h3>淘周边</h3>
                        <a href="<{''|url:'fish'}>">more>></a>
                    </div>
                    <div class="jBoxC">
                        <div class="jFishleft">
                            <a href="">
                                <img id="js_fish_img" src="" alt="">
                            </a>
                        </div>
                        <div class="jFishright" id="js_fish">
                            <{if !empty($return.hot_product)}>
                                <{foreach from=$return.hot_product key=k item=product}>
                                    <a href="<{$product.ID|url:"fish_detail"}>">
                                        <img key=<{$k}> src="<{$product.post_excerpt|excerpt}>" alt="<{$product.post_title}>" title="<{$product.post_title}>">
                                    </a>
                                <{/foreach}>
                            <{/if}>
                        </div>
                    </div>
                </div>           
            </div>
            
            <div class="jVideo">
                <div class="jBox">
                    <div class="jBoxH">
                        <h3>TV放送局</h3>
                        <a href="<{''|url:'video'}>">more>></a>
                    </div>
                    <div class="jBoxC">
                        <{if !empty($return.hot_video)}>
                            <{foreach from=$return.hot_video item=video}>
                                <div class="jMovie">
                                    <{if !empty($video.post_content)}>
                                        <iframe id="js_play" height=500 width=600 src="<{$video.post_content.url}>" frameborder=0 allowfullscreen></iframe>
                                    <{/if}>
                                </div>
                                <div class="jIntro">
                                    <h3><{$video.post_title}></h3>
                                    《樱桃小丸子》是全球知名度最高及最具影响力的动漫作品之一。其动画连续二十余年高居日本动画收视率前三位，到2013年时已超过1000集，仍于每周日黄金时段下午六点在日本富士电视台（日本富士电视台在日本的地位相当于中国的CCTV1）上进行连载热播，是日本男女老少心中的国民动画。本作品是以作者的童年生活为蓝本的故事，故事围绕着小丸子以及其家人和同学展开，有关于亲情、友谊，或是一些生活小事，其中有笑有泪，令人回想起童年的稚气。
                                </div>
                            <{/foreach}>
                        <{/if}>                        
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>
<{include file='footer.tpl'}>