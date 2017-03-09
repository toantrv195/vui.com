@extends('homepage.master')
@section('content')
    <h3> Ảnh chế mới</h3>
    <div class="tips"> <b>Mẹo: </b>đăng nhập <b>website</b> để <b><a href="#">Upload</a></b> nhiều ảnh lên! </div>
    <div class="photoList">
        <div class="PhotoListItem">
            <ul>
                <?php   $product = DB::table('products')
                    ->join('users', 'users.id', '=' , 'products.user_id')
                    ->select('products.*', 'users.*')->orderBy('products.id', 'DESC')->get();
                 ?>
              @foreach ($product as $item) 
                    <li style=" height:400px;">

                        <div class="photo-img">
                             <a href="{{ url('detail', $item->alias) }}" target="_blank"> <img src="{{ asset('upload/images/'. $item->image) }}" width="280">
                        </a>
                        </div>

                        <div class="photo-content"> 
                            <a class="photo-title" href="{{ url('detail', $item->alias) }}" target="_blank"> {{ $item->title }} </a>
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
                                    <div class="fb-like" data-href="{{ url('detail', $item->alias) }}" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true">
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
                            <span class="comments" title="Comments">{{ $item->comment }}</span>
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
        <a class="buttons nextListPage" style="" href="#" title="xem thêm, còn nhiều lắm">xem thêm, còn nhiều lắm</a>
    </div>
    <div class="clear"></div>
    
@endsection