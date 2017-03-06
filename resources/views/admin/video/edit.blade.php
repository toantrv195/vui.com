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
                <label>Category</label>
                <select class="form-control" name="cate">
                    <option>Please Choose Category</option>
                    @foreach($cate as $item)
                        @if ($item->id == $video->cate_id)
                            <option value="{{ $item->id }}" selected='selected'>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($video) ? $video['introduce'] : null) }}</textarea>
            </div>
            <div class="form-group">
                <label>Image- current</label>
                <div class="img_current" >
                <img src="{{ asset('upload/videos/images/'. $video['image']) }}" class="img_current" >
                <input type="hidden" name="img_current" value="{{ $video['image'] }}">
                </div>
            </div>
            <div class="form-group">
                <label>Video</label>
            </div>
            <video width="400" controls>
              <source src="{{ asset('upload/videos/'.$video->video_name) }}" type="video/mp4">
              <input type="hidden" name="video_current" value="{{ $video['video_name'] }}">
            </video>
            
            <div class="form-group">
                <label>Link</label>
                 <input class="form-control" name="link" placeholder="Please Enter link video" 
                 value="{{ old('link', isset($video) ? $video['link'] : null) }}" />
            </div>
            <div class="form-group">
                <label>source</label>
                 <input class="form-control" name="source" placeholder="Please Enter link video" 
                    value="{{ old('source', isset($video) ? $video['source'] : null) }}" />
            </div>
            <button type="submit" class="btn btn-default">Update video</button>
        <form>
    </div>
</div>
@endsection
