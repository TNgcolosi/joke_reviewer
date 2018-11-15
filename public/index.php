<?php include "templates/header.php"; 
include "../functions.php";
?>

<?php (isset($_POST['login'])) ? $login_successful = attempt_login($_POST['email'], $_POST['password']) : "user not found "; ?>



<div class="container">
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="thandi@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" value="p@ssw0rd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" value="login" name="login" class="btn btn-primary">Submit</button>
</form>
</div>
</form>
 

<?php include "templates/footer.php"; ?>