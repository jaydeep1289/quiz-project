<?php   session_start();  
    include("include/config.php");
    if(isset($_SESSION['u_email']))  
    {
?>      
        <script>window.location.href="index.php";</script>      
<?php   
    } 


if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password_hash = md5($password);

    $_SESSION['login']=$email;
    $select = "SELECT * FROM `user_master` WHERE uemail= '".$email."' and upass = '".$password_hash."'";
    // echo $select;
    $query = mysqli_query($conn, $select);
    // print_r($query);
    // exit;
    $count = mysqli_num_rows($query);
    // print_r($count);
    // exit;

    if (mysqli_num_rows($query) != 0)
    {
  
     echo "<script language='javascript' type='text/javascript'> location.href='index.php' </script>"; 
      }
      
      else
      {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
    }
  
     
}
?>
  
<!DOCTYPE html>
<html>
<head>
<?php
    include 'include/head.php';
?>
</head>
<body class="hold-transition login-page" style="background-image: url('img.jpg'); background-repeat: no-repeat; background-size: cover;background-attachment: fixed;">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Login</b>PAGE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
           
    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Email" required/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder=" Please Enter Password" required/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
        
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
  
    </div>
    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
  include 'include/script.php';
?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>


