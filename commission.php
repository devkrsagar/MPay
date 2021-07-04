<?php
session_start();
include 'includes/header.php';
$status = "1";
$user = $obj->getuserinfo($table, $client);
$plan = $user->plan;
if($plan==''){
    echo"<script>alert('No active Plan');</script>";
}
$op = $obj->showopp();
?>
<div class="container ">
  <h4>Commission Slab</h4>
  <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Service Provider</th>
          <th scope="col">Provider Id</th>
          <th scope="col">Is STV</th>
          <th scope="col">Com (Basic)</th>
          <th scope="col">Com (Starter)</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $n = 0;
        while ($data = $op->fetch_object()) {
          $n++;
           if($data->status == '1'){
                            $status = 'online';
                            $btn = 'btn-success';
                        }else{
                            $status = 'offline';
                            $btn='btn-danger';
                        }
        ?>

          <tr>
            <th scope="row"><?php echo $n; ?></th>
            <td><?php echo $data->op_name; ?></td>
            <td><?php echo $data->op_id; ?></td>
            <td><?php echo $data->is_stv; ?></td>
            <td><?php echo $data->basic; ?></td>
            <td><?php echo $data->starter; ?></td>
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
  <?php include 'includes/footer.php'; ?>