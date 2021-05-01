<?php
$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";

//$url1 = "./main.json";

$string = file_get_contents($url1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom css -->
        <link href="./custom/custom.css" rel="stylesheet">
        
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- <link rel="stylesheet" href="./custom/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block;}
            .navbar .nav-item .dropdown-menu{ margin-top:0;}
        }
        .footer {
          position: fixed;
        }
        
        </style>

    </head>
    <body>
        <nav class="navbar topbar1">
            <div class="container topbar">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">FutureLiv</a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="./">Home</a></li>
                <li><a href="./news?url=<?php echo "".$url1; ?>">News</a></li>
                <li class="active1"><a href="#">blogs</a></li>
                <!--<li><a href="https://rcltechlab.000webhostapp.com/FutureLiv/Equity/">Equity</a></li>-->
                <li class="nav-item dropdown">

                  <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#">Equity</a>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item active1" href="./Graph.html" style="color: #17202A;"> Graph</a></li>
                    <li><a class="dropdown-item active1" href="./equity" style="color: #17202A;"> Equity</a></li>
                  </ul>

                </li>
              </ul>
            </div>
        </nav>


        <div class="container">
          <div class="row">
          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <lable class="news1"><b>Blogs</b></lable>
            <hr class="news">
          </div>

          <?php
          include_once 'dbConnection.php';
          $q = mysqli_query($con,"SELECT * FROM `upload` ");
          if($q == true){
          $row = mysqli_num_rows($q);

          if($row == 0){
            echo "<center><h4>No Blog</h4></center>";
          }else{
            for($i=1;$i<=$row;$i++){
              $data = mysqli_fetch_assoc($q);
              $title = $data['title'];
              $fname = $data['file_name'];
              $l1 = $data['l1'];
              ?>
  
              <div class="col-md-4 bl">  
                <div>
                  <span class="right col-xs-11"><h2><?php echo "".$title;?></h2></span><br><hr>
                  <span class="col-xs-12 bimg"><img src="./admin/image/<?php echo "".$fname;?>" alt="dataimg.." style="width:100%;"></span><br>
                  <div class="col-xs-12 data" style="text-align: justify;  text-justify: inter-word;">
                    <p id="data<?php echo "".$i;?>"><?php echo "".$l1;?></p>
                    <a href="./detail?title=<?php echo "".$title; ?>">continue</a>
                  </div>
                </div>
              </div>
  
              <?php
            }
          }
          
          }else{
              echo "";
          }
          ?>

          </div>
        </div><br><br><br>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Bootstrap core JavaScript -->
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <div class="footer">
          <p>Copyright &#169; 2020 FutureLiv <b>Design By</b> Tablab Technolodgy</p>
        </div>
    </body>
</html>