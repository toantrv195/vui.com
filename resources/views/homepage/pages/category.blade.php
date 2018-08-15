@extends('homepage.master')
@section('content')
    <div class="tips">
        <h2>{{ $category->name }}</h2>
    </div>
    <div class="photoList">
        <div class="PhotoListItem">
            <ul id="list">
                @foreach ($product_cate as $item)
                    <li style=" height:400px; display: none;">

                        <div class="photo-img">
                            <a href="{{ url('detail', $item->alias) }}"> 
                                <img src="{{ asset('upload/images/'.$item->image) }}" width="280">
                            </a>
                        </div>

                        <div class="photo-content"> 
                            <a class="photo-title" href="{{ url('detail', $item->alias) }}"> {{ $item->title }} </a>
                            <div class="photo-date">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {{ \Carbon\Carbon::createfromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                            </div>
                            <div class="photo-owner">
                                <!-- avatar -->
                                 @if ($item->avatar != null)
                                    <a class="owner-img" style="background-image: url({{ $item->avatar }});" 
                                    href="{{ $item->profile }}">
                                    </a>
                                @else
                                    <a class="owner-img" style="background-image: url(/images/avatar.jpg);" href="">
                                     </a> 
                                @endif  
                                <a class="owner-name" href="{{ $item->profile }}">{{ $item->name }}</a> 
                                <a class="likesWrapper">
                                <!-- facebook -->
                                    <div class="fb-like" data-href="{{ url('detail', $item->alias) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="viewComments"> 
                            <span class="views" title="Views">{{ $item->view }}</span> 
                            <span class="fb-comments-count comments" data-href="{{ url('detail', $item->alias) }}"></span>
                            <span class="more"> <a href="{{ url('detail',$item->alias) }}" title="xem thêm">xem thêm »</a> </span>
                        </div>
                    </li>
                @endforeach                
            </ul>
        </div>
        <div class="clear"></div>
        <a class="buttons nextListPage" id="btn" href="javascript::void(0)" title="xem thêm, còn nhiều lắm">Tải thêm, còn nhiều lắm</a>
        <div id="listEnd"></div>
        <div class="listItemSeparator"></div>
    </div>
    <div class="clear"></div>

    <div id="pagination">
        <ul>
            @if($product_cate->currentPage() !=1)
                <a href='{{ str_replace('/?', '?',$product_cate->url($product_cate->currentPage()-1)) }}' class="prev"><</a>
            @endif
            @for($i=1; $i<= $product_cate->lastPage(); $i++)
                <a href='{{ str_replace('/?', '?',$product_cate->url($i)) }}' class="{!! ($product_cate->currentPage() == $i) ? 'active' : '' !!}">{{ $i }}</a>
            @endfor
            @if($product_cate->currentPage() != $product_cate->lastPage())
               <a href='{{ str_replace('/?', '?',$product_cate->url($product_cate->currentPage()+1)) }}' class="next">></a>
            @endif
        </ul>
    </div>
    
@endsection