<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
    
include '../config/DbFunction.php';
$obj = new DbFunction();
$status="pending";
$req = $obj->fundreq($status);
include 'includes/header.php';
?>

<br>
       
      
        
<div class="container ">
  <h4>Fund Request</h4>
  <div class="col-md-12 col-sm-12 shadow p-2 mb-5 bg-body rounded">
           
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TrId</th>
                        <th>Client_id</th>
                        <th>Bank</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                    while ($data = $req->fetch_object()) {
                        
                          if($data->status == 'success'){
                            $btn = 'btn-success';
                        }elseif($data->status == 'pending'){
                            $btn='btn-warning';
                        }
                        else{
                           $btn='btn-danger'; 
                        }
                        $i++;
                    ?>
                        <tr>
                            <form method="POST" action="adminfn.php">
                            <th scope="row"><?php echo $i;?></th>
                            <th><input type="text" class="form-control" name="trid" value="<?php echo $data->tr_id; ?>" readonly></th>
                            <td><input type="text" class="form-control" name="client" value="<?php echo $data->client_id; ?>" readonly></td>
                            <td><input type="text" class="form-control" name="bank" value="<?php echo $data->bank; ?>" readonly></td>
                            <td><input type="text" class="form-control" name="amount" value="<?php echo $data->amount; ?>" readonly></td>
                             <td><input type="text" class="form-control" name="date" value="<?php echo $data->date; ?>" readonly></td>
                             <input type="hidden" class="form-control" name="adlogin" value="<?php echo $_SESSION['adlogin']; ?>">
                             
                            <td>
                                <select name="status" class="form-control">
                                <option><?php echo $data->status;?></option>
                                <option>success</option>
                                <option>failed</option>
                                </select>
                                
                                </td>
                                <td><button type="submit" id="updatebtn" name="updatereq" class="btn btn-outline-primary">Update</button></td>
                            </form>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
</div>
  <script>
    $(document).ready(function() {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
  
 <?php 

include "includes/footer.php";
}?>