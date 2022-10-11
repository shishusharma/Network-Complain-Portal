<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['tid']==0)) {
  header('location:logout.php');
  }
else{

  if(isset($_POST['submit']))
  {


      $btnval=$_POST['submit'];



         $query = "update usercomplain set status='1',solDT=CURRENT_TIMESTAMP() where compNO='$btnval'";
         $query_run = mysqli_query($con, $query);


  // echo $brands;

      // echo $item . "<br>";
      //$query = "INSERT INTO demo (name) VALUES ('$item')";
      //$query = "update usercomplain set status=0,tname='$tname' where compNO='$item'";
    //  $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        echo "<script>alert('Task Completed!');</script>";
        header("Location: techpending.php");
      }
      else
      {
        echo "<script>alert('Technician no successfully');</script>";
      //  header("Location: index.php");
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
              <main><form method="post">
                  <div class="container-fluid px-4">
                      <h1 class="mt-4">Pending Work</h1>
                      <hr>



<?php
$query=mysqli_query($con,"select id from users");
$totalusers=mysqli_num_rows($query);
?>
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Pending Work Details
  </div>
  <div class="card-body">
      <table id="datatablesSimple">
          <thead>
              <tr>
                <th>Sno.</th>
     <th>Client Name</th>
     <th>Mobile No.</th>
     <th>Complain No.</th>
     <th>Problem</th>
     <th>Complain Date</th>
     <th>Action</th>
              </tr>
          </thead>

          <tbody>
                    <?php $ret=mysqli_query($con,"SELECT * from usercomplain INNER JOIN userlogin ON usercomplain.uid=userlogin.uid and usercomplain.status=0;");
                    //SELECT usercomplain.uid,userlogin.uname,userlogin.umob,usercomplain.compNO,usercomplain.compDT,usercomplain.status from usercomplain INNER JOIN userlogin ON usercomplain.uid=userlogin.uid;
    $cnt=1;
    while($row=mysqli_fetch_array($ret))
    {
      // $stat=$row['status'];
      // $color;
      // $text;
      // if($stat==-1){
      //   $color="bg-danger";
      //   $text="Not Alloted";
      // }
      // else if($stat==0){
      //   $color="bg-warning";
      //   $text="Under Progress";
      // }
      // else{
      //     $color="bg-primary";
      //     $text="Work Done";
      //   }

      ?>
    <tr>
    <td ><?php echo $cnt;?></td>
        <td><?php echo $row['uname'];?></td>
        <td><?php echo $row['umob'];?></td>
        <td><?php echo $row['compNO'];?></td>
        <td><?php echo $row['compfor'];?></td>
        <td><?php echo $row['compDT'];?></td>

        <td>


          <button type="submit" class="btn btn-primary btn-block" value="<?php echo $row['compNO']; ?>" name="submit">Done</button>

            </div>
           </td>
    </tr>
    <?php $cnt=$cnt+1; }?>

          </tbody>
      </table>
  </div>
</div>




</div></form>
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
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
