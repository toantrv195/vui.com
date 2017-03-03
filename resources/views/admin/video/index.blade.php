@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Video
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>image</th>
                <th>link or video</th>
                <th>view</th>
                <th>comment</th>
                <th>Source</th>
                <th>Time</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr class="odd gradeX" align="center">
                    <td>1</td>
                    <td> 
                        <?php $cate = DB::table('categories')->select('id', 'name')->where('id', $video->cate_id)->first(); ?>
                        {{ $cate->name }}
                    </td>
                    <td>{{ $video->intro }}</td>
                    <td><img width="210" height="150" src="{{ asset('upload/videos/images/'.$video->image) }}" alt=""></td>
                    <td>
                        <video width="400" controls>
                          <source src="{{ asset('upload/videos/'.$video->name) }}" type="video/mp4">
                        </video> <br> <br>
                        <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a>
                    </td>
                    <td>{{ $video->view }}</td>
                    <td>{{ $video->comment }}</td>
                    
                    <td>{{ $video->source }}</td>
                    <td>{{ \Carbon\Carbon::createfromTimeStamp(strtotime($video->created_at))->diffForHumans() }} </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <a onclick="return xacnhanxoa('do you want to delete?')" href="{{ route('admin.video.destroy', $video->id) }}"> Delete</a>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                        <a href="{{ route('admin.video.edit',$video->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection