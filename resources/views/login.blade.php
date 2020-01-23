<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Manager</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row mt-5 pt-5">
            
            <div class="col-md-6 offset-3">
            @if(isset(Auth::user()->email))
                <script>window.location="/dashboard";</script>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif
                <form method="POST" action="login">
                    {{ csrf_field() }}
                <div class="card">

                    <div class="card-header">Expense Manager Login</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-3">
                               <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="row mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            
                            <div class="row mt-5 pb-3">
                                <button  type="submit"class="btn btn-primary form-control" id="login">login</button>
                                
                            </div>
                        </div>
                    </div>
                </div>        
              
            </div>
        </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
    
</body>
</html>