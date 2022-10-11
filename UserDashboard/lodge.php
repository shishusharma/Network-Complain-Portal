<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0))
{
  header('location:logout.php');
}
else
{
  //Code for Updation
 // for  password change
 $userid=$_SESSION['id'];
 $rec = mysqli_query($con,"SELECT * From userlogin where uid='$userid'");  // Use select query here
 //$data = mysqli_fetch_array($rec);



$nm;
 while($data = mysqli_fetch_array($rec))
 {
      $nm=$data['uname'];// displaying data in option menu
 }
 //$un=$data['uname'];

 //$nm=$_POST['un'];

 if(isset($_POST['submit']))
 {
    $probname=$_POST["Problem"];
    $ins = mysqli_query($con,"insert into usercomplain(uid,uname,compfor) values('$userid','$nm','$probname')");
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
        <title>Change password | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
function valid()
{

alert("Complaint Filed!");


}
</script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">


                        <h1 class="mt-4">Lodge Complaint</h1>
                        <div class="card mb-4">
                     <form method="post" name="changepassword" onSubmit="valid();">
                            <div class="card-body">
                              <table class="table table-bordered">
                                 <tr>
                                  <th>Nature of Complaint</th>
                                     <td>
                                       <select class="form-select" name="Problem" aria-label="Default select example">
                                         <option disabled selected>Select the Problem</option>

                                         <?php
                                          // Using database connection file here
                                          $records = mysqli_query($con,"SELECT compName From complainname");  // Use select query here

                                          while($data = mysqli_fetch_array($records))
                                          {
                                            echo "<option value='". $data['compName'] ."'>" .$data['compName'] ."</option>";  // displaying data in option menu
                                          }
                                          ?>
                                       </select>
                                     </td>
                                 </tr>

                                 <tr>
                                     <td colspan="4" style="text-align:center ;">
                                       <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Complaint</button>
                                     </td>

                                 </tr>
                                  </tbody>
                              </table>


                            </div>
                            </form>
                        </div>


                    </div>
                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script language="javascript" type="text/javascript">

        </script>
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
