<div id="headerContent">
    <h1><a href="/" id="logo" title="Cộng đồng chế ảnh troll , ảnh vui hài hước , anh che haivl">stress.com</a></h1>
    <div class="mid_header">
        <ul id="menuBar">
            <li class="hotTag"> <img src="images/home.png" width="20" height="20">
            </li>
            <li class="selected"><a href="/" title="Cộng đồng chế ảnh troll , ảnh vui hài hước , anh che haivl">Mới</a> </li>
            <li><a href="category.html" title="Bình chọn ảnh">Troll</a> </li>
            <li><a href="#" title="">Video</a> </li>
            <li><a href="#" title="Ảnh đang hot">Hot<img src="images/quiznhe.png" style="margin-left: -6px;"></a> </li>
            <li><a href="#" title="Cũ người mới ta :)">Cũ</a> </li>
            <li> <span class="upload">Đăng bài</span>
                <ul> 
                @if (Auth::guest())
                    <li><a class="loginlink"> Đăng nhập </a></li>
                @else
                    @if (Auth::user()->role == 0)
                        <li><a href="/upload" title="Đăng ảnh">Đăng ảnh</a> </li>
                        <li><a href="/video/upload" title="Đăng video">Đăng video</a> </li>
                    @else
                        <li><a class="loginlink"> Đăng nhập </a></li>
                    @endif
                @endif
                </ul>
            </li>
            <li> <span>ảnh đẹp</span>
                <!-- ul>
                    <li><a href="/builder/rage" title="Chế rage comic">Chế rage comic</a> </li>
                    <li><a href="/builder/memes" title="Chế meme">Chế meme</a> </li>
                </ul> -->
            </li>

        </ul>
    </div>
    <div class="search">
        <form method="get" action="http://www.google.com.vn" name="searchform">
            <div>
                <input type="hidden" name="cx" value="partner-pub-3599960059103364:2081983661">
                <input type="hidden" name="ie" value="UTF-8">
                <input type="text" placeholder="Nhập nội dung tìm kiếm" class="txt_search" name="q" id="q">
                <input type="submit" name="sa" id="searchsubmit" value="" class="submit_search"> </div>
        </form>
    </div>
    <div id="headerRight">
    @if (Auth::guest())

        <div class="login"> <a href="login.html" title="Đăng nhập" class="loginlink">Đăng nhập</a> </div>
        
    @else
        @if (Auth::user()->role == 0)
            <div id="userBox" class="user-section pull-right fn-userbox">
                <div class="user-jump">
                     <img height="20px" class="fn-thumb" src="{{ Auth::user()->avatar}} "> 
                     <a href="#" class="name-log"> {{ Auth::user()->name }} <i class="icon-s-arrow"></i> </a>
                    <div class="tip-dropdown"> 
                        <span class="arr-top"></span>
                        <div class="avt-header">
                            <a class="fn-profile" href="#" rel="nofollow" title="Trang cá nhân"> 
                            <img height="80px" class="fn-thumb" src="{{ Auth::user()->avatar }}"> </a>
                        </div>
                        <ul>
                            <li>
                                <a class="fn-profile" target="_blank" rel="nofollow" href="{{ Auth::user()->profile }}" title="Trang cá nhân"> 
                                    <i class="zicon icon-human-round"><img src="/images/profile.png" alt=""></i> Trang cá nhân 
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
                </div> <i class="fn_zme_info" style="display: none;" data_uid="394118880" data-thumb="#userBox .fn-thumb" data-thumbsize="120"></i>
            </div>
        @else 
            <div class="login"> <a href="login.html" title="Đăng nhập" class="loginlink">Đăng nhập</a> </div>
        @endif
        
    @endif
    </div>

    
    <div class="clear"></div>
</div>