
    @foreach ($videos as $video)
        <div class="videoListItem">
            <h2>
            <a target="_blank" href="{{ url('video', $video->alias) }}" title="{{ $video->introduce }}">{{ $video->introduce }}</a>
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
                   <span class="fb-comments-count comments" data-href="{{ url('video', $video->alias) }}"></span>
                </div>
                <!-- insert fb -->
                 <div class="fb-like" data-href="{{ url('video', $video->alias) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                 </div>
                <div class="clear"></div>
            </div>
            <div class="thumb">
                <a target="_blank" href="{{ url('video', $video->alias) }}" data-youtubeid="entity.youtube_id" data-id="41634" class="play" title="play">
                    @if (isset($video->link) && $video->source != 1)
                       @if ($video->source == 3)
                            <?php
                                $str = $video->link;
                                $str = str_replace( 'watch?v=', 'embed/', $str );
                            ?>
                            <iframe width="100%" height="500" src="{{ $str }}" frameborder="0" allowfullscreen>  
                            </iframe>
                        @else 
                            <div class="fb-video" data-href="{{ $video->link }}" data-allowfullscreen="true" data-width="1000" height="500" ></div>
                        @endif

                    @else
                        @if (isset($video->image))
                            <img width="728" alt="" src="{{ asset('upload/videos/images/'. $video->image) }}" class="v"> 
                            <video width="100%" controls>
                              <source src="{{ asset('upload/videos/'.$video->video_name) }}" type="video/mp4">
                            </video>
                        @else 
                            <img src="/images/bgvideo1.png" alt="">
                        @endif
                        <span class="playIcon"></span>
                        <div class="duration">:</div>

                     @endif
                </a>
            </div>
        </div>
    @endforeach

