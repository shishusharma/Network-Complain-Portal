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
                        <h1 class="mt-4">Pending Work</h1>
                        <hr>
                        <div class="row">



<?php
$query=mysqli_query($con,"select id from users");
$totalusers=mysqli_num_rows($query);
?>
<div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Pending Work
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                  <th>Sno.</th>

       <th>Complain No.</th>
        <th>Name</th>
       <th>Your Problem</th>
       <th>Technician Name</th>
       <th>Complain Date</th>
       <th>Solution Date</th>
       <th>Work Status</th>
                </tr>
            </thead>

            <tbody>
                      <?php $ret=mysqli_query($con,"select * from usercomplain where status<1");
      $cnt=1;
      while($row=mysqli_fetch_array($ret))
      {
        $stat=$row['status'];
        $techname=$row['tname'];
        $color;
        $text;
        if($techname==NULL){
          $techname="Not Alloted";
        }
        if($stat==-1){
          $color="bg-danger";
          $text="Not Alloted";
        }
        else if($stat==0){
          $color="bg-warning";
          $text="Under Progress";
        }
        else{
            $color="bg-primary";
            $text="Work Done";
          }

        ?>
      <tr>
      <td ><?php echo $cnt;?></td>
          <td><?php echo $row['compNO'];?></td>
          <td><?php echo $row['uname'];?></td>
          <td><?php echo $row['compfor'];?></td>
          <td><?php echo $techname; ?></td>
          <td><?php echo $row['compDT'];?></td>
          <td><?php echo $row['solDT'];?></td>
          <td>
            <div class="" style="width:100%;height:100%">
                  <div class="card <?php echo $color; ?> text-white" >
                      <div class="card-body"> <?php echo $text; ?></div>

                  </div>
              </div>
             </td>
      </tr>
      <?php $cnt=$cnt+1; }?>

            </tbody>
        </table>
    </div>
</div>

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
