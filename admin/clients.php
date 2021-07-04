<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
    
include '../config/DbFunction.php';
$obj = new DbFunction();
$cl = $obj->client();

include 'includes/header.php';
?>

<br>

<div class="container ">
  <h4>Clients Report</h4>
  <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Client ID</th>
          <th scope="col">Client Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Balance</th>
          <th scop="col">Plan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $n = 0;
        while ($data = $cl->fetch_object()) {
          $n++;
           if($data->status == '1'){
                            $status = 'Active';
                            $btn = 'btn-success';
                        }else{
                            $status = 'In-Active';
                            $btn='btn-danger';
                        }
        ?>

          <tr>
            <th scope="row"><?php echo $n; ?></th>
            <td><?php echo $data->client_id; ?></td>
            <td><?php echo $data->name; ?></td>
            <td><?php echo $data->email; ?></td>
            <td><?php echo $data->mobile; ?></td>
            <td><?php echo $data->balance; ?></td>
            <td><?php echo $data->plan; ?></td>
            <td><button class="btn <?php echo $btn;?>"><?php echo $status; ?></button></td>
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