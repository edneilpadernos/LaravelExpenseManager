@extends('layouts.dashboard')
@section('content')
<!-- modal to add new user-->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id='username'></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Email</div>
            <div class="col-md-8"><input type="email" class="form-control" id="useremail"></div>
        </div>
        <div class="row mt-3">
          <div class="col-md-4">password</div>
          <div class="col-md-8"><input type="password" class="form-control" id="userpassword"></div>
      </div>
        <div class="row mt-3">
            <div class="col-md-4">Role</div>
            <div class="col-md-8">
                <select class="form-control" id="userselectedrole">
                  @foreach ($roles as $role)
                <option value="{{$role->id}}">{{ $role->display_name}} </option>   
                  @endforeach
                  </select>
            </div>
        </div>
        <div class="text-center mt-3" >
          <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferroruser">Missing Fields</div>
          <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccessuser">Saved!</div>
      </div>  
      </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="usersave">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

<!-- modal use for update user-->
  <div class="modal fade" id="updateuserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id="updateusername"></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Email</div>
            <div class="col-md-8"><input type="email" class="form-control" id="updateemail"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">Role</div>
            <div class="col-md-8">
                <select class="form-control" id="selecteduserRoleupdate">
                    @foreach ($roles as $role)
                <option value="{{$role->id}}">{{ $role->display_name}}</option>   
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="text-center mt-3" >
          <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferroruserupdate">Missing Fields</div>
          <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccessuserupdate">Saved!</div>
      </div>  
        <div class="row mt-5" >
            <div class="col-md-7">
                <button type="button" class="btn btn-danger" id="deleteusernow">Delete</button>
            </div>
            <div class="col-md-5">
              <div class="form-group form-inline"> 
                <button type="button" class="btn btn-primary mr-3" id="updateusernow">Update</button>
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal" >Cancel</button>
            
              </div>
            </div>
          
        </div>    
    
    </div>
        
        
      </div>
    </div>
  </div>



<div class="row mt-5">
    <div class="col-md-12">
    <h5 style="font-size:1em">Users <span class="float-right"><a href="#">User Management > Users</a></span></h5>
    </div>    
</div>    
<div class="row mt-5">
    <div class="col-md-10">
        <table class="table table-stripped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr class='user_item'  id="{{$user->id}}">
                <td id="username{{$user->id}}">{{$user->name}}</td>
                <td id="useremail{{$user->id}}">{{$user->email}}</td>
              <td id="userrolename{{$user->id}}">{{$user->display_name}}</td>
              <td>{{$user->created_at}}<input type="hidden" id="role{{$user->id}}" value="{{$user->role_level}}"></td>
                
              </tr>
              
              @endforeach
            </tbody>
        </table>
        <button class="btn mt-3 float-right btn-success" data-toggle="modal" data-target="#adduserModal">Add User</button>
    </div>
</div>
@endsection
