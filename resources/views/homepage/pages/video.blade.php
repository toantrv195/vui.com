
@extends('homepage.master')
@section('content')
<div class="mainBox">
<div class="tips">
    <h2>Video</h2>
</div>
<div class="videoList">
    @foreach ($videos as $video)
        <div class="videoListItem">
            <h2>
            <a target="_blank" href="/" title="{{ $video->introduce }}">{{ $video->introduce }}</a>
            </h2>
            <div class="voteVideo">
                <div class="uploader">Đăng bởi 
                    <a target="_blank" href="{{ $video->profile }}" title="{{ $video->name }}">{{ $video->name }}</a> 
                    <?php  \Carbon\Carbon::setLocale('vi'); ?>
                    {{ \Carbon\Carbon::createfromTimeStamp(strtotime($video->created_at))->diffForHumans() }}
                </div>
                <div class="clear"></div>
            </div>
            <div class="stats voteVideo">
                <div class="numbers"> 
                    <span class="views">{{ $video->view }}</span> 
                    <span class="comments">{{ $video->comment }}</span>
                </div>
                <!-- insert fb -->
                 <div class="fb-like" data-href="{{ url('video', $video->alias) }}" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                 </div>
                <div class="clear"></div>
            </div>

            <div class="thumb">
                <a target="_blank" href="{{ url('video', $video->alias) }}" data-youtubeid="entity.youtube_id" data-id="41634" class="play" title="play">
                 <img width="728" alt="" src="{{ asset('upload/videos/images/'. $video->image) }}" class="v"> 
                 <span class="playIcon"></span>
                    <div class="duration">:</div>
                </a>
            </div>
            {{-- <div class="thumb">
                <a target="_blank" href="#" data-youtubeid="entity.youtube_id" data-id="41634" class="play" title="play">
                 <img width="728" alt="" src="{{  }}" class="v"> 
                 <span class="playIcon"></span>
                    <div class="duration">:</div>
                </a>
            </div> --}}
        </div>
    @endforeach

</div>
    <div class="clear"></div>
    <a class="buttons nextListPage" style="" href="#" title="xem thêm, còn nhiều lắm">xem thêm, còn nhiều lắm</a>
    
</div>
<div class="clear"></div>
@endsection