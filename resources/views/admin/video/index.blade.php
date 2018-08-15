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
                <th>video</th>
                <th>view</th>
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
                    <td> video</td>
                    <td>{{ $video->introduce }}</td>
                    <td><img width="210" height="150" src="{{ asset('upload/videos/images/'.$video->image) }}" alt=""></td>
                    <td>
                        @if (isset($video->link) && $video->source != 1)
                           @if ($video->source == 3)
                                <?php
                                    $str = $video->link;
                                    $str = str_replace( 'watch?v=', 'embed/', $str );
                                ?>
                                <iframe width="400" height="225" src="{{ $str }}" frameborder="0" allowfullscreen>  
                                </iframe>
                            @else 
                                <div class="fb-video" data-href="{{ $video->link }}" data-allowfullscreen="true" data-width="400" height="225" ></div>
                            @endif

                        @else
                            <video width="400" controls>
                              <source src="{{ asset('upload/videos/'.$video->video_name) }}" type="video/mp4">
                            </video>
                         @endif



                       {{--  <video width="400" controls>
                          <source src="{{ asset('upload/videos/'.$video->video_name) }}" type="video/mp4">
                        </video> <br> <br>
                        <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a> --}}
                    </td>
                    <td>{{ $video->view }}</td>
                    
                    <td>
                        @if ($video->source == 1)
                            {{ 'vivu.com' }}
                        @elseif ($video->source == 2)
                            {{ 'Facebook' }}
                        @else 
                            {{ 'Youtube' }}
                        @endif
                    </td>
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