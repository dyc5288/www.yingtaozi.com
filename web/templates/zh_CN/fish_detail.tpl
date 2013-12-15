<{include file='header.tpl'}>
<link rel="stylesheet" href="<{s}>css/fish.css<{/s}>" type="text/css" media="screen" />
<script type="text/javascript" src="<{s}>js/fish.js<{/s}>"></script>
<div class="jMain">
    <div class="jWrap">
        <div class="jPost" id="post">
            <div class="jPosition">
                您的位置：<a href="<{''|url:'fish'}>">淘周边</a>  >> <{$return.product.post_title}>
            </div>
            <div class="jDetailContent">      
                <div class="jMainContent">
                    <div class="jDproduct">
                        <div class="jDimg">
                            <img src="<{$return.product.post_excerpt|excerpt}>" alt="">
                        </div>
                    </div>
                    
                    <div class="jDproduct jDbuy">
                        <div class="jDintro">
                            <{$return.product.post_title}>
                        </div>
                        <div class="jPrice">
                            ￥<{$return.product.post_excerpt|excerpt:'price'}>
                        </div>
                            <a target="_blank" class="jBuy" href="<{$return.product.post_excerpt|excerpt:'buy_url'}>" >购买</a>
                    </div>
                    
                    <div class="jDproduct jDcomment">
                        <div class="jHeader">
                            <hr class="jHrLeft">
                            <h4>评论详情</h4>
                            <hr class="jHrRight">
                        </div>
                        <div class="jComment" style="display: none;">
                            <img src="http://b.115.com/img/115/product/13680706872441.png" alt="115商务云标准套餐">
                            <div class="jCommentText">
                                这次真的超满意。手感很不错哦，买了中午休息时单位大伙一起玩玩。现在很需要运动健身。
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jRightContent">
                    <div class="jDcate">
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
                    <div class="jDshop">
                        <div class="jDHeader">
                            明星店铺
                        </div>
                        <div class="jShopMain">
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3DagJ37wsoiykcQipKwQzePDAVflQIoZepK7Vc7tFgwiFRAdhuF14FMWN5VqF9jwBz5x%2BIUlGKNpV4B1RlAojkBIhMOI7%2FHtdV90p7qlgeigQwPrn00QwN2w%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/aa/e6/T1KcCgXitzXXb1upjX" alt="伊菲迪诺家居专营店">
                            </a>
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3DzMlE74mhD24cQipKwQzePDAVflQIoZepLKpWJ%2Bin0XJRAdhuF14FMarcUs4qZOa9MMgx22UI05Z4B1RlAojkBIhMOI7%2FHtdVcIN7bzx%2Fey7mMXzIDCei5g%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/77/dd/T1MOeaXeRsXXartXjX" alt="">
                            </a>
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3DI9WAZc2cI7ccQipKwQzePDAVflQIoZepLKpWJ%2Bin0XJRAdhuF14FMQx7c4tGyktrMMgx22UI05Z4B1RlAojkBIhMOI7%2FHtdVBT%2B%2BE6enBXuiZ%2BQMlGz6FQ%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/e9/5f/T1dmRlXfcDJ0OrtXjX.gif" alt="丽的手工坊DIY串珠配件">
                            </a>
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3DSXsq7NAXHMgcQipKwQzePDAVflQIoZepLKpWJ%2Bin0XJRAdhuF14FMeqrGC2EZ7Ro8sviUM61dt14B1RlAojkBIhMOI7%2FHtdV0PDl9UnVP9xZW3lUKb7TQw%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/8f/e3/T1NkKGXiddXXb1upjX" alt=" 唯美dangao巧克力">
                            </a>
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3Df0CSYIyq%2BwQcQipKwQzePDAVflQIoZepLKpWJ%2Bin0XJRAdhuF14FMcb6GrzFRjXc8sviUM61dt14B1RlAojkBIhMOI7%2FHtdVxe2VS1aiBpuiZ%2BQMlGz6FQ%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/3c/72/T1jKNmXa4eXXartXjX.gif" alt="羊咩咩玩具城">
                            </a>
                            <a target="_blank" href="http://s.click.taobao.com/t?e=m%3D2%26s%3D0t2pyskidrAcQipKwQzePDAVflQIoZepLKpWJ%2Bin0XJRAdhuF14FMUgZTFuJDCh6RitN3%2FurF3x4B1RlAojkBIhMOI7%2FHtdV5ug1zijSTBOiZ%2BQMlGz6FQ%3D%3D">                                
                                <img src="http://logo.taobaocdn.com/shop-logo/db/4f/T10q8nXl0nXXartXjX.gif" alt="精物门柴神艺术火柴">
                            </a>
                        </div>
                    </div>
                    <div class="jAds">
                        <a target="_blank" href="http://redirect.simba.taobao.com/rd?w=unionnojs&f=http%3A%2F%2Fre.taobao.com%2Feauction%3Fe%3DQFWfa3FEhqrghojqVNxKsTh%252Bh%252Be%252FKsirsMiqaJ97LhaLltG5xFicOSZqewpHPyZzQbUn1Y0sOqTQGmTvLa%252FRoVZatX8ks5V8%26ptype%3D100010&k=e2e107a2b72ca1b1&c=un&b=alimm_0&p=mm_13740145_0_0">
                            <img src="http://gi4.md.alicdn.com/imgextra/i4/596724422/T2WrhuXlBNXXXXXXXX_!!596724422.jpg_460x460.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<{include file='footer.tpl'}>