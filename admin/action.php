<?php
session_start();
ob_start();
if(!(isset($_SESSION['user']))){
  header("./index");
}
else{
  include_once 'dbConnection.php';
  //$user = $_SESSION["user"];
  ?>







<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="./logout">Log Out</a></li>
              <li><a href="./post">+ Post Blog</a></li>
            </ul>
          </div>

          <!-- <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div> -->

        </div>
      </div>
    </div>


    <!-- blog Content -->
    <div class="container">
      <div class="row">

      <?php
      $q = mysqli_query($con,"SELECT * FROM `upload` ");
      $row = mysqli_num_rows($q);
      for($i=1;$i<=$row;$i++){
        $data = mysqli_fetch_assoc($q);
        $title = $data['title'];
        $fname = $data['file_name'];
        $l1 = $data['l1'];
        ?>

        <div class="col-md-5 bl">  
          <div>
            <span class="left col-xs-1"><img src="./assets/images/profile.png" alt="profile" style="width:35px;height:35px;"></span>
            <span class="right col-xs-11"><?php echo "".$title;?></span><br><hr>
            <span class="col-xs-12 bimg"><img src="./image/<?php echo "".$fname;?>" alt="dataimg.." style="width:100%;"></span><br>
            <div class="col-xs-12 data" style="text-align: justify;  text-justify: inter-word;">
              <p id="data<?php echo "".$i;?>"><?php echo "".$l1;?></p>
              <a href="./delete?title=<?php echo "".$title; ?>">Delete Blog</a>
            </div>
          </div>
        </div>

        <?php
      }
      ?>


      </div>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script type="text/javascript">
    <?php
    $q = mysqli_query($con,"SELECT * FROM `upload` ");
    $row = mysqli_num_rows($q);
    for($i=1;$i<=$row;$i++){
      ?>
      var myDiv = $('#data<?php echo $i; ?>');
      myDiv.text(myDiv.text().substring(0,150) + '....');
      <?php
    }
    ?>
    </script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>







<?php
}
?>