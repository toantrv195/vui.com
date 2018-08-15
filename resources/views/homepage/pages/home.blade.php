@extends('homepage.master')
@section('content')
    <h3> Bài đăng mới</h3>
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
        {{-- load ajax --}}
                <div id="post-data">
                    @include('data')
                </div>
            </ul>
        </div>

        <div class="clear"></div>
        <div class="ajax-load text-center" style="display:none">
            <p style="text-align: center;"><img src="/images/loader.gif" alt="loadding item"></p>
        </div>

    </div>
    <div class="clear"></div>
    <script type="text/javascript" src="/js/loadmore.js"></script>
@endsection


