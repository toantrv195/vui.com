@extends('admin.master')
@section('admin.product.edit')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro"></textarea>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Source</label>
                 <input class="form-control" name="source" placeholder="Please Enter source" />
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
            <button type="submit" class="btn btn-default">Product Edit</button>
        <form>
    </div>
</div>
@endsection