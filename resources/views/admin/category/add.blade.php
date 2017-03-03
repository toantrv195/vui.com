@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.block.errors')
        <form action="{{ route('admin.cate.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
            </div>
            <button type="submit" class="btn btn-default">Category Add</button>
        </form>
    </div>
</div>
@endsection