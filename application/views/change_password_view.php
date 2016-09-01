

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
		<!-- HEADER -->
<div class="form-horizontal">

	<?php echo form_open('/home/changeYourPassword',array('class' => 'oneform')); ?>
    <div class="form-group">
		<label class="col-sm-2 control-label">Şifreniz:</label>
		<div class="col-sm-10">
		  <input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
	 	  <input type="password"  required name="oldPassword" id="oldPassword" value="" placeholder="Eski şifre" class="form-control" />
	    </div>
	</div>
	<div class="form-group">	
		<label class="col-sm-2 control-label">Yeni Şifreniz:</label>
		<div class="col-sm-10">
	 	   <input type="password"  required name="newPassword" id="newPassword" value="" placeholder="Yeni şifre" class="form-control" />
	    </div>
	</div>
	<div class="form-group">
	 	<label class="col-sm-2 control-label">Yeni Şifre Tekrarı:</label>
	 	
        <div class="col-sm-10">
	 	  <input type="password" required name="newPassword2" id="newPassword2" value="" placeholder="Yeni şifre tekrarı" class="form-control" />
	    </div>
		<?php if(isset($message) && !empty($message)):  ?>	
           <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
        <?php endif; ?>
	</div>	
	 <button class="btn btn-success">Güncelle</button>
 </form>
</div>
	</div>
 </body>
</html>