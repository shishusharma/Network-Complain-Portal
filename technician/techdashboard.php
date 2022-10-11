<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['tid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | Technician</title>
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
$techid=$_SESSION['tid'];
//echo $techid;
$query=mysqli_query($con,"select * from tech where tid='$techid'");
while($result=mysqli_fetch_array($query))
{?>
                      <h1 class="mt-4">Technician Profile</h1>
                      <div class="card mb-4">

                          <div class="card-body">
                            <!--  <a href="edit-profile.php">Edit</a> -->
                              <table class="table table-bordered">
                                 <tr>
                                  <th>Name</th>
                                     <td><?php echo $result['tname'];?></td>
                                 </tr>
                                 <tr>
                                <th>Address</th>
                                <td colspan="3"><?php echo $result['taddr'];?></td>
                            </tr>

                                 <tr>
                                     <th>Email</th>
                                     <td colspan="3"><?php echo $result['temail'];?></td>
                                 </tr>
                                   <tr>
                                     <th>Contact No.</th>
                                     <td colspan="3"><?php echo $result['tmob'];?></td>
                                 </tr>

                                      <tr>
                                     <th>Reg. Date</th>
                                     <td colspan="3"><?php echo $result['tjoinDT'];?></td>
                                 </tr>
                                  </tbody>
                              </table>
                          </div>
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
