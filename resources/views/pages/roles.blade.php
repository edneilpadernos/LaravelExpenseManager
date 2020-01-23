@extends('layouts.dashboard')
@section('content')
<!-- modal to add new role-->
<div class="modal fade" id="addroleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mt-4">
              <div class="col-md-4">Display Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id="add_role_name"></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Description</div>
            <div class="col-md-8"><input type="text" class="form-control" id="add_role_desc"></div>
        </div>
          <div class="text-center mt-3" >
              <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferror">Missing Fields</div>
              <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccess">Saved!</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveaddrole">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

<!-- modal use for update -->
  <div class="modal fade" id="updateRoleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Display Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id="updatename"></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Description</div>
            <div class="col-md-8"><input type="text" class="form-control" id="updatedesc"></div>
        </div>
        <div class="text-center mt-3" >
          <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferrorupdate">Missing Fields</div>
          <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccessupdate">Saved!</div>
      </div>
        <div class="row mt-5" >
            <div class="col-md-7 mb-2">
                <button type="button" class="btn btn-danger" id="deleterolenow">Delete</button>
            </div>
            <div class="col-md-5">
              <div class="form-group form-inline">  
              <button type="button" class="btn btn-primary mr-3" id="updaterolenow">Update</button>
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
    <h5 style="font-size:1em">Roles <span class="float-right"><a href="#">User Management > Roles</a></span></h5>
    </div>    
</div>    
<div class="row mt-5">
    <div class="col-md-10">
        <table class="table table-stripped table-sm">
            <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>

              @if (count($roles)>0)
                  @foreach ($roles as $role)    
                    <tr class='role_item'  id="{{$role->id}}">
                    <td id="dname{{$role->id}}">{{$role->display_name}}</td>
                    <td id="ddesc{{$role->id}}">{{$role->description}}</td>
                      <td>{{$role->created_at}}</td>
                  </tr>  
                  @endforeach
              @else
                    <tr>
                      <td colspan="3">No Roles</td>
                    </tr>                  
              @endif
            </tbody>
        </table>
        <button class="btn mt-3 float-right btn-success" data-toggle="modal" data-target="#addroleModal">Add new Role</button>
    </div>
</div>

@endsection
