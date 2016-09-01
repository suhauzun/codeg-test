<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<title>Simple Login with CodeIgniter - Private Area</title>
 <!-- Latest compiled and minified CSS -->
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 </head>
 <body>
  <script type="text/javascript">


  function ConfirmDialogForUser() {
  var x=confirm("Bu kişinin statüsünü değiştirmek istediğinize emin misiniz?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
  function ConfirmDialogForUserCustomer() {
  var x=confirm("Bu müşteriyi çıkarmak istediğinize emin misiniz?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
</script>

<div class="container">

   <h1>Home</h1>
   <h2>Welcome <?php echo $username; ?>!</h2>
 




<form class="form-inline" action="<?php echo base_url('home/deneme'); ?>" data-remote="true" method="post">
  <div class="form-group">
    <label class="sr-only">kullanıcı adı</label>
    <input type="username" name="username" class="form-control" id="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label class="sr-only">şifre</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
   <div class="form-group">
    <label class="sr-only">rol</label>
    <input type="role" name="role" class="form-control" id="role" placeholder="Role">
  </div>
  <button type="submit" class="btn btn-default">Giriş</button>
  <?php if(isset($message) && $message != "" ){ ?>
  <p id="message"><?php echo $message; ?></p>
  <?php } ?>
</form>



            
  <?php if(isset($role) && $role == '2') { ?>
                <br> Bunu Role 2 görecek<br>
  <?php } ?>

  
  <?php if(isset($role) && ($role == '1' || $role=='0')) { ?>
                <br> Bunu Role 0 Görecek<br>
  <?php } ?>
<br>
   

  <div class="content">
    <table class="table table-bordered">
      <thead>
        <tr>  
          <th>#</th>            
          <th>Kullanıcı Adı</th>
           <th>Diğer</th>
           <th>role</th>
           <th>Status</th>
           <th>Aktif-Pasif</th>
           <th>Sil</th>
           <th>Pass. Güncelle</th>
           <th>Kullanıcı Güncelle</th>
        </tr>

      </thead>
      <tbody>
        <?php
        if($users) :
          $i = 1;
        foreach ($users as $user) : ?>

<tr>

  <td><?php echo $i++; ?></td>
  <td class="text-capitalize"><?php echo $user->username; ?></td>
  <td class="text-capitalize"><?php echo $user->password; ?></td>
  <td class="text-capitalize"><?php echo $user->role; ?></td>
  <td class="text-capitalize"><?php echo $user->status; ?></td>


  
  <?php if($user->status == '1') { ?>
  <form action="home/activedUser" method="post">
  <input id="userId" name="userId" type="hidden" value="<?php echo $user->id; ?>">
  <td><input type="submit" class="btn btn-danger" value="Pasif Yap"/></td></form>

  <?php }elseif($user->status == '0'){ ?>
  <form action="home/removeUser" method="post">
  <input id="userId" name="userId" type="hidden" value="<?php echo $user->id; ?>">
  <td><input type="submit" class="btn btn-danger" value="Aktif Yap"/></td></form>
  <?php } ?>

  <form action="home/solData" method="post">
  <input id="userId" name="userId" type="hidden" value="<?php echo $user->id; ?>">
  <td><input type="submit" class="btn btn-danger" value="Sil"/></td>
  </form>

  <td><a href="<?php echo base_url('home/changePassword'); ?>">Şifre Değiştir</a></td>

  <td><a class="btn btn-info" href="#myModal<?php echo $user->id; ?>" data-toggle="modal" >Güncelle</a></td>

</tr>



        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>




<!-- Modal -->

<!-- Modal -->
<?php
if($users) :
  $i = 1;
foreach ($users as $user) : ?>

    <div class="modal fade" id="myModal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form id="modalForm" accept-charset="UTF-8" action="<?php echo base_url('home/updateUser'); ?>" data-remote="true" method="post" class="oneform form-horizontal">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Kullanıcı Detayları</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="form-group">
                          <div class="col-sm-10">
                             <input id="userId" name="userId" type="hidden" value="<?php echo $user->id; ?>" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="username">Adı:</label>
                            <div class="col-sm-10">
                                <input type="" id="username" name="username" value="<?php echo $user->username; ?>" class="form-control" />
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-success" data-dismiss="modal">Çık</button>
                        <button class="btn btn-primary" id="modal-form-submit">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php endforeach; endif; ?>

<a href="home/logout">Logout</a>
</div>





           

 </body>
</html>