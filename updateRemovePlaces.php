<?php
include( "sessionRedirector.php" );
include( "adminDashboardHeader.php" ); ?>
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
            <div class="card-header"><strong>Update Places</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="row form-group">
                    <div class="col-md-4">
                    <label for="vat">Place Name</label>
                    <select name="cbplaces" id="activities" class="form-control">
                        <option value="">1</option>
                    </select>
                </div>
            </div>
                    <label for="vat" class=" form-control-label">Name</label>
                    <input type="text" id="vat" placeholder="Enter your name" name="tbname" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">Latitudes</label>
                    <input type="text" id="vat" placeholder="Enter latitudes" name="tblatitudes" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">Longitudes</label>
                    <input type="text" id="vat" placeholder="Enter longitudes" name="tblongitudes" class="form-control col-lg-12">
                    <br>
                    <button id="payment-button" type="submit" name="btnupdate" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Update</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
                    <button id="payment-button" type="submit" name="btnremove" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Remove</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
                </div>
            </div>
        </div>
        <!-- .content -->
    </div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>