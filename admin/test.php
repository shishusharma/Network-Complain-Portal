<?php
session_start();

$con=mysqli_connect("localhost","root","","loginsystem");

if(isset($_POST['submit']))
{
  $brandlist = $_POST['chkbox'];
  foreach ($brandlist as $branditems)
  {
    echo $branditems."<br>";
  }
}
 ?>
