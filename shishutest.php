<?php  
    include_once('includes/config.php');
    $query=mysqli_query($con,"select tid from usercomplain where tid=11001103 and status=0");
    $totaltech=mysqli_num_rows($query);
    $query=mysqli_query($con,"select tid from usercomplain where tid=11001103 and status=1");
    $totaltech1=mysqli_num_rows($query);
    echo $totaltech;
    ?>
    <br>
    <?php
    echo $totaltech1;
    echo  $totaltech1-$totaltech;

    ?>