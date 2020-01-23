@extends('layouts.dashboard')
@section('content')
<!-- modal to add new expense-->
<div class="modal fade" id="addexpenseModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">Expense Category</div>
              <div class="col-md-8">
                <select class="form-control" id="selectedcategoryexpense">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{ $category->display_name}}</option>   
                      @endforeach
                  </select>  
                
                </div>
            </div>
          <div class="row mt-3">
            <div class="col-md-4">Amount</div>
            <div class="col-md-8"><input type="email" class="form-control" id="expenseamount"></div>
            </div>
        <div class="row mt-3">
            <div class="col-md-4">Entry Date</div>
            <div class="col-md-8">
                <input type="Date" class="form-control" id="expensedate"></div>
            </div>
            <div class="text-center mt-3" >
              <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferrorexpense">Missing Fields</div>
              <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccessexpense">Saved!</div>
              <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notifsuccessexpensenumber">Please enter number in amount box</div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="expensesave">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

<!-- modal use for update expense-->
  <div class="modal fade" id="updateExpenseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Expense</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Expense Category</div>
                  <div class="col-md-8">
                    <select class="form-control" id="selectedcategoryexpenseupdate">
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{ $category->display_name}}</option>   
                          @endforeach
                      </select>  
                    
                    </div>
                </div>
              <div class="row mt-3">
                <div class="col-md-4">Amount</div>
                <div class="col-md-8"><input type="email" class="form-control" id="expenseamountupdate"></div>
                </div>
            <div class="row mt-3">
                <div class="col-md-4">Entry Date</div>
                <div class="col-md-8">
                    <input type="Date" class="form-control" id="expensedateupdate"></div>
                </div>
                <div class="text-center mt-3" >
                  <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notiferrorexpenseupdate">Missing Fields</div>
                  <div style="opacity:0.9;display:none; " class="alert bg-success  text-white "id="notifsuccessexpenseupdate">Saved!</div>
                  <div style="opacity:0.9;display:none; " class="alert bg-danger  text-white "id="notifsuccessexpensenumberupdate">Please enter number in amount box</div>
                </div>
                <div class="row mt-5" >
                    <div class="col-md-7">
                        <button type="button" class="btn btn-danger" id="deleteexpensenow">Delete</button>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group form-inline"> 
                        <button type="button" class="btn btn-primary mr-3" id="updateexpensenow">Update</button>
                         <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                      </div>
                        </div>
                  
                  
                </div> 
            </div>
          </div>
        </div>
      </div>


<div class="row mt-5">
    <div class="col-md-12">
    <h5 style="font-size:1em">Expenses <span class="float-right"><a href="#">Expenses Management > Expenses</a></span></h5>
    </div>    
</div>    
<div class="row mt-5">
    <div class="col-md-10">
        <table class="table table-stripped table-sm">
            <thead>
                <tr>
                    <th>Expsense Category</th>
                    <th>Amount</th>
                    <th>Entry Date</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($expenses as $expense)
              <tr class='expense_item'  id="{{$expense->id}}">
                <td id="expcat{{$expense->id}}">{{$expense->display_name}}<input type="hidden" id="expenseidcat{{$expense->id}}" value="{{$expense->expense_category_id}}"></td>
                <td id="expamount{{$expense->id}}">{{$expense->amount}}</td>
              <td id="expdate{{$expense->id}}">{{$expense->entry_date}}</td>
              <td>{{$expense->created_at}}</td>
                
              </tr>
              
              @endforeach
                
            </tbody>
        </table>
        <button class="btn mt-3 float-right btn-success" data-toggle="modal" data-target="#addexpenseModal">Add Expense</button>
    </div>
</div>
@endsection
