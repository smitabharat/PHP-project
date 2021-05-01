<?php
include_once 'dbConnection.php';
error_reporting(0);
// $url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";
$id1 = $_GET['id1'];

set_time_limit(500);

if(!isset($id1)){
  header('location:./equity');
}

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
        <link href="./custom/ext2.css" rel="stylesheet">
        <link href="./custom/scroll.css" rel="stylesheet">
        
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- <link rel="stylesheet" href="./custom/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>

        <style type="text/css">
        /* ============ desktop view ============ */
        
        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu{ display: none; }
            .navbar .nav-item:hover .dropdown-menu{ display: block;}
            .navbar .nav-item .dropdown-menu{ margin-top:0;}
        }

        /* #a0{
          background: #424949 ;
        } */
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
          <div class="row"><br>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <form class="example" action="./search" method="GET">
                <input type="text" placeholder="Search Company" id="statelist" name="statelist" value="">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>

            <div id="suggesstion-box"></div><br>

          </div>
        </div>

        <br>

        <div class="container">
          <div class="row">

            <br>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="mn">
              <table class="table">

                <thead>
                    <tr><th>Indian Indices</th></tr>
                </thead>
            
                <tbody>
                  <?php

                  //for($i = 0; $i<=70; $i++){
                  $numbers = array( 9, 7, 28, 49, 6, 1, 2, 4, 3, 5, 8, 9, 10, 11, 12, 13, 14, 15);
                  for($i = 0; $i < count($numbers); $i++){
                    $count = $numbers[$i];
                    $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=$count");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['indices'];
                    $type = $selectOptions['stkexchg'];
                    ?>
                    <tr>
                        <td id="<?php echo "a".$count; ?>"><a id="<?php echo "b".$count; ?>" href="./indian?id1=<?php echo "".$count; ?>"><?php echo $type; ?></a></td>
                    </tr>
                    <?php
                  }

                  
                  for($i = 16; $i < 28; $i++){
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=$i");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      $type = $selectOptions['stkexchg'];
                      ?>
                      <tr>
                          <td id="<?php echo "a".$i; ?>"><a id="<?php echo "b".$i; ?>" href="./indian?id1=<?php echo "".$i; ?>"><?php echo $type; ?></a></td>
                      </tr>
                      <?php
                  }

                  for($i = 29; $i < 49; $i++){
                    $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=$i");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['indices'];
                    $type = $selectOptions['stkexchg'];
                    ?>
                    <tr>
                        <td id="<?php echo "a".$i; ?>"><a id="<?php echo "b".$i; ?>" href="./indian?id1=<?php echo "".$i; ?>"><?php echo $type; ?></a></td>
                    </tr>
                    <?php
                  }

                  for($i = 50; $i < 70; $i++){
                    $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=$i");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['indices'];
                    $type = $selectOptions['stkexchg'];
                    ?>
                    <tr>
                        <td id="<?php echo "a".$i; ?>"><a id="<?php echo "b".$i; ?>" href="./indian?id1=<?php echo "".$i; ?>"><?php echo $type; ?></a></td>
                    </tr>
                    <?php
                  }

                  ?>
                <tbody>

              </table>

                
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table indx table-hover">

                
                  <!-- <tr>
                    <th>Company Name</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Last Price</th>
                    <th>% chg</th>
                  </tr> -->

                  <tr class="th">
                    <td><b>Company Name</b><td>
                    <td><b>High</b><td>
                    <td><b>Low</b><td>
                    <td><b>Last Price</b><td>
                    <td><b>% Chg</b><td>
                  </tr>
                

                
                  <?php

                  $string4 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=$id1");
                  $json_a4 = json_decode($string4, true);
                  $selectOptions4 = $json_a4['item'];

                  

                  for($j = 0; $j < sizeof($selectOptions4); $j++){
                  
                    $id2 = $selectOptions4[$j]['id'];

                    $string = file_get_contents("https://priceapi.moneycontrol.com/pricefeed/nse/equitycash/$id2");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['data'];
  
                    $com = $selectOptions['SC_FULLNM'];
                    $hiv = $selectOptions['HP'];
                    $lov = $selectOptions['LP'];
                    $lav = $selectOptions['pricecurrent'];
                    $cha = $selectOptions['pricepercentchange'];
                    
                    ?>
                      <tr>
                        <?php
                        if($cha < 0){
                          ?>
                          <td style="color: black;"><b><?php echo $com; ?></b><td>
                          <td><?php echo $hiv; ?><td>
                          <td><?php echo $lov; ?><td>
                          <td><?php echo $lav; ?><td>
                          <td style="color:#D00931"><?php echo $cha; ?><td>
                          <?php
                        }else if($cha > 0){
                          ?>
                          <td style="color: black;"><b><?php echo $com; ?></b><td>
                          <td><?php echo $hiv; ?><td>
                          <td><?php echo $lov; ?><td>
                          <td><?php echo $lav; ?><td>
                          <td style="color:#0CA02D"><?php echo $cha; ?><td>
                          <?php
                        }
                        ?>
                        
                      </tr>
                    <?php
                  }

                  ?>
                

              </table>
            </div>

          </div>
        </div>
        <br><br>



        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script>
          document.getElementById("a<?php echo $id1; ?>").style.backgroundColor = "#ECF0F1";
          document.getElementById("b<?php echo $id1; ?>").style.color = "#17202A"; 
        </script>

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