<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>vuivui.com</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
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
                    @yield('content')

                    {{-- footer --}}
                    @include('homepage.layout.footer')
                </div>
            </div>
            {{-- conten-right --}}
            @include('homepage.layout.content_right')
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