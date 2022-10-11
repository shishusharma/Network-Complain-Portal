<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  }
else
{


    if(isset($_POST['submit']))
    {

      $techid=$_POST["techname"];
      $brands = $_POST['chkbox'];
      //$bds="";
      foreach($brands as $bds1)
         {
           $q1="select tname from tech where tid='$techid'";
           $q1run=mysqli_query($con,$q1);


           $tn="";
            while($data = mysqli_fetch_array($q1run))
            {
                 $tn=$data['tname'];// displaying data in option menu
            }




           $query = "update usercomplain set status='0',tname='$tn',tid='$techid' where compNO='$bds1'";
           $query_run = mysqli_query($con, $query);

         }
    // echo $brands;

        // echo $item . "<br>";
        //$query = "INSERT INTO demo (name) VALUES ('$item')";
        //$query = "update usercomplain set status=0,tname='$tname' where compNO='$item'";
      //  $query_run = mysqli_query($con, $query);


      if($query_run)
      {
          echo "<script>alert('Technician added successfully');</script>";
        //  header("Location: index.php");
        }
        else
        {
          echo "<script>alert('Technician no successfully');</script>";
        //  header("Location: index.php");
        }
      }
  /*
    if(isset($_POST['submit']))
    {
           $tname=$_POST["tname"];

$msg;
        foreach($twork as $item)
            {
              $sql = "update usercomplain set status=0,tname='$tname' where uid='$item'";


                // $msg=mysqli_query($con,"update usercomplain set status=0,tname='$tname' where uid='$item'");
                // if($msg)
                // {
                //     echo "<script>alert('Technician added successfully');</script>";
                //     echo "<script type='text/javascript'> document.location = 'technicians.php'; </script>";
                // }else {
                //
                //   echo "<script>alert('Technician Not added ');</script>";
                // }

            }


        //$userid=$_SESSION['adminid'];
      //   $msg=mysqli_query($con,"insert into tech (tname,tmob,temail,taddr,tpass) values('$tname','$tmob','$temail','$taddr','$tpass')");
      // //  $msg1=mysqli_query($con,"update 'usercomplain' set uname='$uname' where id='$userid'");



    }
    */

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
                <main><form method="post">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Assign Work To Technicians</h1>
                        <hr>
                        <div class="card-body">
                          <table class="table table-bordered">
                             <tr>
                              <th>Choose A Technician</th>
                                 <td>
                                   <select class="form-select" name="techname" aria-label="Default select example">
                                     <option disabled selected>Select Technician</option>

                                     <?php
                                      // Using database connection file here
                                      $records = mysqli_query($con,"SELECT * From tech");  // Use select query here

                                      while($data = mysqli_fetch_array($records))
                                      {
                                        echo "<option value='". $data['tid'] ."'>" .$data['tname'] ."</option>";  // displaying data in option menu
                                      }
                                      ?>
                                   </select>
                                 </td>
                                 <td colspan="2" style="text-align:center ;">
                                   <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Complaint</button>
                                 </td>
                             </tr>
                              </tbody>
                          </table>


                        </div>


<?php
$query=mysqli_query($con,"select id from users");
$totalusers=mysqli_num_rows($query);
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Registered User Details
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                  <th>Sno.</th>
       <th>Name</th>
       <th>Complain No.</th>
       <th>Your Problem</th>
       <th>Complain Date</th>
       <th>Work Status</th>
                </tr>
            </thead>

            <tbody>
                      <?php $ret=mysqli_query($con,"select * from usercomplain where status=-1");
      $cnt=1;
      while($row=mysqli_fetch_array($ret))
      {
        $stat=$row['status'];
        $color;
        $text;
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
          <td><?php echo $row['uname'];?></td>
          <td><?php echo $row['compNO'];?></td>
          <td><?php echo $row['compfor'];?></td>
          <td><?php echo $row['compDT'];?></td>
          <td>

            <input type="checkbox" style="height:40px;" name="chkbox[]" value="<?php echo $row['compNO']?>">
          <?php echo $row['compNO']?>
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
