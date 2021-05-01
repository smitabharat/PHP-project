<?php

$url1 = $_GET['url']."&category=".$_GET['category']."&apiKey=".$_GET['apiKey'];
$string = file_get_contents($url1);

if($string){
  // echo "API Request Accepted !";
}else{
  //echo "API Request Failed !";
  header("location:./fail.html");
}

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
        .responsive {
          width: 100%;
          height: auto;
        }
        .footer {
          position: fixed;
        }
        </style>
        
                <style>
            @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block;}
            .navbar .nav-item .dropdown-menu{ margin-top:0;}
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
                <li class="active1"><a href="./news?url=<?php echo "".$url1; ?>">News</a></li>
                <li><a href="./blog">blogs</a></li>
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
          
          <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
          <!--  <lable class="news1"><b>Latest News</b></lable>-->
          <!--  <hr class="news">-->
          <!--</div>-->

          <?php
          $json_a = json_decode($string, true);
          $selectOptions = $json_a['articles'];
          $serial = $_GET['serial'];
          for($i = $serial; $i <= $serial; $i++){
              $title = $selectOptions[$i]['title'];
              $imgurl = $selectOptions[$i]['urlToImage'];
              $url = $selectOptions[$i]['url'];
              $date = $selectOptions[$i]['publishedAt'];
              $description = $selectOptions[$i]['description'];
              $author = $selectOptions[$i]['source']['name'];
              $content = $selectOptions[$i]['content'];
              
            //   echo $imgurl;
            //   echo $url;
            //   echo $date;
            //   echo $description;
            //   echo $author;
              ?>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <img src="<?php echo $imgurl; ?>" alt="Nature" class="responsive" width="100%" height="auto"><br>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1><?php echo $title; ?></h1>
                    <h5><lable class="text2">By</lable>&nbsp;&nbsp;<?php echo "".$author; ?></h5>
                    <h5><lable class="text2">Published On</lable>&nbsp;&nbsp;<?php echo "".$date; ?></h5>
                    <h5><lable class="text2">Source </lable>&nbsp;&nbsp;<a href="<?php echo "".$url; ?>"><?php echo "".$url; ?></a></h5>
                  </div>
                </div>
                  <center>
                      
                      <br>
                  </center>
                  <p><b><?php echo $description; ?></b></p><br>
                  <p><b><?php echo $content; ?></b></p><br>
              </div>
              <?php
          }
          ?>

          </div>
        </div>

        <div class="footer">
          <p>Copyright &#169; 2020 FutureLiv <b>Design By</b> Tablab Technolodgy</p>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>