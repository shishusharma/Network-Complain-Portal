<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

    if(isset($_POST['submit']))
    {
        $tname=$_POST['tname'];
        $taddr=$_POST['taddr'];
        $tmob=$_POST['tmob'];
        $temail=$_POST['temail'];
        $tpass=$_POST['tpass'];

        //$userid=$_SESSION['adminid'];
        $msg=mysqli_query($con,"insert into tech (tname,tmob,temail,taddr,tpass) values('$tname','$tmob','$temail','$taddr','$tpass')");
      //  $msg1=mysqli_query($con,"update 'usercomplain' set uname='$uname' where id='$userid'");


        if($msg)
        {
            echo "<script>alert('Technician added successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'technicians.php'; </script>";
        }else {

          echo "<script>alert('Technician Not added ');</script>";
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
        <title>Admin Dashboard | Registration and Login System </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
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
$userid=$_SESSION['adminid'];
//$query=mysqli_query($con,"select * from userlogin where uid='$userid'");
//while($result=mysqli_fetch_array($query))
{?>

                        <h1 class="mt-4">Add Technician</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                              <tr>
                            <th>Name</th>
                            <td colspan="3"><input class="form-control" id="tname" name="tname" type="text" value="" required /></td>
                        </tr>

                                   <tr>
                                 <th>Mobile No.</th>
                                 <td colspan="3"><input class="form-control" id="tmob" name="tmob" type="text" value="&nbsp;" pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                             </tr>

                                         <tr>
                                           <th>Email</th>
                                           <td colspan="3"><input class="form-control" id="temail" name="temail" type="text" value="&nbsp;"  required /></td></tr>
                                   <tr>
                                       <th>Address</th>
                                      <td colspan="3"><input class="form-control" id="taddr" name="taddr" type="text" value="&nbsp;"  required /></td>
                                   </tr>


                                        <tr>
                                          <th>Password</th>
                                          <td colspan="3"><input class="form-control" id="tpass" name="tpass" type="text" value="&nbsp;"  required /></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('../includes/footer.php');?>
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
