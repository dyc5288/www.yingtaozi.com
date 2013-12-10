<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/index.css<{/s}>" type="text/css" media="screen" />
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
                    <img src="http://pic1.ooopic.com/uploadfilepic/sheji/2009-08-12/OOOPIC_SHIJUNHONG_20090812f2d0e717f4efff27.jpg" alt="115商务云标准套餐">
                </div>
            </div>
            
            <div class="jPdt">
                <div class="jPhoto">
                    <img src="http://pic1.ooopic.com/uploadfilepic/sheji/2009-08-12/OOOPIC_SHIJUNHONG_20090812f2d0e717f4efff27.jpg" alt="115商务云标准套餐" id="js-photo">
                </div>
                
                <ul class="jExtImg">
                    <li class="focus" btn="tab"><img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐"></li>
                    <li class="focus" btn="tab"><img src="http://pic1.ooopic.com/uploadfilepic/sheji/2009-08-12/OOOPIC_SHIJUNHONG_20090812f2d0e717f4efff27.jpg" alt="115商务云标准套餐"></li>
                    <li class="focus" btn="tab"><img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐"></li>
                    <li class="focus" btn="tab"><img src="http://pic1.ooopic.com/uploadfilepic/sheji/2009-08-12/OOOPIC_SHIJUNHONG_20090812f2d0e717f4efff27.jpg" alt="115商务云标准套餐"></li>
                    <li class="focus" btn="tab"><img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐"></li>
                </ul>               
                
            </div>
            
            <div class="jAcross">
                <div class="jAds">
                    <img src="http://pic1.ooopic.com/uploadfilepic/sheji/2009-08-12/OOOPIC_SHIJUNHONG_20090812f2d0e717f4efff27.jpg" alt="115商务云标准套餐">
                </div>                
            </div>
            
            <div class="jFish">
                <div class="jBox">
                    <div class="jBoxH">
                        <h3>淘周边</h3>
                        <a href="">more>></a>
                    </div>
                    <div class="jBoxC">
                        <div class="jFishleft">
                            <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                        </div>
                        <div class="jFishright">
                            <{if !empty($return.hot_product)}>
                                <{foreach from=$return.hot_product item=product}>
                                    <img src="<{$product.post_excerpt|excerpt}>" alt="<{$product.post_title}>" title="<{$product.post_title}>">
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