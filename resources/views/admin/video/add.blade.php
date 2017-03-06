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
                    <option>Please Choose Category</option>
                    <?php $cates = DB::table('categories')->select('id', 'name')->get();  ?>
                        @foreach ($cates as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }} </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="2" name="txtIntro">{{ old('txtIntro') }}</textarea>
            </div>
            <div class="form-group">
                <span class="note">*</span><label>Images Video</label>
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
                <span class="note">*</span><label>Video</label>
                <input type="file" name="fVideo" accept="video/*">
            </div>

            <div class="form-group">
                <label>Link</label>
                 <input class="form-control" name="link" placeholder="Please Enter link video" value="{{ old('link') }}" />
            </div>
            <div class="form-group">
                <span class="note">*</span><label>source</label>
                <input class="form-control" name="source" placeholder="Please Enter link video" value="{{ old('source') }}" />
            </div>
            <button type="submit" class="btn btn-default">Add video</button>
        </form>
    </div>
</div>
@endsection
