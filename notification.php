<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="notification.css" />
    <title>Document</title>
  </head>
  <body>

    <?php
        include 'db.php';
        $patid = $_SESSION['pat_id'];
    ?>

    <nav>
      <div class="container-nav">
        <div class="menu">
          <a href="./pat_mainpage.html">Home</a>
          <a href="./abou2t.php">About</a>
          <a href="pat_display_pdf.php">My records</a>
          <a href="./contactus2.php">Contact Us </a>
        </div>
        <!-- <div class="signup">
          <a href="./login">Sign In</a>
        </div> -->
      </div>
    </nav>
    <div class="container">
      <h2>Accept / Reject requests</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul class="notification-table">

        <?php
        $sql="select * from addrequests where patientid='$patid'";
        $query = mysqli_query($conn,$sql);
        while($info=mysqli_fetch_array($query)){
        ?>

            <li class="table-row">
                <div class="data"><?php echo $info['orgname']; ?></div>
                <div class="data"><?php echo $info['requestedon']; ?></div>
                <div class="accept"><input type="submit" value="Accept" name="asub" /></div>
                <input type="hidden" value="<?php echo $info['data']; ?>" name="hvaldata" />
                <input type="hidden" value="<?php echo $info['orgid']; ?>" name="hvalorg" />
                <div class="decline">
                <input
                    type="submit"
                    value="Reject"
                    style="background-color: #f44336"
                    name="rsub"
                />
                </div>
            </li>

        <?php
        }
        ?>

        </ul>
      </form>
    </div>
    <?php
        if(isset($_POST['asub'])){

            $npdf = $_POST['hvaldata'];
            $asql="insert into patdoings(patuserid,patdatapdf) values('$patid','$npdf')";
            mysqli_query($conn,$asql);

            $hva = $_POST['hvalorg'];
            $exsql = "DELETE FROM addrequests WHERE (orgid='$hva' and data='$npdf')";
            mysqli_query($conn,$exsql);

        }
        if(isset($_POST['rsub'])){

            $npdf = $_POST['hvaldata'];
            $hva = $_POST['hvalorg'];
            $rsql="DELETE FROM addrequests WHERE (orgid='$hva' and data='$npdf')";
            mysqli_query($conn,$rsql);

        }
    ?>
    </body>
</html>