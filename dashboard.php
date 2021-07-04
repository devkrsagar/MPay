<?php
session_start();
if (!(isset($_SESSION['login']))) {

    header('location:index.php');
}

include 'includes/header.php';

$limit1 = 0;
$limit2 = $limit;
$tr = $obj->showtr($table, $client, $limit1, $limit2);
$status = "1";
$op = $obj->showopp();
$rdata = "amount";
$totaltr = $obj->totaltr($table, $client, $rdata);
$rdata="comm";
$totalcom = $obj->totaltr($table, $client, $rdata);
if($plan==''){
    $plan="No Active Plan";
}
?>
<!----balance ------>
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row justify-content-center">

                <div class="col-md-2 shadow-lg p-3 mb-5 bg-body rounded ">
                    <p class="header mt-2"> Balance</p>
                    <h4 class="px-3"><i class="fa fa-rupee"></i> <?php echo round($user->balance,2); ?></h4>
                </div>
                <div class="col-md-2 ms-2 shadow-lg p-3 mb-5 bg-body rounded">
                    <p class="header mt-2"> Today Recharge</p>
                    <h4 class="px-3"><i class="fa fa-rupee"></i> <?php echo $totaltr->amount;?></h4>
                </div>
                <div class="col-md-2 ms-2 shadow-lg p-3 mb-5 bg-body rounded">
                    <p class="header mt-2"> Total Earning</p>
                    <h4 class="px-3"><i class="fa fa-rupee"></i> <?php echo round($totalcom->comm,2);?></h4>
                </div>
                <div class="col-md-2 ms-2 shadow-lg p-3 mb-5 bg-body rounded">
                    <p class="header mt-2"> Plan</p>
                    <h4 class="px-3"><em><?php echo $plan;?></em></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</b>
<!---------Recent Transactions --------->
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6 com-sm-10 table-responsiv shadow-lg p-3 mb-5 bg-body rounded">
            <caption>Recent Recharges</caption>
            <table class="table">
                <thead>
                    <tr>
                        <th>OrderId</th>
                        <th>Operator</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($data = $tr->fetch_object()) {
                        $operator_id= $data->op_id;
                         $opdata =$obj-> getopdata($operator_id);
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
                            <th scope="row"><?php echo $data->order_id; ?></th>
                            <td><em><?php echo $opdata->op_name; ?></em></td>
                            <td><b><?php echo $data->mobile; ?></b></td>
                            <td><?php echo $data->amount; ?></td>
                            <td><button class="btn <?php echo $btn;?>"><?php echo $data->status; ?></button></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-5 com-sm-10 ms-4 shadow-lg p-3 mb-5 bg-body rounded">
            <caption>Operator Status</caption>
            <table class="table">
                <thead>
                    <tr>
                        <th>OperatorId</th>
                        <th>Operator</th>
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
                            <td><button class="btn <?php echo $btn;?>"><?php echo $status;?></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>