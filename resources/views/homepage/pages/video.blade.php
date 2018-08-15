
@extends('homepage.master')
@section('content')
<div class="mainBox">
    <div class="tips">
        <h2>Video</h2>
    </div>
    <div id='post-data' class="videoList">
        {{-- loading ajax --}}
        @include('datavideo')
    </div>
    <div class="clear"></div>
    <div class="ajax-load text-center" style="display:none">
        <p style="text-align: center;"><img src="/images/loader.gif" alt="loadding item"></p>
    </div>
    
</div>
<div class="clear"></div>
<script type="text/javascript" src="/js/loadmore.js"></script>
@endsection