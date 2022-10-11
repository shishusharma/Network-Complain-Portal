<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
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
        <title>All Technicians </title>
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
                        <h1 class="mt-4">Available Technicians</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="row">
<?php
$query=mysqli_query($con,"select tid from tech");
$totaltech=mysqli_num_rows($query);
?>
                              <div class="col-xl-3 col-md-6">
                                  <div class="card bg-danger text-white mb-4">
                                      <div class="card-body">All Technicians
                                          <span style="font-size:22px;"> <?php echo $totaltech;?></span></div>
                                      <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="addtech.php">Add Technician</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                      </div>
                                  </div>
                              </div>



                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Technicians Details
                            </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                      <th>Sno.</th>
                           <th>Name</th>
                           <th>Mobile No.</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Joining Date</th>
                           <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                          <?php $ret=mysqli_query($con,"select * from tech");
                          $cnt=1;
                          while($row=mysqli_fetch_array($ret))
                          {
                            $stat=$row['tstatus'];
                            $color;
                            $text;
                            if($stat==0){
                              $color="bg-primary";
                              $text="Available";
                            }
                          else{
                                $color="bg-danger";
                                $text="Not Available";
                              }

                            ?>
                          <tr>
                          <td ><?php echo $cnt;?></td>
                              <td><?php echo $row['tname'];?></td>
                              <td><?php echo $row['tmob'];?></td>
                              <td><?php echo $row['temail'];?></td>
                              <td><?php echo $row['taddr'];?></td>
                              <td><?php echo $row['tjoinDT'];?></td>

                              <td>
                                <div class="" style="width:100%;height:100%">
                                      <div class="card <?php echo $color; ?> text-white" >
                                          <div class="card-body"> <?php echo $text. $row['tstatus']; ?></div>

                                      </div>
                                  </div>
                                 </td>
                          </tr>
                          <?php $cnt=$cnt+1; }?>

                                </tbody>
                            </table>
                        </div>
                                


                    </div>
                </main>
             <?php include_once('../includes/footer.php'); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
