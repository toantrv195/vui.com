@extends('homepage.master')
@section('content')
    <?php
        function changecolor($str, $search)
        {
            return str_replace($search, "<span style='color:red;'>$search</span>", $str);
        }
    ?>

    <h3> Tìm kiếm với từ: <span style="color:red;">{!! $search !!}</span> </h3>
    
    <div class="tips"> 
        @if (Auth::guest())
             <b>Mẹo: </b>đăng nhập <b>website</b> để <b><a href="javascript:void(0)" class="loginlink">Upload</a></b> nhiều ảnh lên! 
        @else
            @if (Auth::user()->role == 0)
                <b>Mẹo: </b>đăng nhập <b>website</b> để <b><a href="{{ url('upload/create') }}" title="upload">Upload</a></b> nhiều ảnh lên!
            @else
                 <b>Mẹo: </b>đăng nhập <b>website</b> để <b><a href="javascript:void(0)" class="loginlink">Upload</a></b> nhiều ảnh lên! 
            @endif
        @endif
    </div>

    <div class="photoList">
        <div class="PhotoListItem">
            <ul id="list_demo">
                
              @foreach ($products as $item) 
                    <li style=" height:400px;">

                        <div class="photo-img">
                             <a href="{{ url('detail', $item->alias) }}" target="_blank"> <img src="{{ asset('upload/images/'. $item->image) }}" width="280">
                        </a>
                        </div>

                        <div class="photo-content"> 
                            <a class="photo-title" href="{{ url('detail', $item->alias) }}" target="_blank"> {!! changecolor($item->title, $search) !!} </a>
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
                                    <a class="owner-img" style="background-image: url(images/avatar.jpg);" href="">
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
                        <?php
                            $cates = DB::table('categories')->select('id', 'name', 'alias')
                                ->where('id', $item->cate_id)->get();
                        ?>
                        <div class="viewComments"> 
                            <span class="views" title="Views">{{ $item->view }}</span> 
                            {{-- <span class="comments" title="Comments">{{ $item->comment }}</span> --}}
                            <span class="fb-comments-count comments" data-href="{{ url('detail', $item->alias) }}"></span>

                            @foreach ($cates as $cate)
                                <span class="more"> 
                                    <a href="{{ url('category', $cate->alias) }}" title="category">{{ $cate->name }}...</a> 
                                </span>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>

    </div>
    <div class="clear"></div>
    @if ($products->count() != 0)
        <div id="pagination">
            <ul>
                @if($products->currentPage() !=1)
                    <a href='{{ str_replace('/?', '?',$products->url($products->currentPage()-1)) }}' class="prev"><</a>
                @endif
                @for($i=1; $i<= $products->lastPage(); $i++)
                    <a href='{{ str_replace('/?', '?',$products->url($i)) }}' class="{!! ($products->currentPage() == $i) ? 'active' : '' !!}">{{ $i }}</a>
                @endfor
                @if($products->currentPage() != $products->lastPage())
                   <a href='{{ str_replace('/?', '?',$products->url($products->currentPage()+1)) }}' class="next">></a>
                @endif
            </ul>
        </div>
    @endif

@endsection

