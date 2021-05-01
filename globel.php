<?php
include_once 'dbConnection.php';
error_reporting(0);
// $url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";
set_time_limit(500);
$url1 = "./main.json";

$string = file_get_contents($url1);
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom css -->
        <link href="./custom/custom.css" rel="stylesheet">
        <link href="./custom/ext1.css" rel="stylesheet">
        <link href="./custom/scroll.css" rel="stylesheet">
        
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- <link rel="stylesheet" href="./custom/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>

        <style type="text/css">
        /* ============ desktop view ============ */
        
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
                <li><a href="./news?url=<?php echo "".$url1; ?>">News</a></li>
                <li><a href="./blog">blogs</a></li>

                <li class="active1 nav-item dropdown">

                  <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#">Equity</a>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="./Graph.html" style="color: #17202A;"> Graph</a></li>
                    <li><a class="dropdown-item" href="./equity" style="color: #17202A;"> Equity</a></li>
                  </ul>

                </li>


              </ul>
            </div>
        </nav>

        

        <div class="container">
          <div class="row">
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <form class="example" action="./search" method="GET">
                <input type="text" placeholder="Search Company" id="statelist" name="statelist" value="">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div id="suggesstion-box"></div>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="head">
              <center><h3>GLOBAL INDICES</h3></center>
              <hr class="new1">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table indx ">

                <thead>
                  <tr class="th">
                    <td><b>Company Name</b><td>
                    <td><b>High</b><td>
                    <td><b>Low</b><td>
                    <td><b>Last Price</b><td>
                    <td><b>% Chg</b><td>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><b>US MARKETS</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=us;COMP");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>

                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>

                  </tr>


                  <tr>
                    <td><b>EUROPEAN MARKETS</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=de;qx");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=fr;CAC");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=gb;FTSE");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>


                  <tr>
                    <td><b>ASIAN MARKETS</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=sg;STI");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=JP;N225");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=cn;hsi");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=tw;IXTA");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=kr;KSPI");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=cn;shi");
                  $json_a = json_decode($string, true);
                  $selectOptions = $json_a['indices'];

                  $type = $selectOptions['stkexchg'];
                  $high = $selectOptions['high'];
                  $low = $selectOptions['low'];
                  $lprice = $selectOptions['lastprice'];
                  $percentchange = $selectOptions['percentchange']."%";
                  ?>
                  <tr>
                    <td><?php echo "".$type; ?><td>
                    <td><?php echo "".$high; ?><td>
                    <td><?php echo "".$low; ?><td>
                    <td><?php echo "".$lprice; ?><td>
                    <?php
                    if($percentchange < 0){
                      ?>
                      <td style="color:#D00931"><?php echo "".$percentchange; ?><td>
                      <?php
                    }else{
                      ?>
                      <td style="color:#0CA02D"><?php echo "".$percentchange; ?><td>
                      <?php
                    }
                    ?>
                  </tr>




                </tbody>

              </table><br><br>
            </div>



          </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->

        <script>
        $(document).ready(function()
        {
          $("#statelist").keyup(function()
          {
            $.ajax({
              type: "POST",
              url: "./autocomplete-search",
              data:'keyword='+$(this).val(),
              success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
              }
            });
          });
        });
        function selectState(val) 
        {
          $("#statelist").val(val);
          $("#suggesstion-box").hide();
        }
        </script>




        <div class="footer">
          <p>Copyright &#169; 2020 FutureLiv <b>Design By</b> Tablab Technolodgy</p>
        </div>

        
    </body>
</html>