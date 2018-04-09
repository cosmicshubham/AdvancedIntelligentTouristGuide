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
                    <label>Confirm Password</label><input type="password" id="pass" name="formcnfpassword" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" onclick="validateEmail(formname,formpassword,formcnfpassword)" name="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <script>
        function validateEmail(emailField,password,cnfpassword){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(emailField.value=="" || password.value=="" || cnfpassword.value==""){
            alert("Please Fill All Required Field");
            return false;
        }
        else 
        {
            if (reg.test(emailField.value) == false && reg) 
            {
            alert("Invalid email");
            return false;
            }
            if(password.value!=cnfpassword.value)
                alert("Password and Confirm Password Different");
        }
        return true;
    }
    </script>


</div>
<?php include( "mainFooter.php" ); ?>