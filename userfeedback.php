     
       <?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>User Tags</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Place Name</label>
                    <input type="text" id="vat" placeholder="Enter place name" name="formplacename" class="form-control col-lg-12">
                    <br>
                    <div class="row form-group">
                    <div class="col-md-3">
                    <label for="vat">Place Ratings</label>
                    <select name="#" id="activities" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                        <option value="">7</option>
                        <option value="">8</option>
                        <option value="">9</option>
                        <option value="">10</option>
                    </select>
                </div>
            </div>
                    
                    <label for="vat" class=" form-control-label">Any Comments</label>
                    <input type="text" id="vat" placeholder="Enter your comments" name="formcomment" class="form-control col-lg-12">
                    <br>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Add</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
                </div>
            </div>
        </div>
        <!-- .content -->
    </div>
</div>
    <?php include( "userDashboardFooter.php" ); ?>
    