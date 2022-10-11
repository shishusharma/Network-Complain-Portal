<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation
if(isset($_POST['update']))
{
    $uname=$_POST['uname'];
    $addr=$_POST['addr'];
    $contact=$_POST['contact'];
    $userid=$_SESSION['id'];
    $msg=mysqli_query($con,"update 'userlogin' set uname='$uname',uadd='$addr',umob='$contact' where id='$userid'");
    $msg1=mysqli_query($con,"update 'usercomplain' set uname='$uname' where id='$userid'");


    if($msg&&$msg1)
    {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
    }else {

      echo "<script>alert('Profile not  updated ');</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

<?php
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from userlogin where uid='$userid'");
while($result=mysqli_fetch_array($query))
{?>

                        <h1 class="mt-4"><?php echo $result['uname'];?>'s Profile</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">

                                <table class="table table-bordered">
                                   <tr>
                                    <th>Name</th>
                                       <td><input class="form-control" id="uname" name="uname" type="text" value="<?php echo $result['uname'];?>" required /></td>
                                   </tr>
                                   <tr>
                                 <th>Address</th>
                                 <td colspan="3"><input class="form-control" id="addr" name="addr" type="text" value="<?php echo $result['uadd'];?>"  required /></td>
                             </tr>

                                         <tr>
                                       <th>Contact No.</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['umob'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Email</th>
                                       <td colspan="3"><?php echo $result['uemail'];?></td>
                                   </tr>


                                        <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['ujoindate'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>