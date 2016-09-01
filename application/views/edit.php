<div id="container" class="container">

<div class="row">
 <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Edit data Form in codeignter sample </h2>
        <br><br>
    <?php
      if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
      foreach ($edit_data as $key => $data) { 
    ?>
    <form method="post" action="<?php echo site_url('Welcome/update_data/'.$data['id'].''); ?>" name="data_register">
        <label for="Name">Enter you name</label>
        <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required >
        <br>
        <label for="Email">Enter you Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
        <br>
        <label for="Sex">Select Sex</label><br>
        <input type="radio" name="sex" <?php if($data['sex'] == 'Male' ) { echo 'checked'; } ?> value="Male" required > Male 
        &nbsp;  <input required type="radio" name="sex" <?php if($data['sex'] == 'Female' ) { echo 'checked'; } ?> value="Female" > Female
        <br><br>
        <label for="Email">Address</label>
        <textarea name="address" class="form-control" rows="6" required ><?php echo $data['address']; ?></textarea>
        <br><br>
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
        <br><br>
    </form>
     <?php
        }endif;
     ?>
    <br><br>
 </div>
</div>
  
</div>