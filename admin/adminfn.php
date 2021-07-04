<?php
include '../config/DbFunction.php';
$obj = new DbFunction();

if (isset($_POST['login'])) {
    session_start();
    $_SESSION['adlogin'] = $_POST['userid'];
    $login = $obj->adlogin(
        $_POST['userid'],
        $_POST['password']
    );
    if ($login == "success") {
        header('location:dashboard.php');
    } else {
        header('location:index.php');
    }
}
if (isset($_POST['updatereq'])) 
{
    $obj = new DbFunction();
    $table="client_id";
    $user = $obj->getuserinfo($table, $_POST['client']);
    $balance = $user->balance;
    
    $adtable="user_id";
    $admin = $obj->getadmininfo($adtable,$_POST['adlogin']);
    $ad_bal = $admin->balance;
    
    $amount = $_POST['amount'];
    $famount = $balance + $amount;
    if($_POST['status']=='success'){
         $uuser = $obj->update_user($_POST['client'],$famount);
        }else{
            $uuser = "success";
        }
   
   
    if ($uuser == "success") {
         $token = $obj->update_client_wallet(
             $_POST['trid'],
            $_POST['status']
        );
        
        if ($token == "success") {
            $f_bal = $ad_bal - $_POST['amount'];
            $type="Debit";
            $table2 = "balance";
            $ad_wal = $obj->update_admin($table2,$f_bal,$_POST['adlogin']);
            
            if($ad_wal == "success"){
            $ad_tr= $obj->insert_ad_tr(
            $ad_bal,
            $_POST['amount'],
            $type,
            $_POST['trid']
                );
                if($ad_tr == "success"){
            header('location:dashboard.php?msg=success');
        } else {
            header('location:dashboard.php?msg=error');
        }
    }else{
        header('location:urequest.php?msg=Something went wrong');
        }
      }
    }
}
if(isset($_POST['opstatus']))
{
    if($_POST['status'] == '1'){
        $opstatus = '0';
    }elseif($_POST['status'] == '0'){
        $opstatus = '1';
    }
    $opstatus = $obj->updateopstatus($opstatus,$_POST['opstatus']);
    if($opstatus == 'success')
    {
      header('location:dashboard.php?opmsg=success');   
    }else
    {
         header('location:dashboard.php?opmsg=kuchhtogarbarhai');   
    }
    
}    

  if (isset($_POST['adminfund']) && $_POST['type']) {
            $adtable="user_id";
            $admin = $obj->getadmininfo($adtable,$_POST['adlogin']);
            $ad_bal = $admin->balance;
            if($_POST['type'] == "Debit"){
            $f_bal = $ad_bal - $_POST['amount'];
            }elseif($_POST['type'] == "Credit"){
             $f_bal = $ad_bal + $_POST['amount'];   
            }
            $table2 = "balance";
            $ad_wal = $obj->update_admin($table2,$f_bal,$_POST['adlogin']);
            
            if($ad_wal == "success"){
            $ad_tr= $obj->insert_ad_tr(
            $ad_bal,
            $_POST['amount'],
            $_POST['type'],
            $_POST['trid']
                );
                if($ad_tr == "success"){
            header('location:dashboard.php?msg=success');
        } else {
            header('location:dashboard.php?msg=error');
        }
    }else{
        header('location:dashboard.php?msg=Something went wrong');
        }
      }


