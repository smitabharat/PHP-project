<?php
include_once 'dbConnection.php';
$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=8bdf620efed74e0e8d074bc74921239a";

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
                <li class="active1"><a href="./blog">blogs</a></li>
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


        <!-- blog Content -->
        <div class="container blg">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   

              <?php
                  $title1 = $_GET['title'];

                  //echo gettype($title1);

                  $text = "Hate Paying Taxes? Check How to Pay 0 Income Tax on Salary of Rs 20+ Lakh (FY 2021-22)";
                  //$title1 = str_replace("","\'",$title1);
                  //$title1 = strval($title1);

                  $q = mysqli_query($con,"SELECT * FROM `upload` WHERE `title` = '$title1' ");
                  $row = mysqli_num_rows($q);
                  for($i=1;$i<=$row;$i++){
                    $data = mysqli_fetch_assoc($q);
                    $title = $data['title'];
                    $fname = $data['file_name'];
                    $l1 = $data['l1'];
                    $l2 = $data['l2'];
                    $l3 = $data['l3'];
                    $l4 = $data['l4'];
                    $l5 = $data['l5'];
                    ?>

                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="./admin/image/<?php echo "".$fname; ?>" alt="dataimg.." class="img-responsive">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h1><?php echo "".$title; ?></h1>
                        <h3><lable class="text2">By</lable>&nbsp;&nbsp;Admin</h3>
                      </div>
                    </div>
                    
                    <br><br>
                    <p id="data"><?php echo "".$l1; ?></p><br>
                    <p id="data"><?php echo "".$l2; ?></p><br>            
                    <p id="data"><?php echo "".$l3; ?></p><br>
                    <p id="data"><?php echo "".$l4; ?></p><br>            
                    <p id="data"><?php echo "".$l5; ?></p><br>
                    <?php
                  }
                  ?>

            </div>
          </div>
        </div><br><br>

        <div class="footer">
            <p>Copyright &#169; 2020 FutureLiv <b>Design By</b> Tablab Technolodgy</p>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>