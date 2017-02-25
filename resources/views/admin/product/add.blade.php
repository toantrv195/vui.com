@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.block.errors')
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label style="color:red; font-size: 17px">Category</label>
                <select class="form-control" name="category">
                    <option>Please Choose Category</option>
                    @foreach($cate as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName') }}" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro') }}</textarea>
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
                <label>Source</label>
                 <input class="form-control" name="source" placeholder="Please Enter source" value="{{ old('source') }}" />
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">new
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">hot
                </label>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
        <form>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @for ($i = 1; $i <= 10; $i++)
            <div class="form-group">
                <label>Image Detail  {{ $i }}</label>
                <input type="file" id="files" name="Image_details[]">
            </div>
        @endfor
    </div>
</div>
@endsection
