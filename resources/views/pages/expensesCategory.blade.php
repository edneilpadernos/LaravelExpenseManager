@extends('layouts.dashboard')
@section('content')
<!-- modal to add expense -->
<div class="modal fade" id="addexpensescatModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Display Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id ="addcatname"></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Description</div>
            <div class="col-md-8"><input type="text" class="form-control" id="addcatdesc"></div>
        </div>
        <div class="text-center mt-3" >
          <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferrorcat">Missing Fields</div>
          <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccesscat">Saved!</div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="savecat">Save</button>
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

<!-- modal use for update expense-->
  <div class="modal fade" id="updatecategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Display Name</div>
              <div class="col-md-8"><input type="text" class="form-control" id="excatnameupdate"></div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">Description</div>
            <div class="col-md-8"><input type="text" class="form-control" id="excatdescupdate"></div>
        </div>
        <div class="text-center mt-3" >
          <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferrorcatupdate">Missing Fields</div>
          <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccesscatupdate">Saved!</div>
      </div>
      <div class="row mt-5" >
        <div class="col-md-7 mb-2">
            <button type="button" class="btn btn-danger" id="deletecatnow">Delete</button>
        </div>
        <div class="col-md-5">
          <div class="form-group form-inline">  
          <button type="button" class="btn btn-primary mr-3" id="updatecatnow">Update</button>
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
    <h5 style="font-size:1em">Expense Categories <span class="float-right"><a href="#">Expense Management > Expense Categories</a></span></h5>
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
              @if (count($expensescategory)>0)
              @foreach ($expensescategory as $excat)    
                <tr class='excat_item'  id="{{$excat->id}}">
                <td id="catname{{$excat->id}}">{{$excat->display_name}}</td>
                <td id="catdesc{{$excat->id}}">{{$excat->description}}</td>
                  <td>{{$excat->created_at}}</td>
              </tr>  
              @endforeach
          @else
                <tr>
                  <td colspan="3">No Expense category</td>
                </tr>                  
          @endif
            </tbody>
        </table>
        <button class="btn mt-3 float-right btn-success" data-toggle="modal" data-target="#addexpensescatModal">Add Category</button>
    </div>
</div>
@endsection
