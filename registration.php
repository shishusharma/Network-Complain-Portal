<?php 
require_once('includes/config.php');

//Code for Registration
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $mob=$_POST['mob'];
    $addr=$_POST['addr'];
    //$q=mysqli_query($con,"call idgenerator");
    // $uuid="";
    // while($data=mysqli_fetch_array($q)){
    //   $uuid=$data[0];
    // }
   // echo $email;

$sql=mysqli_query($con,"select uid from userlogin where uemail='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
    $msg=mysqli_query($con,"insert into userlogin(uname,uemail,upassword,umob,uadd) values('$name','$email','$pass','$mob','$addr')");

if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'registration.php'; </script>";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP PROJECT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>

<body>

    <!-- <div class="text-center" style="margin-bottom:0;width: 100%;max-height: 100px;background-color: cadetblue;
    overflow:hidden;
    float: left;">
        <div class="container-sm-2" >
            <div class="row">
                <div class="col-sm-2">
                    <img src="img/MNNIT.png" alt="logo" width="80px" height="80px" float:"left">
                </div>
                <div class="col-sm-10" style="padding-top:20px;font-family:'Arial Black', Gadget, sans-serif;">
                    <h4>Network Complaint Portal , MNNIT Allahabad,Prayagraj- 211004</h4>
                </div>
            </div>
        </div>

    </div> -->
    <div class="text-center"  style="overflow: hidden; margin-bottom:0;width: 100%;max-height: 100px;background-color: white;float: left;">
        <div class="container-sm-2" >
            <div class="row">
                <div class="col-sm-3">
                    <img src="img/MNNIT.png" alt="logo" width="80px" height="80px" float:"left">
                </div>
                <div id="ht" class="col-sm-9" style="padding-top:30px;font-family:'Georgia';">
                    <h2>Network Complaint Portal , MNNIT Allahabad, Prayagraj- 211004</h2>
                </div>
            </div>
        </div>

    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">User</a>
                    <div class="dropdown-menu dropdown-content">
                        <a class="dropdown-item" href="login.php">User Login</a>
                        <a class="dropdown-item" href="#">User Registration</a>

                      </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="technician/techlogin.php">Technician Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-2">
                &nbsp;
            </div>
            <div class="col-sm-8">
                <h2><!--any thing written here--></h2>
                <h5><!--any thing written here--></h5>
                <div class="">
                    <form id="registeredUser" role="form" style="text-align: center;" class="form-horizontal" action="" method="POST">
    <span class="group-btn"> <!-- <a href="#" class="btn btn-danger btn-md">New User Credential </a>  -->
										<h4 style="text-align: center;">Registration Here</h4>




						<div class="form-group">
							<p>
								<font color="red"></font>
							</p>
						</div>  <div class="card-body">
                <!--  <a href="edit-profile.php">Edit</a> -->
                  <table class="table table-bordered">
                     <tr>
                      <th>Name</th>
                         <td colspan="3"><input class="form-control" id="name" name="name" type="text" value=""   required /></td>
                     </tr>


                     <tr>
                         <th>Email</th>
                        <td colspan="3"><input class="form-control" id="email" name="email" type="text"   required /></td>
                     </tr>
                       <tr>
                         <th>Contact No.</th>
                        <td colspan="3"><input class="form-control" id="mob" name="mob" type="text"   pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                     </tr>
                     <tr>
                    <th>Address</th>
                    <td colspan="3"><input class="form-control" id="add" name="addr" type="add" value=""   required /></td>
                </tr>
                <tr>
               <th>Create Password</th>
               <td colspan="3"><input class="form-control" id="pass" name="pass" type="password" value=""   required /></td>
           </tr>
                     <tr>
                       <th>&nbsp;</th>
                       <td colspan="4" style="text-align:center ;">
                         <button type="submit" class="btn btn-primary" name="update">Register</button>
                       </td>
                   </tr>

                          <tr>

                     </tr>
                      </tbody>
                  </table>
              </div>





					</form><!-- aa -->


                </div>

            </div>

            <div class="col-sm-2">
                &nbsp;
            </div>
        </div>
    </div>

         <?php include('includes/footer.php');?>
        <style> .col-lg-12{text-align: center; border: 1px solid black;}</style>



</body>

</html>
