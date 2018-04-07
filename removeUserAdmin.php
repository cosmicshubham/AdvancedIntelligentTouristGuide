<?php include( "adminDashboardHeader.php" ); ?>
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
            <div class="card-header"><strong>RemovUser</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="row form-group">
                    <div class="col-md-4">
                    <label for="vat">Username</label>
                    <select name="cbuser" id="activities" class="form-control">
                        <option value="">Admin</option>
                    </select>
                </div>
            </div>
                    <label for="vat" class=" form-control-label">Faltu INfo</label><br>
                    <button id="payment-button" type="submit" name="btnremove" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Remove</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
                </div>
            </div>
        </div>
        <!-- .content -->
    </div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>