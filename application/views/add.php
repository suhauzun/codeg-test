<div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Insert Add data Form in codeignter sample </h2>
            <br><br>
          <form method="post" action="<?php echo site_url('Welcome/submit_data'); ?>" name="data_register">
            <label for="Name">Enter you name</label>
              <input type="text" class="form-control" name="username" required >
            <br>
            <label for="Email">Enter you Email</label>
              <input type="email" class="form-control" name="email" required>
            <br>
            <label for="Sex">Select Sex</label><br>
              <input type="radio" name="sex" checked value="Male" required > Male &nbsp;  
              <input required type="radio" name="sex" value="Female" > Female
            <br><br>
            <label for="Email">Address</label>
              <textarea name="address" class="form-control" rows="6" required ></textarea>
            <br><br>
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
            <br><br>
          </form>
        </div>
    </div>
</div>