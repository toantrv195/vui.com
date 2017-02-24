@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;
                ?>
                @foreach($data as $item)
                <?php $stt++; ?>
                <tr class="odd gradeX" align="center">
                    <td>{{ $stt }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <a onclick="return xacnhanxoa('Do You Want To Delete?')" href="{{ route('admin.cate.destroy', $item->id) }}"> Delete</a>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                        <a href="{{ route('admin.cate.edit', $item->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection