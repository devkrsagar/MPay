<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    $adtable = "user_id";
include '../config/DbFunction.php';
$obj = new DbFunction();
$limit = "5";
$tr =  $obj->alltr($limit);
$rdata = "amount";
$totaltr = $obj->todaytr($rdata);
$totalcl = $obj->totalcl();
$admin = $obj->getadmininfo($adtable,$_SESSION['adlogin']);
$req = $obj->fundrequest($limit);
include 'includes/header.php';
?>

<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        Balance
                    </div>
                   <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $admin->balance;?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 ms-2">
                <div class="card">
                    <div class="card-header text-center">
                        Today's Recharge
                    </div>
                   <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $totaltr->amount;?></h5>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-12 ms-2">
                <div class="card">
                    <div class="card-header text-center">
                        Total Clients
                    </div>
                   <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $totalcl;?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 shadow p-2 mb-5 bg-body rounded">
            <caption>Recent Recharges</caption>
            <table class="table">
                <thead>
                    <tr>
                        <th>OrderId</th>
                        <th>Client_id</th>
                        <th>Operator</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                     <?php

                    while ($tdata = $tr->fetch_object()) {
                         $operator_id= $tdata->op_id;
                         $opdata =$obj-> getopdata($operator_id);
                          if($tdata->status == 'success'){
                            $btn = 'btn-success';
                        }elseif($tdata->status == 'pending'){
                            $btn='btn-warning';
                        }
                        else{
                           $btn='btn-danger'; 
                        }
                    ?>
                        <tr>
                            <th scope="row"><?php echo $tdata->order_id; ?></th>
                            <th><?php echo $tdata->client_id;?></th>
                            <td><em><?php echo $opdata->op_name; ?></em></td>
                            <td><b><?php echo $tdata->mobile; ?></b></td>
                            <td><?php echo $tdata->amount; ?></td>
                            <td><button  class="btn <?php echo $btn;?>"><?php echo $tdata->status; ?></button></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                    
            </div>
            <div class="col-md-6 col-sm-12 shadow p-2 mb-5 bg-body rounded">
            <caption>Recent Fund request</caption>
              <table class="table">
                <thead>
                    <tr>
                        
                        <th>TrId</th>
                        <th>Client_id</th>
                        <th>Bank</th>
                        <th>Amount</th>
                        
                        <th>Status</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                    while ($data = $req->fetch_object()) {
                        
                          if($data->status == 'success'){
                            $btn = 'btn-success';
                        }elseif($data->status == 'pending'){
                            $btn='btn-warning';
                        }
                        else{
                           $btn='btn-danger'; 
                        }
                       
                    ?>
                        <tr>
                        
                     
                            <th><?php echo $data->tr_id; ?></th>
                            <td><?php echo $data->client_id; ?></td>
                            <td><?php echo $data->bank; ?></td>
                            <td><?php echo $data->amount; ?></td>
                             
                             
                            <td><button  class="btn <?php echo $btn;?>"><?php echo $data->status; ?></button></td>
                            

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                    
            </div>
           
        </div>
    </div>
    <!-- Vertically centered scrollable modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="adminfn.php">
            <div class="row mb-3">
                <div class="col-md-12">
                 
            <label for="bank" class="col-form-label">Bank:</label>
            <input type="text" class="form-control" name="bank" id="fbank" required readonly>
                
          </div>
                </div>
                 <div class="row mb-3">
            <div class="col-md-6">
                     <label for="trid" class="col-form-label">Transaction Id:</label>
                    <input type="text" name="trid" id="ftrid" class="form-control">
                </div>
                <div class="col-md-6 col-sm-12">
                   <label for="amount" class="col-form-label">Amount:</label>
                    <input type="number" name="amount" id="famount" class="form-control">
                    <input type="hidden" name="client_id" id="fclient"  value="<?php echo $client;?>">
                </div>
            </div>
            <div class="row mb-3">
                 <div class="col-md-6">
                    <label for="pmode" class="col-form-label">Payment Date:</label>
                    <input type="text" name="date" id="fdate" class="form-control">
                </div>
                 <div class="col-md-6">
                    <label for="status" class="col-form-label">Current Status:</label>
                    <input type="text" name="status" id="status" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fstatus" class="col-form-label">Update:</label>
                    <select class="form-control" name="fstatus" id="fstatus">
                        <option value="1">Success</option>
                        <option value="2">Pending</option>
                        <option value="3">Failed</option>
                    </select>
                </div>
            </div>
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updaterequest" class="btn btn-primary">Update Request</button>
      </div>
      </form>
    </div>
  </div>
</div>

   
<?php 
include "includes/footer.php";
}
?>