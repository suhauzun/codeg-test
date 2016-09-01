<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<title>Simple Login with CodeIgniter - Private Area</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 </head>
 <body>


<div class="container">

   <h1>Simple Login with CodeIgniter</h1>
   <?php echo validation_errors(); ?>

    <form  action="<?php echo base_url('VerifyLogin'); ?>" method="POST" class="form-horizontal">

    <div class="form-group">
      <label class="sr-only">kullanıcı adı</label>
      <input type="username" name="username" class="form-control" id="username" placeholder="Username">
    </div>

    <div class="form-group">
      <label class="sr-only">Şifre</label>
      <input type="password" class="form-control"  size="20" id="passowrd" name="password" placeholder="Username">
    </div>

   <div class="form-group">
     <input type="submit"  class="form-control"  value="Login"/>
   </div>  
   <div class="form-group"><a href="gfp">Şifremi Unuttum</a></div> 
   </form>
  </div> 
 </body>
</html>



       

 </body>
</html>