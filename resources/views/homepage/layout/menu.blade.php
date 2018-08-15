<div id="headerContent">
    <a href="{{ url('/') }}" id="logo" title="Cộng đồng chế ảnh troll , ảnh vui hài hước , anh che hai vui nhon"></a>
    <div class="menu_icon" id="show_icon">
        <img src="/images/icon_menu.png">
    </div>

    <div class="clearn"></div>
    <div class="mid_header">
        <ul id="menuBar">
            <li class="hotTag"> 
                <a href="{{ url('/') }}"><img src="/images/home.png" width="20" height="20"></a>
            </li>
            <?php $cates = DB::table('categories')->orderBy('id', 'ASC')->get(); ?>
            @foreach ($cates as $cate)
                <li {{-- class="selected" --}}><a href="{{ url('category', $cate->alias) }}">{{ $cate->name }}</a> </li>
            @endforeach
           {{--  <li><a href="category.html" title="Bình chọn ảnh">Troll</a> </li>
            <li><a href="#" title="">Video</a> </li> --}}
            <li><a href="{{ url('video') }}" title="video">Video<img src="/images/quiznhe.png" style="margin-left: -6px;"></a> </li>
            
            <li id="up"> <span class="upload">Đăng bài</span>
                <ul> 
                @if (Auth::guest())
                    <li><a class="loginlink"> Đăng nhập </a></li>
                @else
                    @if (Auth::user()->role == 0)
                        <li><a href="{{ url('upload/create') }}" title="upload">Upload Lên</a></li>
                        {{-- <li><a href="{{route('upload.image.getcreate')}}" title="Đăng ảnh">Đăng ảnh</a> </li>
                        <li><a href="/video/upload" title="Đăng video">Đăng video</a> </li> --}}
                    @else
                        <li><a class="loginlink"> Đăng nhập </a></li>
                    @endif
                @endif
                </ul>
            </li>

        </ul>
    </div>
    
    <div id="headerRight">
    @if (Auth::guest())

        <div class="login"> <a href="login.html" title="Đăng nhập" class="loginlink">Đăng nhập</a> </div>
        
    @else
        @if (Auth::user()->role == 0)
            <div id="userBox" class="user-section pull-right fn-userbox">
                <div class="user-jump">
                    @if (Auth::user()->avatar != null)
                        <img height="20px" class="fn-thumb" src="{{ Auth::user()->avatar}} ">
                    @else
                        <img height="20px" class="fn-thumb" src="/images/avatar.jpg">
                    @endif 
                     <a href="{{ Auth::user()->profile }}"  target="_blank" class="name-log"> {{ Auth::user()->name }} <i class="icon-s-arrow"></i> </a>
                    <div class="tip-dropdown"> 
                        <span class="arr-top"></span>
                        <div class="avt-header">
                            <a class="fn-profile" target="_blank" rel="nofollow" href="{{ Auth::user()->profile }}" title="Trang cá nhân">
                            @if (Auth::user()->avatar != null)
                                <img height="80px" class="fn-thumb" src="{{ Auth::user()->avatar }}"> </a>
                            @else
                                <img height="80px" class="fn-thumb" src="/images/avatar.jpg">
                            @endif 
                        </div>
                        <ul>
                            <li>
                                <a class="fn-profile" target="_blank" rel="nofollow" href="{{ url('user',Auth::user()->name ) }}" title="Trang cá nhân"> 
                                    <i class="zicon icon-human-round"><img src="/images/profile.png" alt=""></i> bài đăng của bạn
                                </a>
                            </li>
                            <li>
                                <a class="fn-logout" href="{{ url('/logout') }}" 
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                                     title="Thoát"> 
                                     <i class="zicon icon-door"><img src="/images/close.png" alt=""></i> Thoát 
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>  
                    </div>
                </div> 
            </div>
        @else 
            <div class="login"> <a href="login.html" title="Đăng nhập" class="loginlink">Đăng nhập</a> </div>
        @endif
        
    @endif
    </div>

    <div class="search">
        <form method="post" action="{{ url('search') }}" name="searchform">
            {{ csrf_field() }}
            <div>
                <input type="hidden" name="cx" value="partner-pub-3599960059103364:2081983661">
                <input type="hidden" name="ie" value="UTF-8">
                <input type="text" placeholder="Nhập nội dung tìm kiếm" class="txt_search" name="txtsearch" id="q">
                <input type="submit" name="sa" id="searchsubmit" value="" class="submit_search"> </div>
        </form>
    </div>

    
    <div class="clear"></div>
</div>