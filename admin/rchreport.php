<?php
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
include '../config/DbFunction.php';
$obj = new DbFunction();
include 'includes/header.php';
$alltr = $obj->showallrch();
$limit = "10";
$apage = $alltr / $limit;
$page = (int) $apage;
if ($apage > $page) {
  $apage = ++$page;
}
$limit1 = 0;
$limit2 = $limit;
if (isset($_GET['page'])) {
  $p2 = $_GET['page'];
  $p = --$page;
  $limit1 = $limit * $p;
  $limit2 = $limit * $p2;
}
$tr = $obj->showrch($limit1, $limit2);
?>
<!---- Recharge Report ----->
<div class="container ">
  <h4>Recharge Report</h4>
  <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
    <table class="table">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ORD ID</th>
          <th scope="col">RC ID</th>
          <th scope="col">Mobile</th>
          <th scope="col">Operator</th>
          <th scope="col">Amount</th>
          <th scope="col">Comm</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $n = 0;
        while ($data = $tr->fetch_object()) {
             $operator_id= $data->op_id;
              $opdata =$obj-> getopdata($operator_id);
          $n++;
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
            <th scope="row"><?php echo $n; ?></th>
            <td><?php echo $data->order_id; ?></td>
            <td><?php echo $data->req_id; ?></td>
            <td><?php echo $data->mobile; ?></td>
            <td><em><?php echo $opdata->op_name; ?></em></td>
            <td><?php echo $data->amount; ?></td>
            <td><?php echo round($data->comm,2); ?></td>
            <td><?php echo $data->date; ?><p><?php echo $data->time; ?></p>
            </td>
            <td><button class="btn <?php echo $btn;?>"><?php echo $data->status; ?></button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination" style="overflow-x:scroll;">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php
      for ($i = 1; $i <= $apage; $i++) { ?>
        <li class="page-item"><a class="page-link" href="rchreport.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <!------Recharge Report ----->
  <?php
  include 'includes/footer.php';
}
  ?>