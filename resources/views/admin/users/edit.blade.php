@extends('layouts.admin')


@section('content')


    <h1>Edit user</h1>
    <div class="row">

        <div class="col-md-3">

            <img  height="150" src="{{$users->photo?$users->photo->file:'https://via.placeholder.com/150' }}" alt="">



        </div>

        <div class="col-md-9"> <form method="POST" action="/admin/users/{{$users->id}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}" >
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$users->email}}"  >
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="type your new" >
                </div>

                <div class="form-group">
                    <label for="photo_id">file</label>
                    <input type="file" name="photo_id" id="photo_id" class="form-control"   >
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="roles_id" id="role" >
                        @if($roles)
                            @foreach($roles as $role)

                                <option value="{{$role->id}}">{{$role->name}}</option>

                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="">status</label>
                        <select class="form-control" name="is_active" id="" >
                            <option value="1" {{$users->is_active==1?'selected':null}}>active</option>
                            <option value="0" {{$users->is_active==0?'selected':null}}>not active</option>

                        </select>
                    </div>
                    
                    
                </div>







                <div class="form-group">

                    <input class="btn btn-primary" type="submit"  value="Edit user">


                </div>
            </form>


            <form method="post" action="/admin/users/{{$users->id}}">
                <input type="hidden" name="_method" value="DELETE">
<div class="form-group ">

                <input class="btn btn-danger" type="submit" value="Delete user">
                {{csrf_field()}}
</div>
            </form>

        </div>
    </div>



    @include('includes/form_errors')
@stop