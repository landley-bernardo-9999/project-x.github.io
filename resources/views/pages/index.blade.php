<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="custom-css/login.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <!--Font awesome links-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <title>{{config('app.name','Vester')}}</title>

  </head>
  <body>
    
    <!--Login Form-->
     <div class="container" id="form-container">
        <form method="POST" action="php/login.php">  
          <h1><i class="fas fa-sign-in-alt"></i>&nbspLOGIN</h1>
          <br>
          <!--Username Input-->
            <div class="form-group">
                <input name="userName" id="userName" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Username" required>
            </div>
          
          <!--Password Input-->
            <div class="form-group">
                <input name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
            </div>
          
          <!---Submit Button-->
            <button type="submit" id="submit" class="btn btn-primary">Login</button>
          <!--Forgot Password-->  
          <br>
          <a href="/forgotpassword" class="btn btn-primary btn-md" tabindex="-1" role="button">Forgot Password?</a>
          <!--Register-->
          <br>
          <a href="/signup" class="btn btn-primary btn-md" tabindex="-1" role="button">Sign Up</a>
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
  </body>
</html>   