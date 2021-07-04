<?php
include 'config/DbFunction.php';
$obj = new DbFunction();
if (isset($_POST['register'])) {
    $useravail = $obj->useravail($_POST['mobile'],$_POST['email']);
    if($useravail == 0){
    $reg = $obj->registration(
        $_POST['name'],
        $_POST['mobile'],
        $_POST['email'],
        $_POST['password']
    );
    if ($reg == 'success') {
    
        header('location:index.php?msg=success');
    }else{
       header('location:index.php?msg=error');  
    }
    }elseif($useravail > 0){
      header('location:index.php?msg=duplicate');  
    }
}

if (isset($_POST['login'])) {
    session_start();
    $_SESSION['login'] = $_POST['userid'];
    $login = $obj->login(
        $_POST['userid'],
        $_POST['password']
    );
    if ($login == "success") {
        header('location:dashboard.php');
    } else {
        header('location:index.php');
    }
}

if (isset($_POST['updatetoken'])) {
    $obj = new DbFunction();
    $user = $obj->checkuser($_POST['client_id'], $_POST['password']);
    if ($user == "success") {
        $token = $obj->tokenupdate(
            $_POST['token'],
            $_POST['client_id']
        );
        if ($token == "success") {
            header('location:apitoken.php?msg=success');
        } else {
            header('location:apitoken.php?msg=error');
        }
    }else{
        header('location:apitoken.php?msg=incoorectpwd');
    }
}

if (isset($_POST['updateip'])) {
    $obj = new DbFunction();
    $user = $obj->checkuser($_POST['client_id'], $_POST['password']);
    if ($user == "success") {
        $ip = $obj->ipupdate(
            $_POST['ip'],
            $_POST['client_id']
        );
        if ($ip == "success") {
            header('location:ipsecurity.php');
        } else {
            header('location:index.php');
        }
    }
}

if (isset($_POST['chngepwd'])) {
    $obj = new DbFunction();
    $user = $obj->checkuser($_POST['client_id'], $_POST['password']);
    if ($user == "success") {
        $pwd = $obj->chngpwd(
            $_POST['password'],
            $_POST['newpwd']
        );
        if ($pwd == "success") {
            header('location:changepwd.php?msg=success');
        } else {
            header('location:changepwd.php?msg=error');
        }
    }
    else{
        header('location:changepwd.php?msg=incorrectpwd');
    }
}

if (isset($_POST['payrequest'])) {
    $obj = new DbFunction();
    $table="client_id";
    $user = $obj->getuserinfo($table, $_POST['client_id']);
    $op_bal = $user->balance;
    $cl_bal =$op_bal + $_POST['amount'];
        $pay = $obj->payrequest(
            $_POST['client_id'],
            $op_bal,
            $cl_bal,
            $_POST['bank'],
            $_POST['pmode'],
            $_POST['amount'],
            $_POST['date'],
            $_POST['trid'],
            $_POST['status']
        );
        if ($pay == "success") {
            header('location:walletrprt.php?msg=success');
        } else {
            header("location:walletrprt.php?msg='$op_bal'");
        }
    }