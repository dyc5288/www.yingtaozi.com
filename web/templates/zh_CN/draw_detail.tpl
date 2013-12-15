<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/draw.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/draw.js<{/s}>"></script>
<div class="jMain">
    <div class="jWrap">
        <div class="jPost" id="post">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'draw'}>">图集</a>  >> <{$return.draw.post_title}>
            </div>
            <div class="jDetailContent">      
                <div class="jMainContent">
                    <div class="jDproduct" id="js_change">
                        <div class="jPreImg">
                        </div>
                        <div class="jDimg">
                            <img id="js_image" src="" alt="">
                        </div>
                        <div class="jNextImg">
                        </div>
                    </div>                    
                    <div id="js_data" sytle="display:none;" >
                        <{if !empty($return.post_content)}>
                            <{assign var="k" value=0}>
                            <{foreach from=$return.post_content item=row}>                
                                <div url="<{$row.url_l}>" key="<{$k}>"></div>                
                                <{assign var="k" value=$k+1}>
                            <{/foreach}>
                        <{/if}>
                    </div>
                    <div class="jAds">
                        <a target="_blank" href="http://s.click.taobao.com/t?e=zGU34CA7K%2BPkqB05%2Bm7rfGKas1PIKp0U37pZuBohxsS4PsOr1Ofy3NJMyXYd9QlSipKtwTGMPH7S%2Fn4tuGzgKNrDZGgZptBoeIauJuMp%2FE9V5fWnF9L3rlXTh%2BDGnBS1GJWxuVsxFPqhKyPHw1c5TFS9xYuYsrOVNBAKb1PDNeKuMft6Di%2B32chIs33RaaE%3D&pid=mm_13740145_0_0">
                            <img src="http://gtms01.alicdn.com/tps/i1/T10x34FgxdXXbTMG7M-440-180.jpg" alt="">
                        </a>                        
                    </div>
                    <div class="jAds">
                        <a target="_blank" href="http://s.click.taobao.com/t?e=zGU34CA7K%2BPkqB05%2Bm7rfGKas1PIKp0U37pZuBohxsXmYfGT7OB30L94snOV3MoT9zU3yJc%2BaHLEiTcWUsZ7jIW59EKGMyxdzxt6%2FgUDwB3aY3kIIZrkxnZzaCRI2ddcuhiglhAb0okXRsMUG0gMD9gtyHiclsAd3IRCFeIcIz46mi0L4q%2BB4ta43e4wqAF5OQ%3D%3D&pid=mm_13740145_0_0">
                            <img src="http://gtms01.alicdn.com/tps/i1/T1gtxqFz0cXXcPRRvI-400-180.jpg" alt="">
                        </a>                        
                    </div>
                    <div class="jAds">
                        <a target="_blank" href="http://s.click.taobao.com/t?e=zGU34CA7K%2BPkqB05%2Bm7rfGGjlY60oHcc7bkKOQYh%2BJj8NXf4czBnUM6c0EDF1JUqEEDPtvlllo2dmHhMH1b2Q0mxeEoPXhXLJeT9uGOGTewTxTL83hZ%2FNADF%2FHdIaXMQp%2FzMaTkJcNzZwTDwSA%3D%3D&pid=mm_13740145_0_0">
                            <img src="http://gtms01.alicdn.com/tps/i1/T150rqFX4dXXbTMG7M-440-180.jpg" alt="">
                        </a>                        
                    </div>
                    <div class="jAds">
                        <a target="_blank" href="http://s.click.taobao.com/t?e=zGU34CA7K%2BPkqB05%2Bm7rfGGjlY60oHcc7bkKOQYh%2BJj8M89NZHjZ%2BSY77m5oF6DMnJ1S8TsrJZgMyNkC5KWuV5x5cwl0HPmdyGCmmBF51P8zF3JRfGemGhGSxdClOCp6lYkiOooWwwlB4FlAnv%2BzT3duVbwwR7mamq7dpLJFd1nIWxEDJ7RLoeZ9MqHZ8hvK%2FWA%3D&pid=mm_13740145_0_0">
                            <img src="http://gtms01.alicdn.com/tps/i1/T1gXIDFk4cXXbTMG7M-440-180.jpg" alt="">
                        </a>                        
                    </div>
                </div>
                <div class="jRightContent">
                    <div class="jDcurr">
                        <div class="jHeader">
                            <hr class="jHrLeft">
                            <h3>所属图集</h3>
                            <hr class="jHrRight">
                        </div>
                        <div class="jTitle">
                            <div class="jLeft"><{$return.draw.post_title}></div>
                            <div class="jRight"><span id="js_index">1</span>/<{'3'|draw:$return.draw.post_content}></div>
                        </div>
                        <div class="jDNine">
                            <{'2'|draw:$return.draw.post_content:6}>
                        </div>
                    </div>
                    
                    <div class="jDcurr">
                        <div class="jHeader">
                            <hr class="jHrLeft">
                            <h3>精彩推荐</h3>
                            <hr class="jHrRight">
                        </div>
                        <{if !empty($return.hot_image)}>
                            <{foreach from=$return.hot_image item=draw}>
                                <a href="<{$draw.ID|url:"draw_detail"}>">
                                    <div class="jTitle">
                                        <div class="jLeft"><{$draw.post_title}>(<{'3'|draw:$draw.post_content}>)</div>
                                    </div>
                                    <div class="jDNine">
                                        <{'2'|draw:$draw.post_content:3}>
                                    </div>
                                </a>
                            <{/foreach}>
                        <{/if}>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<{include file='footer.tpl'}>