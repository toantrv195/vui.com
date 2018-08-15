@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Video
            <small>edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.errors')
        <form action="{{ route('admin.video.update', $video['id']) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <span class="note">*</span><label>Category</label>
                <select class="form-control" name="cate">
                    <option value="8">Video</option>
                </select>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($video) ? $video['introduce'] : null) }}</textarea>
            </div>
            <div class="form-group">
                <label>Image- current</label>
                <div class="img_current" >
                <img src="{{ asset('upload/videos/images/'. $video['image']) }}" class="img_current" style="width:300px; height:150px;">
                <input type="hidden" name="img_current" value="{{ $video['image'] }}">
                </div>
            </div>
            <div class="form-group">
                <label>Video</label>
            </div>

            @if (isset($video['link']) && $video['source'] != 1)
               @if ($video['source'] == 3)
                    <?php
                        $str = $video['link'];
                        $str = str_replace( 'watch?v=', 'embed/', $str );
                    ?>
                    <iframe width="400" height="225" src="{{ $str }}" frameborder="0" allowfullscreen>  
                    </iframe>
                @else 
                    <div class="fb-video" data-href="{{ $video['link'] }}" data-allowfullscreen="true" data-width="400" height="225" ></div>
                @endif

            @else
                <video width="400" controls>
                  <source src="{{ asset('upload/videos/'.$video->video_name) }}" type="video/mp4">
                  <input type="hidden" name="video_current" value="{{ $video['video_name'] }}">
                </video>
             @endif
            
            <div class="form-group">
                <label>Link</label>
                 <input class="form-control" name="link" placeholder="Please Enter link video" 
                 value="{{ old('link', isset($video) ? $video['link'] : null) }}" />
            </div>
            
            <div class="form-group">
                <span class="note">*</span><label>source</label>
                <label class="radio-inline">
                    <input name="source" value="1" checked=""
                        @if ($video['source'] == 1)
                            checked="checked"
                        @endif
                     type="radio">vui.com
                </label>
                <label class="radio-inline">
                    <input name="source" value="2" 
                        @if ($video['source'] == 2)
                            checked="checked"
                        @endif
                    type="radio">Facebook
                </label>
                <label class="radio-inline">
                    <input name="source" value="3" 
                        @if ($video['source'] == 3)
                            checked="checked"
                        @endif
                    type="radio">Youtube
                </label>
            </div>
            <button type="submit" class="btn btn-default">Update video</button>
        <form>
    </div>
</div>
@endsection
