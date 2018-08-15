<div id="rightColumn">
    <div class="td-block-title-wrap">
        <h4 class="block-title"><span>CÓ THỂ BẠN QUAN TÂM</span></h4>
    </div>
    <div class="title">
        <h3 class="topUsers">Đang hot</h3>
    </div>
    <?php
        $products = DB::table('products')->select('*')->where('hot', 2)->orderBy('id', 'DESC')->take(4)->get();
    ?>
    <div class="box darkBox">
        <div class="clear"> </div>
        <div id="topUserContent">
            <div class="topUsers">
            @foreach ($products as $product)
                <div class="item">
                    <a href="{{ url('detail', $product->alias) }}">
                         <img src="{{ asset('upload/images/'.$product->image) }}" alt="{{ $product->image }}" />
                    <div class="info"> 
                        <span class="name">{{ $product->title }}</span> 
                        <span class="views" title="Views">{{ $product->view }}</span> 
                    </div>
                    </a>
                </div>
            @endforeach    
            </div>
            <div class="clear"></div>
            <div class="moreTop"> <a href="{{ url('/') }}" title="xem thêm">xem thêm »</a> </div>
        </div>
    </div>

    <div class="title">
        <h3 class="topUsers"> Clip hot </h3> 
    </div>
    {{-- clip --}}
    <?php
        $videos = DB::table('videos')->select('*')->orderBy('id', 'DESC')->take(3)->skip(2)->get();
    ?>
    <div class="vid">
        <div class="box darkBox hotVideos">
            <div class="clear"> </div>
            <div>
                @foreach ($videos as $video)
                    <div class="videoItem">
                        <a href="{{ url('video', $video->alias) }}" target="_parent" >
                            <div class="thumb">
                                @if (!empty($video->image))
                                    <div class="duration">
                                        <img src="{{ asset('upload/videos/images/'. $video->image) }}" alt="hot video" width="120" />
                                    </div>
                                 @else
                                    <div class="duration">
                                        <img src="/images/bgvideo1.png" alt="hot video" width="120" />
                                    </div>
                                @endif
                            
                                <div class="info">
                                    <h2>{{ $video->introduce }}</h2>
                                    <span class="views">{{ $video->view }}</span> 
                                    
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </a>
                    </div>
                @endforeach
                <div class="moreTop"> <a href="{{ url('video') }}" title="xem thêm">xem thêm »</a> </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>