<?php
session_start();
if (!(isset($_SESSION['login']))) {

  header('location:index.php');
}

include 'includes/header.php';
$alltr = $obj->showallclienttr($table, $client);

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
$tr = $obj->showclientwallettr($table, $client, $limit1, $limit2);
?>
<!---- Recharge Report ----->
<div class="container ">
  <h4>Recharge Report</h4>
  <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Status</th>
          <th scope="col">UTR</th>
          <th scope="col">Prev. Bal</th>
          <th scope="col">Amount</th>
          <th scope="col">Clos. Bal</th>
          <th scope="col">Bank</th>
          <th scope="col">Pay Mode</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $n = 0;
        while ($data = $tr->fetch_object()) {
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
            <td><button class="btn <?php echo $btn;?>"><?php echo $data->status; ?></button></td>
            <td><?php echo $data->tr_id; ?></td>
            <td><?php echo $data->op_bal; ?></td>
            <td><?php echo $data->amount; ?></td>
            <td><?php echo $data->cl_bal; ?></td>
            <td><?php echo $data->bank; ?></td>
            <td><?php echo $data->pmode; ?></td>
            <td><?php echo $data->date; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
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
  ?>