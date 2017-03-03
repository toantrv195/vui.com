@extends('admin.master')
@section('content')
<style type="text/css" media="screen">
    .img_current { width:60%; height: 35%;} 
    #output{width: 40%; height: 35%; margin-top: 20px;}
    .img_detail { width: 265px; height: 260px; margin-bottom: 10px; margin-top: 40px;}
    .icon_del {
        position: relative;
        top:-113px;
        left: -21px;
    }
    #insert {
        margin-top: 10px;
    }

</style>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
                {{ csrf_field() }}
                <div class="form-group">
                    <label style="color:red; font-size: 17px">Category</label>
                    <select class="form-control" name="category">
                        <option value= "0">Please Choose Category</option>
                        @foreach($cate as $item)
                            @if ($item->id == $product->cate_id)
                                <option value="{{ $item->id }}" selected='selected'>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName', isset($product) ? $product->name : null) }}"/>
                </div>
                <div class="form-group">
                    <label>Intro</label>
                    <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro', isset($product) ? $product->intro : null) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image- current</label>
                    <div class="img_current" >
                    <img src="{{ asset('upload/images/'. $product->image) }}" class="img_current" >
                    <input type="hidden" name="img_current" value="{{ $product->image }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages" onchange="loadFile(event)">
                    <img id="output" />
                        <script>
                            var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
                </div>
                <div class="form-group">
                    <label>Source</label>
                     <input class="form-control" name="source" placeholder="Please Enter source" value="{{ old('source', isset($product) ? $product->source : null) }}" />
                </div>
                <div class="form-group">
                    <label>Product Status</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" 
                            @if ($product->hot == 1) 
                                {{ 'checked' }}
                            @endif
                            type="radio">new
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="2"
                            @if ($product->hot == 2) 
                                {{ 'checked' }}
                            @endif
                         type="radio">hot
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Product Edit</button>
            
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @foreach ($product_image as $key => $image_detail)
                <div class="form-group" id= "{{ $key }}">
                    <img src="{{ asset('upload/images/details/'. $image_detail->image) }}" idHinh= "{{ $image_detail->id }}" class="img_detail" id={{ $key }} />
                    <a href="javascript:void(0)" type="button"  id="del_img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                </div>
            @endforeach
            <button type="button" class="btn btn-primary" id="addimage">Add Image</button>
            <div id="insert"></div>
        </div>
    </form>
</div>
@endsection