
<?
session_start();
if(!isset($_SESSION['adlogin']) || $_SESSION['adlogin'] =='')
{
header("location:index.php");
}else{
    
include '../config/DbFunction.php';
$obj = new DbFunction();
?>