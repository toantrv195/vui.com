@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>image</th>
                <th>view</th>
                <th>comment</th>
                <th>Status</th>
                <th>Source</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt= 0; ?>
        @foreach($products as $product)
        <?php $stt++; ?>
            <tr class="odd gradeX" align="center">
                <td>{{ $stt }}</td>
                <td>{{ $product->name }}</td>
                <td><img width="210" height="150" src="{{ asset('upload/images/'.$product->image) }}" alt=""></td>
                <td>{{ $product->view }}</td>
                <td>{{ $product->comment }}</td>
                <td>
                    @if ( $product->comment == 1)
                        {{ "new" }}
                    @else
                        {{ 'hot' }}
                    @endif
                </td>
                <td>{{ $product->source }}</td>

                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection