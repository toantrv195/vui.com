@extends('homepage.master')
@section('content')

    <div class="mainBox photoDetails">
        <div class="photoInfo">
            <h1>{{ $product_detail->title }}</h1>
            <div class="stats"> <span class="views">Lượt xem:<span class="number">{{ $product_detail->view }}</span></span> 
            </div>
            <div class="source"> 
                <span class="source"> Nguồn: 
                    <span class="text">
                    @if ($product_detail->source == 1)
                        {{ 'Tự làm' }}
                    @else
                        {{ $product_detail->source }}
                    @endif
                    </span> 
                </span>
            </div>
        </div>
        
        <div class="uploader">
            Đăng
                <?php \Carbon\Carbon::setLocale('vi'); ?>
                {{ \Carbon\Carbon::createfromTimeStamp(strtotime($product_detail->created_at))->diffForHumans() }} 
            trước bởi
            <div> 
                @if ($product_detail->avatar != null)
                    <img src="{{ $product_detail->avatar }}" alt="{{ $product_detail->name }}">
                @else
                    <img src="/images/avatar.jpg" alt="">
                @endif  
            <div class="info"> 
                <a href="{{ $product_detail->profile }}" target="_blank" title="{{ $product_detail->name }}">{{ $product_detail->name }}</a> 
            </div>

            <div class="clear"> </div>
            </div>
        </div>

        <?php 
            $user_id = Auth::guard()->id();
        ?>
        @if ($product_detail->user_id == $user_id)
            
            <div class="delete"> 
                <button type="button">
                    <a href="{{ route('upload.image.delete', $product_detail->alias) }}">Xóa bài này</a>
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
                <div class="fb-like" data-href="{{ url('detail', $product_detail->alias) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                </div>
            </div>
            <div class="navButtons"> 
                @if (isset($prev))
                    <a class="prev" href="{{ url('detail', $prev->alias) }}" title="Prev">Prev</a> 
                @endif

                @if (isset($next))
                    <a class="next" href="{{url('detail', $next->alias)}}" title="next">next</a>
                @endif 
            </div>
        </div>
        <div class="clear"> </div>
        <div class="photoImg"> 
            <img alt="{{ $product_detail->title }}" src="{{ asset('upload/images/details/'.$product_detail->image) }}"> 
        </div>
        {{-- img detail --}}
        @foreach ($images as $img)
            @if (isset($img->image))
                <div class="img_detail"> 
                    <img alt="{{ $img->image }}" src="{{ asset('upload/images/details/'.$img->image) }}"> 
                </div>
            @endif
        @endforeach
        
        
        <div class="commentContainer">
            <h3>Bình luận</h3>
            <div class="fb-comments" data-href="{{ url('detail', $product_detail->alias) }}" data-width="100%" data-numposts="5"></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="fullWidth newVideo">
    @if ($product_cate->count() != 0)
        <div class="box darkBox hotVideos">
            <h3> Ảnh hot</h3>
            <!-- slide -->
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach ($product_cate as $data)
                    <div class="item">
                        <a href="{{ url('detail', $data->alias) }}" target="_parent" >
                            <div class="thumb"> 
                                <img src="{{ asset('upload/images/'.$data->image ) }}" style="max-width:158px;max-height:111px;margin-bottom:5px" alt="hotest photo"> 
                            </div>
                            <div class="info">
                                <h2>{{ $data->title }}</h2>
                                <div class="stats"> 
                                    <span class="views" title="">{{ $data->view }}</span> 
                                    <span class="comments" title="">{{ $data->comment }}</span> 
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
@endsection