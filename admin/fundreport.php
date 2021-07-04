<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
    
include '../config/DbFunction.php';
$obj = new DbFunction();
$limit = "15";
$req = $obj->fundrequest($limit);
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
                        
                            <th scope="row"><?php echo $i;?></th>
                            <th><?php echo $data->tr_id; ?></th>
                            <td><?php echo $data->client_id; ?></td>
                            <td><?php echo $data->bank; ?></td>
                            <td><?php echo $data->amount; ?></td>
                             <td><?php echo $data->date; ?></td>
                             
                            <td><?php echo $data->status;?></td>
                            

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