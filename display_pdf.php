<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display pdf</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Calibri", "Trebuchet MS",sans-serif;
        /* border:1px solid lime; */
      }
      .modal {
        display: none;
        position: fixed;
        z-index: 7;
        left: 50%;
        transform: translateX(-50%);
        width: 70%;
        height: 40%;
        overflow: auto;
        background-color: #a1a1a1;
        border-radius: 5px;
        color: white;
      }
      .modal-content {
        margin: 50px auto;
        /* border: 1px solid #999; */
        width: 60%;
      }
      h2,
      p {
        margin: 0 0 20px;
        font-weight: 400;
      }
      span {
        display: block;
        padding: 0 0 5px;
      }
      form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #eee;
      }
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      .contact-form form{
        display: none;
      }
      .contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      .contact-form  h2{
        font-size: 35px;
      }
      .contact-form div{
        position: absolute;
        top:20%;
        left:70%;
      } 
      button:hover {
        background: #2371a0;
      }
      .close {
        color: black;
        float: right;
        font-size: 48px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }
      button.button:hover {
        border-bottom: #a99567 1px solid;
      }
      body{
        height :100vh;
        background-color: white;
      }

      .file_upload{
        position: fixed;
        height:100vh;
        width:25%;
        left:75%;
        border-left:3px solid black;
        background-color: white;
      }
      .file_upload *{
        background-color: transparent;
        position: relative;
      }

      .file_upload h2{
        font-size: 32px;
        color:black;
        position: relative;
        top:20px;
        left:25px;
      }
      .search-container{
        width: 65%;
        /* background-color: rgba(0, 0, 0, 0.4); */
        text-align: center;
        position: relative;
        left:4%;
      }
      
      .search-box{
        display: flex;
        justify-content: center;
      }
      .search-box input{
        border-radius:80px;
        background-color: rgb(40,34,58);
        color: white;
        width: 85%;
        padding: 15px 30px;
        font-size:20px;
        font-weight: 0;
      }
      .search-box input[type="submit"]{
        position:relative;
        background-color: transparent;
        right:50px;
        color:transparent;
        cursor: pointer;
      }
      .search-box i{
        font-size:20px;
        position :relative;
        z-index: 1;
        color:white;
        left:-5%;
        background-color: transparent;
        padding-top: 16px;
      }
      input{
        border:none;
        outline:none;
        width: fit-content;
      }
      ::placeholder{
        color:#878787;
        align-items: center;
        font-size: 20px;
        top:3px;
        padding-left:20px;
      }
      .btn-hide{
        background-color: transparent;
      }
      table{
        width: 85%;
        text-align: center;
        position: relative;
        left:7%;
        border-radius: 5px;
        padding: 0px;
        /* border:1px solid black; */
        overflow: visible;
        font-family: 'Roboto', sans-serif;
        font-size:20px;
        background-color: rgb(40,34,58);
        border:none;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
      }
      tr{
        padding:5px; 
      }
      th{
          padding: 20px;
          font-weight: 300;
          background-color: rgb(40,34,58);
          color:white;
          
       }
      td{
            padding: 7px 15px;
            vertical-align:middle;
            font-weight: 250;
            background-color: white;
            /* border :1px solid white; */
        }
      .del{
            width:50px;
          }
      .recent{
        width: 65%;
        position: relative;
        margin-top: 40px;
        left:1.5%;
      }
      .abc{
        display: flex;
        flex-direction: column;
        margin-top: 6%;
      }
      a{
        text-decoration: none;
        background-color: transparent;
        color:black;
      }
      #btnn {
        color:#f44336;
      }
      #form_label{
        position: relative;
        font-weight: 600;
        padding-top: 7px;
        left:-25px;
      }
      #userid{
        background-color:#e8e9eb;
        border-radius: 25px;
        padding: 10px;
        font-size: 15px;
        font-weight: 500;
      }
      #form_flex{
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-size:20px;
      }
       tr, td, th{
        
    }
    .button .material-symbols-outlined{
      position: relative
    }
.container-nav {
  margin: 10px auto;
  display: flex;
  justify-content: space-between;
  min-width: 900px;
}
.menu,
.signup {
  display: inline-block;
  justify-content: flex-end;
  margin: 0 40px;
  gap: 1rem;
}
.menu a,
.signup a {
  color: #fff;
  text-decoration: none;
  font-weight: 400;
  font-size: 18.5px;
  transition: 0.4s;
  padding: 10px 25px;
  margin: 0 5px;
  border-radius: 100px;
}
.menu a:hover,
.signup a:hover {
  background-color: #e74c14;
}

nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 99;
  padding: 16px 32px;
  background-color: #212121;
  border-bottom: 3px solid #e74c14;
   font-family: "fantasy", "Gill Sans", "Gill Sans MT", "Calibri", "Trebuchet MS",
    sans-serif;
}

.signup a {
  border-radius: 0;
  padding: 16px 24px;
  border: 1px solid white;
}

    </style>
</head>
<body onKeyPress="return keyPressed(event)">
  <nav>
      <div class="container-nav">
        <div class="menu">
          <a href="mainpage.php">Home</a>
          <a href="about1.php">About</a>
          <a href="display_pdf.php">My records</a>
          <a href="contactus1.php">Contact Us </a>
        </div>
        <div class="signup">
          <a href="signout.php">Sign Out</a>
        </div>
      </div>
    </nav>
<?php
  include 'db.php';
?>
<div name="upload_div" class="file_upload">
  <h2> Upload files</h2>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

      <div id="form_flex"><label for="userid" id="form_label">User ID:</label>
      <input id="userid" type="text" name="usr" value="" placeholder="Enter User ID" /></div>
      <label id="label_1">
      <input id="pdfid" type="file" name="pdfile" value="" accept=".pdf"title="Upload PDF" />
      <label>
      <input id="smitid" type="submit" name="smit" value="Upload" onKeyPress="return keyPressed(event)">
      
  </from>
  <?php
    if(isset($_POST['smit']) and isset($_POST['usr'])){
        $usrid=$_POST['usr'];
        $npdf=$_FILES['pdfile']['name'];
        $pdf_type=$_FILES['pdfile']['type'];
        $pdf_size=$_FILESL['pdfile']['size'];
        $pdf_tem_loc=$_FILES['pdfile']['tmp_name'];
        $pdf_store="store/".$npdf;
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        $sql="insert into Docdoings(Username,Datapdf) values('$usrid','$npdf')";
        $query=mysqli_query($conn,$sql);
        
        // $orgid = $_SESSION['org_id'];
        // $orgname = $_SESSION['org_name'];
        
                                 
        //           $sql2 = "insert into addrequests(orgid,orgname,patientid,data) values('$orgid','$orgname','$usrid','$npdf')";
        //           mysqli_query($conn,$sql2);
      
    }
    ?>
</div>


<div class="abc">
<div name="search_div" class="search-container">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="search-box"><input id="userid2" type="text" name="usr2" value="" placeholder="Search" />
      <i class="fa fa-search"><input id="smitid2" type="submit" name="smit2" value="search" class="btn-hide" required onKeyPress="return keyPressed(event)"/></i>
      <!-- <i class="fa fa-sharp fa-solid fa-close"></i> -->
    </div>
      <br><br>
      
  </form>
  <?php
    if(isset($_POST['smit2']) and isset($_POST['usr2'])){
      $usrid=$_POST['usr2'];
  ?>
      <table>
          <thead>
              <th>ID</th>
              <th>UserName</th>
              <th>FileName</th>
          </thead>
          <tbody>
          <?php
          $i = 1;
          $sql="select * from Docdoings where Username='$usrid'";
          $query = mysqli_query($conn,$sql);
          while($info=mysqli_fetch_array($query)){
          ?>
          <tr>
              <td><?php echo $info['priid']; ?></td>
              <td><?php echo $info['Username']; ?></td>
              <td><a href="store/<?php echo  $info['Datapdf'];?>"><?php echo $info['Datapdf'];?></a> </td>
              <td>
                  <button class="button " id="btnn" data-modal="modal.'<?php echo $i; ?>.'"><span class="material-symbols-outlined">
delete
</span></button>
                  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@delete is above@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
              </td>
              <div id="modal.'<?php echo $i; ?>.'" class="modal">
                  <div class="modal-content">
                      <div class="contact-form">
                          <a class="close">&times;</a>
                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                              <!-- <h2>Are you sure, Continue to delete?</h2> -->
                              Are you sure,Continue to delete?
                              <div>                    
                                  <input id="userid3" type="hidden" name="usr3" value="<?php echo $info['priid']; ?>" >
                                  <input id="smitid3" type="submit" name="smit3" value="Yes" onKeyPress="return keyPressed(event)">
                              </div>
                              <!-- <button type="button">No</button> -->
                          </form>
                      </div>
                  </div>
              </div>
          </tr>
          <?php 
              $i = $i+1 ; }
          ?> 
        </tbody>
      </table>
  <?php
    }
  ?>
<?php
  if(isset($_POST['smit3'])){
      include'db.php';
      $x= $_POST['usr3'];
      $sql="DELETE FROM docdoings WHERE priid='$x'";
      mysqli_query($conn,$sql); 
  }   
?>
</div>


<div name="recents_div" class="recent">
<?php
    if(!(isset($_POST['smit2']) and isset($_POST['usr2']))){
?>
<table>
  <thead>
    <th>ID</th>
    <th>UserName</th>
    <th>FileName</th>
  </thead>
  <tbody>
    <?php
      $i = 1;
      // $date = date("Y-m-d");
      // $pr = intval(substr($date,-2));
      // $pd = (string)($pr-1);
      // $pdate = substr_replace($date,$pd,-2);

      // $sql="select * from Docdoings where whenup='$pdate'";
      $sql="select * from Docdoings";
      $query = mysqli_query($conn,$sql);
      while($info=mysqli_fetch_array($query)){
    ?>
    <tr>
      <td><?php echo $info['priid']; ?></td>
      <td><?php echo $info['Username']; ?></td>
      <td><a href="store/<?php echo $info['Datapdf'];?>"> <?php echo $info['Datapdf'];?></a></td>
      <td class="del">
        <button class="button " id="btnn" data-modal="modal.'<?php echo $i; ?>.'"> <span class="material-symbols-outlined">
delete
</span> </button>
        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@delete is above@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
      </td>
      <div id="modal.'<?php echo $i; ?>.'" class="modal">
          <div class="modal-content">
              <div class="contact-form">
                  <a class="close">&times;</a>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                      <!-- <h2>Are you sure, Continue to delete?</h2> -->
                      <h2>Are you sure , Continue to delete ?</h2>
                      <div>                    
                          <input id="userid4" type="hidden" name="usr4" value="<?php echo $info['priid']; ?>" >
                          <input id="smitid4" type="submit" name="smit4" value="Yes" onKeyPress="return keyPressed(event)" onClick="window.location.href=window.location.href"">
                      </div>
                      <!-- <button type="button">No</button> -->
                  </form>
              </div>
          </div>
      </div>
    </tr>
  <?php 
      $i = $i+1 ; }
  ?> 
  </tbody>
</table>
<?php
  }
?>
<?php
  if(isset($_POST['smit4'])){
      include'db.php';
      $x= $_POST['usr4'];
      $sql="DELETE FROM docdoings WHERE priid='$x'";
      mysqli_query($conn,$sql); 
  }   
?>

      </div>
</div>

<script>
    let modalBtns = [...document.querySelectorAll(".button")];
    modalBtns.forEach(function (btn) {
    btn.onclick = function () {
        let modal = btn.getAttribute("data-modal");
        document.getElementById(modal).style.display = "block";
    };
    });
    let closeBtns = [...document.querySelectorAll(".close")];
    closeBtns.forEach(function (btn) {
    btn.onclick = function () {
        let modal = btn.closest(".modal");
        modal.style.display = "none";
    };
    });
    window.onclick = function (event) {
    if (event.target.className === "modal") {
        event.target.style.display = "none";
    }
    };
    function keyPressed(e)
{
     var key;      
     if(window.event)
          key = window.event.keyCode; //IE
     else
          key = e.which; //firefox      

     return (key != 13);
}
</script>
</body>
</html>