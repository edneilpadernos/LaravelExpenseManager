
<!-- Sidebar -->
 <div class="bg-light border-right" id="sidebar-wrapper">
      
    <div id="sidebar" class="p-4 pt-2">
        <img src="images/user.png" class="img logo rounded-circle mb-1" alt="">
  <ul class="list-unstyled components mb-5">
    <li class="active">
          <a href="dashboard">
            @foreach ($roleslevels as $role)
                {{ $role->display_name }}
            @endforeach
            Dashboard 
          </a>
    </li>
    @if (Auth::user()->role_level==1)
        
        <li>
          <a href="#">User Management</a>
          <ul class="list-unstyled" id="usermenu">
          <li>
              <a href="roles">Roles</a>
          </li>
          <li>
              <a href="users">Users</a>
          </li>
          </ul>
        </li>
    
        <li>
          <a href="#">Expense Management</a>
          <ul class="list-unstyled">
          <li>
              <a href="expensescategory">Expense Categories</a>
          </li>
      @endif
      <li>
          <a href="expenses">Expenses</a>
      </li>
      </ul>
    </li>
  </ul>
</div>
</div>
<!-- /#sidebar-wrapper -->