<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>vuivui.com</title>
    <link rel="stylesheet" type="text/css" href="/css/reponsive.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
</head>

<body>
    <div id="header">
    {{-- menu header --}}
        @include('homepage.layout.menu')
    </div>
    <div class="clear"></div>
    <div id="content">
        <div id="mainContainer">
            <div id="leftColumn">
                {{-- login --}}
                @include('homepage.layout.login')

                {{-- content-left --}}
                <div class="mainBox">
                    <div id="main">
                    <div id="content-holder">
                        <div id="scriptolution-soft-post" class="scriptolution-soft-box static">        
                            <div class="head">
                                <ul class="switch">
                                    <li class="tab_photo current" id='create_photo'><a class="photo" onclick="onchangeClick(this, 'photo')">Ảnh</a></li>
                                    <li class="tab_video" id="create_video"><a class="video" onclick="onchangeClick(this, 'video')">Video</a></li>
                                </ul>
                            </div> 
                            {{-- form content --}}
                            <div id="load_content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>

                    {{-- footer --}}
                    @include('homepage.layout.footer')
                </div>
            </div>
            {{-- conten-right --}}
            @include('homepage.layout.rule')
        </div>
    </div>
    {{-- js --}}
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1357793294285862";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/owl.carousel.js"></script>

    {{-- <script src="/js/app.js"></script> --}}
</body>

</html>