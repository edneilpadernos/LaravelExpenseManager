<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Manager</title>


  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    @include('inc.sidebar')    

    <!-- Page Content -->
    <div id="page-content-wrapper">
        
        @include('inc.dashboardheader')
      
        <div class="container-fluid">
            @yield('content')
        </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

   

</body>
</html>