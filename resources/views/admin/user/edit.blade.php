@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
             @include('admin.block.errors')
            <form action="{{ route('admin.user.update', $data['id']) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="txtUser" value="{{ old('txtUser', isset($data) ? $data['name'] : null) }}" 
                        @if (Auth::user()->id == $id)
                            enable
                        @else
                            disabled
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" 
                        @if (Auth::user()->id == $id)
                            enable
                        @else
                            disabled
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label>RePassword</label>
                    <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword"
                        @if (Auth::user()->id == $id)
                            enable
                        @else
                            disabled
                        @endif
                     />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail', isset($data) ? $data['email'] : null) }}"
                        @if (Auth::user()->id == $id)
                            enable
                        @else
                            disabled
                        @endif
                    />

                </div>

                @if (Auth::user()->id != $id)
                <div class="form-group">
                    <label>User Level</label>
                    <label class="radio-inline">
                        <input name="rdoLevel" value="1" 
                            @if ($data['role'] == 1)
                                checked="checked"  
                            @endif
                        type="radio">Admin
                    </label>
                    <label class="radio-inline">
                        <input name="rdoLevel" value="2"
                            @if ($data['role'] == 2) 
                                checked="checked"  
                            @endif
                         type="radio">Member
                    </label>
                </div>
                @endif

                <button type="submit" class="btn btn-default">User Edit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection