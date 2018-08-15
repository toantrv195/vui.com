@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>List</small>
        </h1>
    </div>
    
        <button type="button" class="delete_all btn btn-primary" style="float:right; margin: 2px 0px 20px;">Delete selected</button>
   
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th><input type="checkbox" id="checkall"> all </th>
                <th>ID</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>image</th>
                <th>view</th>
                <th>Status</th>
                <th>Source</th>
                <th>Time</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt= 0; ?>
        @foreach($products as $product)
        <?php $stt++; ?>
            <tr class="odd gradeX" align="center" data-row-id="{{ $product->id }}">
                <td>
                    <input type="checkbox" name="checkbox" class='sub_check' data-id="{{ $product->id }}" value="{{$product->id}}">
                </td>                
                <td>{{ $stt }}</td>
                <td>
                    <?php $user = DB::table('users')->where('id', $product->user_id)->first(); ?>
                    @if (!empty($user->name))
                        {{ $user->name }}
                    @endif
                </td>
                <td>
                    <?php $cate = DB::table('categories')->where('id', $product->cate_id)->first();?>
                    @if (!empty($cate->name)) 
                        {{ $cate->name }}
                    @endif
                    

                </td>
                <td>{{ $product->title }}</td>
                <td><img width="210" height="150" src="{{ asset('upload/images/'.$product->image) }}" alt=""></td>
                <td>{{ $product->view }}</td>
                <td>
                    @if ( $product->hot == 1)
                        {{ "new" }}
                    @else
                        {{ 'hot' }}
                    @endif
                </td>
                <td>{{ $product->source }}</td>
                <td>{{ \Carbon\Carbon::createfromTimeStamp(strtotime($product->created_at))->diffForHumans() }}</td>

                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <a onclick="return xacnhanxoa('do you want to delete?')" href="{{ route('admin.product.destroy', $product->id) }}"> Delete</a>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                    <a href="{{ route('admin.product.edit',$product->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection