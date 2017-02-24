@extends('homepage.master')
@section('content')
<div class="mainBox photoDetails">
    <div class="photoInfo">
        <h1>em từ xem chùa sang chế ảnh !</h1>
        <div class="stats"> <span class="views">Lượt xem:<span class="number">184</span></span> <span class="comments">Lượt bình luận: <span class="number">2</span></span>
        </div>
        <div class="source"> <span class="source"> Nguồn: <span class="text">Tự làm</span> </span>
        </div>
    </div>
    <div class="uploader"> Đăng 31 phút trước bởi
        <div> <img src="http://i.xem.mkocdn.com/i.xem.sb/data/avatar/default.jpg" alt="Lương Tấn Đạt">
            <div class="info"> <a href="/uploader/217804" title="Lương Tấn Đạt">Lương Tấn Đạt</a> </div>
            <div class="clear"> </div>
        </div>
    </div>
    <div class="clear"> </div>
    <div class="news"> </div>
    <div data-fixedtop="40" class="fixedScrollDetector"> </div>
    <div class="likeButton fixedScroll " style="position: relative;">
        <div class="text"> Thích ảnh này? </div>
        <div class="fbLikeButton">
            <div class="fb-like fb_iframe_widget"> <span>                       
                <iframe name="f22f6256c1c9178" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?action=like&amp;app_id=181604928677768&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0eWevUAMuoH.js%3Fversion%3D42%23cb%3Df112efa2e5a0a4%26domain%3Dxem.vn%26origin%3Dhttp%253A%252F%252Fxem.vn%252Ff29a8228b370cd8%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fxem.vn%2Fphoto%2F913207&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 127px; height: 20px;" class=""></iframe>
                </span> </div>
        </div>
        <div class="navButtons"> <a class="prev" href="" title="hotkey: ← hoặc Z">Prev</a> <a class="next" href="" title="hotkey: → hoặc X">next</a> </div>
    </div>
    <div class="clear"> </div>
    {{-- video --}}
    <div class="video">
        <div class="details-player"> 
        <video width="100%" controls="" autoplay="" loop="" poster="images/bgvideo.png" class="video"> <source src="video/nxnn.mp4" type="video/mp4"> Your browser does not support the video tag. 

        </video> 
        </div>
    </div>
    <div style="text-align:center">
        <div id="div-gpt-ad-1481882121257-2" style="height:90px; width:728px;" data-google-query-id="CO7294-BkdICFQ8klgod7EkEFQ">
            <div id="google_ads_iframe_/165899848/xem-viewpic-trungtam-728x90_0__container__" style="border: 0pt none;">
                <iframe id="google_ads_iframe_/165899848/xem-viewpic-trungtam-728x90_0" title="3rd party ad content" name="google_ads_iframe_/165899848/xem-viewpic-trungtam-728x90_0" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" srcdoc="" style="border: 0px; vertical-align: bottom;">
                    
                </iframe>
            </div>
        </div>
    </div>
    <div class="btn-social">
        <a target="_blank" title="Share on Facebook" href="http://www.facebook.com/sharer/sharer.php?u=http://xem.vn/photo/913207">
            <div style="float:left" class="btn-facebook">Share on Facebook</div>
        </a>
        <a target="_blank" title="Share on Twitter" href="http://twitter.com/?status=em%20t%E1%BB%AB%20xem%20ch%C3%B9a%20sang%20ch%E1%BA%BF%20%E1%BA%A3nh%20%21http://xem.vn/photo/913207">
            <div class="btn-twitter">Share on Twitter</div>
        </a>
    </div>
    <div class="featuredFanPage">
        <h4>
            <img src="http://s.xem.mkocdn.com/bundles/mkoxem/images/thumbsup.png" alt="xem.vn"> Like
            <a href="https://www.facebook.com/fan.xem.vn" target="_blank" class="colorful">stress.com trên Facebook</a> để được cười nhiều hơn
        </h4>
        <div> <img src="images/logoo.jpg" alt="logo"> </div>
    </div>
    <div class="commentContainer">
        <h3>Bình luận</h3>
        <div class="fb-comments fb_iframe_widget" data-href="http://xem.vn/photo/913207" data-num-posts="3" data-width="728" fb-xfbml-state="rendered"><span style="height: 423px; width: 728px;"><iframe id="f20d0b4b5e4c1dc" name="f78cdee9f9d9fc" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=181604928677768&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0eWevUAMuoH.js%3Fversion%3D42%23cb%3Df3af399aa15a61%26domain%3Dxem.vn%26origin%3Dhttp%253A%252F%252Fxem.vn%252Ff29a8228b370cd8%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fxem.vn%2Fphoto%2F913207&amp;locale=en_US&amp;numposts=3&amp;sdk=joey&amp;width=728" style="border: none; overflow: hidden; height: 423px; width: 728px;"></iframe></span> </div>
    </div>
</div>
@endsection