<?
session_start();
if (!isset($_SESSION['nik'])){
header("Location:./index_.php");
}
echo "anda sukses login";
?>