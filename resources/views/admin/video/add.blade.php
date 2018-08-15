@extends('admin.master')
@section('content')
<style type="text/css">
    .note{ color: red; font-weight: bold; font-size: 24px; padding: 20px 5px 10px 0px; }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Video
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.errors')
        <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <span class="note">*</span><label>Category</label>
                <select class="form-control" name="cate">
                    <option value="8">Video</option>
                </select>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="2" name="txtIntro">{{ old('txtIntro') }}</textarea>
            </div>
            <div class="form-group">
                <label>Images Video <p style="font-size:10px; color:#c7c0c0;">(không bắt buộc)</p></label>
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
                <label>Video<p style="font-size:10px; color:#c7c0c0;">(không bắt buộc)</p></label>
                <input type="file" name="fVideo" accept="video/*">
            </div>

            <div class="form-group">
                <label>Link</label>
                 <input class="form-control" name="link" placeholder="Please Enter link video" value="{{ old('link') }}" />
            </div>
            <div class="form-group">
                <span class="note">*</span><label>source</label>
                <label class="radio-inline">
                    <input name="source" value="1" checked="" type="radio">vui.com
                </label>
                <label class="radio-inline">
                    <input name="source" value="2" type="radio">Facebook
                </label>
                <label class="radio-inline">
                    <input name="source" value="3" type="radio">Youtube
                </label>
            </div>

            <button type="submit" class="btn btn-default">Add video</button>
        </form>
    </div>
</div>
@endsection
