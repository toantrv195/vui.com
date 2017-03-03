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
        <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category">
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
                <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($video) ? $video['intro'] : null) }}</textarea>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" onchange="loadFile(event)">
                <img id="output" style="width: 40%; height: 35%; margin-top: 20px;"/>
                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                      };
                    </script>
            </div>
            <div class="form-group">
                <label>Video</label>
                 <input class="form-control" name="link" placeholder="Please Enter link video" 
                 value="{{ old('link', isset($video) ? $video['link'] : null) }}" />
            </div>
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
