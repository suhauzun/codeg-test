
  
    <!-- CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>Email</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
              
                    <div class="change-form">

				           <?php echo validation_errors(); ?>
				           <?php echo form_open('gfp/index'); ?>
				       
				           <input type="text" size="30" id="email" name="email"/><br/>
				          <!-- <input type="submit"name="submit"  value="Gönder"/>-->
   
                        <button id="passwordUpdateButton" style="display:block;" type="submit" class="btn btn-default">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
 