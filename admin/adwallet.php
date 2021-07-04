<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
    
include '../config/DbFunction.php';
$obj = new DbFunction();
$addata = $obj->ad_wallet_data();
include 'includes/header.php';
?>

<br>
       
      
        
<div class="container ">
  <h4>Admin Wallet</h4>
  <div class="col-md-12 col-sm-12 shadow p-2 mb-5 bg-body rounded">
           
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TrId</th>
                        <th>Opening</th>
                        <th>Amount</th>
                        <th>Closing</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Time</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                    while ($data = $addata->fetch_object()) {
                    $close = $data->open + $data->amount ; 
                        $i++;
                    ?>
                        <tr>
                        
                            <th scope="row"><?php echo $i;?></th>
                            <th><?php echo $data->trid; ?></th>
                            
                            <td><?php echo $data->open; ?></td>
                            <td><?php echo $data->amount; ?></td>
                             <td><?php echo $close ;?></td>
                             <td><?php echo $data->type;?></td>
                            <td><?php echo $data->date;?></td>
                            <td><?php echo $data->time;?></td>
                            

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
</div>
  
 <?php 

include "includes/footer.php";
}?>