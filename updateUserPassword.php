<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Update Password</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Username</label>
                    <input type="text" id="vat" placeholder="Enter user name" name="tbusername" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">New Password</label>
                    <input type="password" id="vat" placeholder="Enter password" name="tbpassword" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">Confirm Password</label>
                    <input type="password" id="vat" placeholder="Enter password" name="tbcnfpassword" class="form-control col-lg-12">
                    <br>
                    <button id="payment-button" type="submit" name="btnupdate" class="btn btn-lg btn-info col-lg-3"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Update Password</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
                </div>
            </div>
        </div>
        <!-- .content -->
    </div>
</div>
	<?php include( "userDashboardFooter.php" ); ?>