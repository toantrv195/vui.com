@extends('homepage.master')
@section('content')
<div class="mainBox photoDetails">
    <div class="photoInfo">
        <h1>{{ $video_detail->introduce }}</h1>
        <div class="stats">
            <span class="views">Lượt xem:<span class="number">{{ $video_detail->view }}</span></span>
            <span class="comments">Lượt bình luận: <span class="number">{{ $video_detail->comment }}</span></span>
        </div>
        <div class="source"> 
            <span class="source"> Nguồn:
                <span class="text">
                    @if ($video_detail->source == 1)
                        {{ 'vivu.com' }}
                    @elseif ($video_detail->source == 2)
                        {{ 'Facebook' }}
                    @else 
                        {{ 'Youtube' }}
                    @endif
                </span> 
            </span>
        </div>
    </div>
    <div class="uploader"> Đăng 
        <?php \Carbon\Carbon::setLocale('vi'); ?>
        {{ \Carbon\Carbon::createfromTimeStamp(strtotime($video_detail->created_at))->diffForHumans() }}
     trước bởi
        <div> 
            @if ($video_detail->avatar != null)
                    <img src="{{ $video_detail->avatar }}" alt="{{ $video_detail->name }}">
                @else
                    <img src="/images/avatar.jpg" alt="">
                @endif  
            <div class="info"> 
                <a href="{{ $video_detail->profile }}" target="_blank">{{ $video_detail->name }}</a> 
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    {{-- delete user upload --}}
    <?php 
        $user_id = Auth::guard()->id();
    ?>
    @if ($video_detail->user_id == $user_id)
        
        <div class="delete"> 
            <button type="button">
                <a href="{{ route('upload.video.delete', $video_detail->alias) }}">Xóa Video này</a>
            </button>
        </div> 
    @else 
        <div class="delete"> </div> 
    @endif

    <div class="clear"> </div>
    <div class="news"> </div>
    <div data-fixedtop="40" class="fixedScrollDetector"> </div>

    <div class="likeButton fixedScroll " style="position: relative;">
        <div class="text"> Thích ảnh này? </div>
        <div class="fbLikeButton">
            {{-- fb like --}}
            <div class="fb-like" data-href="{{ url('video', $video_detail->alias) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
            </div>
        </div>
    </div>

    <div class="clear"> </div>
    {{-- video --}}
    @if (isset($video_detail->link) && $video_detail->source !=1) 
        @if ($video_detail->source == 3)
            <?php
                $str = $video_detail->link;
                $str = str_replace( 'watch?v=', 'embed/', $str );
            ?>
            <iframe width="100%" height="500" src="{{ $str }}" frameborder="0" allowfullscreen>  
            </iframe>
            
        @else
            <div class="fb-video" data-href="{{ $video_detail->link }}" data-allowfullscreen="true" data-width="1000" height="500"></div>
        @endif
    @else
        <div class="video">
            <div class="details-player"> 
            <video width="100%" controls="" autoplay="" loop="" poster="images/bgvideo.png" class="video">
                <source src="{{ asset('upload/videos/' .$video_detail->video_name) }}" type="video/mp4"> Your browser does not support the video tag. 

            </video> 
            </div>
        </div>
    @endif
    {{-- btn fb --}}

    {{-- page web --}}

    <div class="commentContainer">
        <h3>Bình luận</h3>
        <div class="fb-comments" data-href="{{ url('video', $video_detail->alias) }}" data-width="100%" data-numposts="5"></div>
    </div>

    <div class="clear"></div>
    <div class="fullWidth newVideo">
    @if ($video_cate->count() !=0)
        <div class="box darkBox hotVideos">
            <h3> Clip khác</h3>
            <!-- slide -->
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach ($video_cate as $item)
                    <div class="item">
                        <a href="{{ url('video', $item->alias) }}" >
                            @if (!empty($item->image))
                                <div class="thumb">
                                    <img src="{{ asset('upload/videos/images/' .$item->image) }}" style="max-width:158px;max-height:111px;margin-bottom:5px" alt="hotest photo"> 
                                </div>
                            @else
                                <div class="thumb">
                                    <img src="/images/bgvideo1.png" style="max-width:158px;max-height:111px;margin-bottom:5px" alt="hotest photo"> 
                                </div>
                            @endif
                            <div class="info">
                                <h3> {{ $item->introduce }} </h3>
                                <div class="stats">
                                    <span class="views" title="">{{ $item->view }}</span> 
                                    <span class="comments" title="">{{ $item->comment }}</span> 
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    </div>
</div>
@endsection