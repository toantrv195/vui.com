@extends('admin.master')
@section('content')
 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php $stt = 0?>
                @foreach ($users as $user)
                <?php $stt++; ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $user->name }}</td>
                        @if (isset($user->avatar))
                            <td>
                                <a href="{{ $user->profile }}" target="_blank"><img src="{{ $user->avatar }}" alt="{{ $user->name }}"></a>
                            </td>
                        @else 
                            <td>null</td>
                        @endif

                        <td>
                        @if ($user->id == 2 && $user->role == 1)
                               <span style="color:#0e7aec; font-weight: bold">Super Admin</span> 
                         @elseif( $user->role == 1 )
                                <span style="color:#349854; font-weight: bold">Admin</span>
                        @elseif( $user->role ==2 )
                                <span style="color:red; font-weight: bold">Banned</span>
                        @else
                                Member
                        @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a onclick="return xacnhanxoa('Do you want to delete ?')" href="{{ route('admin.user.destroy', $user->id) }}"> Delete</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                            <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
@endsection


