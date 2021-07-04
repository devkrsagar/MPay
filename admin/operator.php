<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
    
include '../config/DbFunction.php';
$obj = new DbFunction();
$op = $obj->showopp();

include 'includes/header.php';
?>

<br>
       
      
        
<div class="container ">
  <h4>Operator</h4>
  <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>OperatorId</th>
                        <th>Operator</th>
                        <th>Is STV</th>
                        <th>Com (Basic)</th>
                        <th>Com (Starter)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($dataop = $op->fetch_object()) {
                        if($dataop->status == '1'){
                            $status = 'online';
                            $btn = 'btn-success';
                        }else{
                            $status = 'offline';
                            $btn='btn-danger';
                        }
                        ?>
                        <tr>
                            <td><?php echo $dataop->op_id;?></td>
                            <td><?php echo $dataop->op_name;?></td>
                            <td><?php echo $dataop->is_stv;?></td>
                            <td><?php echo $dataop->basic;?></td>
                            <td><?php echo $dataop->starter;?></td>
                            <td>
                            <form method="POST" action="adminfn.php">
                                <input type="hidden" name="status" value="<?php echo $dataop->status; ?>">
                            <button name="opstatus" value="<?php echo $dataop->op_id;?>" class="btn <?php echo $btn;?>"><?php echo $status;?></button>
                            </form>
                            </td>
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