<?php

$url1 = $_GET['url']."&category=".$_GET['category']."&apiKey=".$_GET['apiKey'];
$string = file_get_contents($url1);

$url6 = $_GET['url']."&category=".$_GET['category']."&apiKey=".$_GET['apiKey'];
$string5 = file_get_contents($url6);



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
                    <li><a class="dropdown-item active1" href="./Graph.html" > Graph</a></li>
                    <li><a class="dropdown-item active1" href="./equity" > Equity</a></li>
                  </ul>

                </li>
              </ul>
            </div>
        </nav>

<!--Sub Navigation Bar-->
        <div class="container">
          <div class="row">
          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <!--  <lable class="news1"><b>Latest News</b></lable>
            <hr class="news">-->


            <nav class="navbar topbar2">
          
            <div class="navbar-header"> 
  <ul class="nav">
    <li><a href="#">Latest News</a>
    <ul>
     <li><a class="dropdown-item active1" href="$url6 ">Most read or Trending</a></li> 
        <li><a class="dropdown-item active1" href="#">Most shared</a></li>
        <li><a class="dropdown-item active1" href="#">Political</a></li>
      </ul>
      </li>
    <li><a href="#">Market</a>
      <ul>
        <li><a class="dropdown-item active1" href="#">Nifty</a></li>
        <li><a class="dropdown-item active1" href="#">Sensex</a></li>
        <li><a class="dropdown-item active1" href="#">Global</a></li>
       </ul>
    </li>
    <li><a href="#">Stocks</a>
      </li>
      <li><a href="#">Commodities</a>
      </li>
      <li><a href="#">Forex</a>
      </li>
        <li><a href="#">Business</a>
          <ul>
            <li><a class="dropdown-item active1" href="#">India</a></li>
            <li><a  class="dropdown-item active1" href="#">International</a></li>
             </ul>
        </li>
        <li><a  href="#">Industry</a>
        <ul>
           <li><a class="dropdown-item active1" href="#">Auto</a></li>
            <li><a class="dropdown-item active1" href="#">Banking/Finance</a></li>
            <li><a class="dropdown-item active1" href="#">Consumer Products</a></li>
            <li><a class="dropdown-item active1" href="#">Energy</a></li>
            <li><a class="dropdown-item active1" href="#">Insurance</a></li>
            <li><a class="dropdown-item active1" href="#">IT</a></li>
            <li><a class="dropdown-item active1" href="#">Pharma</a></li>
            <li><a class="dropdown-item active1" href="#">Real Estate</a></li>
            <li><a class="dropdown-item active1" href="#">Services</a></li>
            <li><a class="dropdown-item active1" href="#">Telecom</a></li>
            <li><a class="dropdown-item active1" href="#">Technolodgy</a></li>
             </ul>
      </li>
        
    <li><a href="#">Economic</a>
    <ul>
    <li><a class="dropdown-item active1" href="#">Policies</a></li>
    <li><a class="dropdown-item active1" href="#">Economic Indicators</a></li>
    <li><a class="dropdown-item active1" href="#">Foreign Trade</a></li>
      </ul>
      </li>
    <li><a href="#">Personal Finance</a>
      <ul>
        <li><a class="dropdown-item active1" href="#">Mutual Funds</a></li>
        <li><a class="dropdown-item active1" href="#">Public provident Fund(PPF)</a></li>
        <li><a class="dropdown-item active1" href="#">Fixed Deposits</a></li>
        <li><a class="dropdown-item active1" href="#">Recurring Deposits</a></li>
        <li><a class="dropdown-item active1" href="#">Employee Provident Fund(EPF)</a></li>
        <li><a class="dropdown-item active1" href="#">Bonds</a></li>
        <li><a class="dropdown-item active1" href="#">Life Insurance</a></li>
        <li><a class="dropdown-item active1" href="#">Health Insurance</a></li>
      </ul>
    </li>
  </nav>

<hr class="news">

</div>
<!--End Of Sub Nav Bar-->

          <?php
          $json_a = json_decode($string, true);
          $selectOptions = $json_a['articles'];
          for($i = 0; $i < sizeof($selectOptions); $i++){
              $title = $selectOptions[$i]['title'];
              $imgurl = $selectOptions[$i]['urlToImage'];
              $url = $selectOptions[$i]['url'];
              $date = $selectOptions[$i]['publishedAt'];
              $description = $selectOptions[$i]['description'];
              $author = $selectOptions[$i]['source']['name'];
              if($imgurl != "" || $imgurl != null){
              ?>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 headline">
                  <a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><img src="<?php echo "".$imgurl; ?>"></a>
                  <a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><h3><?php echo "".$title; ?></h3></a>
                  <label><h6><span class="text2"><b>By</b></span> <?php echo "".$author; ?>&nbsp;,&nbsp;<span class="text2"><b><?php echo "".$date; ?></b></h6></label>
                  <p><?php echo "".$description; ?></p>
              </div>
              <?php
              }
          }
          ?>



<div>
                        <label>Trending News</label>
                        <br>
                        <br>
                        <ul>
                        <?php
                        $json_a = json_decode($string5, true);
                        $selectOptions = $json_a['articles'];

                        for($i = 0; $i < sizeof($selectOptions); $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url6; ?>"><?php echo $title; ?></a></li>
                            <?php
                        }
                        ?>
                        <ul>
                        <center><button class="button"><a href="./news?url=<?php echo "".$url6; ?>">Read more</a></button></center>
                    </div>










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