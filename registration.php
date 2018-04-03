<?php include( "mainHeader.php" ); ?>

<div class="tab-content">
    <div class="tab-content-inner active" data-content="signup">
        <h3>Register</h3>
        <form action="#">
            <div class="row form-group">
                <div class="col-md-12">
                    <label>E-Mail</label><input type="text" id="e-mail" name="formname" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label>Password</label><input type="password" id="pass" name="formpassword" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </div>
        </form>
    </div>


</div>
<?php include( "mainFooter.php" ); ?>