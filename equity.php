<?php
include_once 'dbConnection.php';
include_once 'stockaction.php';

$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";

$string = file_get_contents($url1);

?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- custom css -->
        <link href="./custom/ext1.css" rel="stylesheet">
        <link href="./custom/custom.css" rel="stylesheet"> 
        
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
              <center><h3 >MARKET & STOCK ACTION</h3></center>
              <hr class="new1">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="tabmenu">


                  <table class="table table-borderless " id="htb">
                    <thead>
                      <tr>
                        <th class="tab1" id="tab11" colspan="2"><a id="tab1" onclick="fun1();">Indian Indices</a></th>
                        <th class="tab2" id="tab12" colspan="2"><a id="tab2" onclick="fun2();">Global Indices</a></th>
                      </tr>
                    </thead>
                  </table>

                  <table id="ind" class="table table-wrapper-scroll-y my-custom-scrollbar">

                    <thead>
                      <tr>
                        <th>Index</th>
                        <th>Price</th>
                        <th>Change</th>
                        <th>%Chg</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=9");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&ind_id=23");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&ind_id=20");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&ind_id=22");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&ind_id=4");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                    </tbody>    
                  </table>


                  <table id="glb" class="table">
                    <thead>
                      <tr>
                        <th>Index</th>
                        <th>Price</th>
                        <th>Change</th>
                        <th>%Chg</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=us;COMP");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=de;qx");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=fr;CAC");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=gb;FTSE");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>

                      <?php
                      $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=json&ind_id=tw;IXTA");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['indices'];
                      
                      $type = $selectOptions['stkexchg'];
                      $price = $selectOptions['lastprice'];
                      $change = $selectOptions['change'];
                      $percentchange = $selectOptions['percentchange'];
                      
                      if($percentchange < 0){
                          ?>
                          <tr>
                              <td id="indca" style="color:black"><b><?php echo $type; ?><></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#D00931"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }else{
                          ?>
                          <tr>
                              <td id="indca1" style="color:black"><b><?php echo $type; ?></b></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $change; ?></td>
                              <td style="color:#0CA02D"><?php echo $percentchange; ?>%</td>
                          </tr>
                          <?php
                      }
                      ?>




                    </tbody>  
                  </table>


                  <a id="more" href="./indian?id1=9" style="margin-left: 130px;">View More &rarr;</a>
                  <a id="more1" href="./globel" style="margin-left: 130px;">View More &rarr;</a>


                  </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <div class="tabmenu5">
                <table class="table" id="htb3">
                  <thead>
                    <tr>
                      <th class="tabp1fk" id="tabp11fk" colspan="2"><a id="tabp1fk" onclick="">52 Week High</a></th>
                    </tr>
                  </thead>
                </table>

                <table id="indpfk" class="table">

                  <thead>
                    <tr>
                      <th>Company</th>
                      <th>Days High</th>
                      <th>Current</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $string1 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
                    $json_a1 = json_decode($string1, true);
                    $selectOptions1 = $json_a1['item'];
                    
                    foreach(array_slice($selectOptions1, 0, 5) as $data){
                      $id = $data['id'];
                      $string = file_get_contents("https://priceapi.moneycontrol.com/pricefeed/nse/equitycash/$id");
                      $json_a = json_decode($string, true);
                      $selectOptions = $json_a['data'];
                      $comp = $selectOptions['SC_FULLNM'];
                      $h52 = $selectOptions['52H'];
                      $bidp = $selectOptions['BIDP'];
                      ?>
                      <tr>
                        <td style="color:black"><b><?php echo $comp; ?></b></td>
                        <td><?php echo $h52; ?></td>
                        <td><?php echo $bidp; ?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>

                </table>  

                <a id="" href="week" style="margin-left: 100px;">View More &rarr;</a>

              </div>
            </div> 

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="tabmenu4">

                <table class="table" id="htb3">
                  <thead>
                    <tr>
                      <th class="tabp1f" id="tabp11f" colspan="2"><a id="tabp1f" onclick="fun7();">Only Buyers</a></th>
                      <th class="tabp2f" id="tabp12f" colspan="2"><a id="tabp2f" onclick="fun8();">Only Seller</a></th>
                    </tr>
                  </thead>
                </table>

                <table id="indpf" class="table">

                  <thead>
                    <tr>
                      <th>Index</th>
                      <th>Current</th>
                      <th>%Chg</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $q1=mysqli_query($con,"SELECT * FROM gain1 order by cast(gai as DECIMAL(8,2)) DESC")or die('Error223');
                      $result1 = mysqli_num_rows($q1);

                      for($i=1;$i<=5;$i++){
                      $result2 = mysqli_fetch_assoc($q1);
                      $comp = $result2['comp'];
                      $gain = $result2['gai'];
                      $curr = $result2['curr'];
                      ?>
                      <tr>
                        <td style="color:black"><b><?php echo $comp; ?></b></td>
                        <td><?php echo $curr; ?></td>
                        <td style="color:#0CA02D"><?php echo $gain; ?></td>
                      </tr>
                      <?php
                      //echo $comp." | ".$curr." | ".$gain."<br>";
                      }
                      ?>
                  </tbody> 

                </table>

                <table id="glbpf" class="table">

                  <thead>
                    <tr>
                      <th>Index</th>
                      <th>Current</th>
                      <th>%Chg</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $q1=mysqli_query($con,"SELECT * FROM lose1 order by cast(gai as DECIMAL(8,2)) ASC")or die('Error223');
                      $result1 = mysqli_num_rows($q1);

                      for($i=1;$i<=5;$i++){
                      $result2 = mysqli_fetch_assoc($q1);
                      $comp = $result2['comp'];
                      $gain = $result2['gai'];
                      $curr = $result2['curr'];
                      ?>
                      <tr>
                        <td style="color:black"><b><?php echo $comp; ?></b></td>
                        <td><?php echo $curr; ?></td>
                        <td style="color:#D00931"><?php echo $gain; ?></td>
                      </tr>
                      <?php
                      //echo $comp." | ".$curr." | ".$gain."<br>";
                      }
                      ?>
                  </tbody> 

                </table>

                <a id="morepf" href="buy" style="margin-left: 100px;">View More &rarr;</a>
                <a id="morep1f" href="sell" style="margin-left: 100px;">View More &rarr;</a>

              </div>
            </div>


          </div>
        </div>
        <br><br>


        <div class="container">
          <div class="row">
            <div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart2">
                <div class="chart1">
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Nifty 50</a></b></div><br>
                  <center>
                  <div id="chart_div4" style="width: 80%; height: 200px;"></div>
                  <div class = "tt">
                    <?php
                    $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=9");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['indices'];
                    $price = $selectOptions['lastprice'];
                    $time =  $selectOptions['lastupdated'];
                    $change = $selectOptions['change'];
                    $per = $selectOptions['percentchange'];
                    ?>
                    <h1 class="tt1"><b>Price:</b>&nbsp;&nbsp;<?php echo $price; ?><h1>
                    <?php
                    if($per < 0){
                      ?>
                      <h1 class="tt2"><b>change:</b>&nbsp;&nbsp;<label>▼&nbsp;<?php echo $change; ?>&nbsp;(<?php echo $per; ?>%)</label><h1>
                      <?php
                    }
                    elseif($per >= 0){
                      ?>
                      <h1 class="tt3"><b>change:</b>&nbsp;&nbsp;<label>▲&nbsp;<?php echo $change; ?>&nbsp;(<?php echo $per; ?>%)</label><h1>
                      <?php
                    }
                    ?>
                    <h1 class="tt1"><b>As On:</b>&nbsp;&nbsp;<?php echo $time; ?><h1>
                  </div>
                  </center>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart2">
                <div class="chart1">
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Nifty Bank</a></b></div><br>
                  <center>
                  <div id="chart_div5" style="width: 80%; height: 200px;"></div>
                  <div class = "tt">
                    <?php
                    $string = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/indices&format=&ind_id=23");
                    $json_a = json_decode($string, true);
                    $selectOptions = $json_a['indices'];
                    $price = $selectOptions['lastprice'];
                    $time =  $selectOptions['lastupdated'];
                    $change = $selectOptions['change'];
                    $per = $selectOptions['percentchange'];
                    ?>
                    <h1 class="tt1"><b>Price:</b>&nbsp;&nbsp;<?php echo $price; ?><h1>
                    <?php
                    if($per < 0){
                      ?>
                      <h1 class="tt2"><b>change:</b>&nbsp;&nbsp;<label>▼&nbsp;<?php echo $change; ?>&nbsp;(<?php echo $per; ?>%)</label><h1>
                      <?php
                    }
                    elseif($per >= 0){
                      ?>
                      <h1 class="tt3"><b>change:</b>&nbsp;&nbsp;<label>▲&nbsp;<?php echo $change; ?>&nbsp;(<?php echo $per; ?>%)</label><h1>
                      <?php
                    }
                    ?>
                    <h1 class="tt1"><b>As On:</b>&nbsp;&nbsp;<?php echo $time; ?><h1>
                  </div>
                  </center>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart1">
                <div class="chart">
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Price Gainers</a></b></b></div><br>
                  <center>
                  <div id="chart_div" style="width: 80%; height: 250px;"></div>
                  </center>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart1">
                <div class="chart">
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Price Losers</a></b></div><br>
                  <center>
                  <div id="chart_div1" style="width: 80%; height: 250px;"></div>
                  </center>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart1">
                <div class="chart">
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Long Buildup</a></b></b></div><br>
                  <center>
                  <div id="chart_div2" style="width: 80%; height: 250px;"></div>
                  </center>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="chart1">
                <div class="chart" >
                  <div class="top1" style="text-shadow:5px 5px 5px orangered; box-shadow:5px 5px 5px orangered; border-radius: 12px;"><b><a href = "#">Short Covering</a></b></div><br>
                  <center>
                  <div id="chart_div3" style="width: 80%; height: 250px;"></div>
                  </center>
                </div>
              </div>
              
            </div>
          </div>
        </div>


        <br><br><br>



        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Element", "Price Change", { role: "style" } ],
                <?php
                $string = file_get_contents("https://options.icharts.in/opt/hcharts/stx8req/php/getDataForFuturesOptDashboardHome.php");
                $json_a = json_decode($string, true);

                if( empty($json_a[0][1]) && empty($json_a[1][1]) ){
                  for( $i=0; $i<1; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F1C40F"],
                    <?php
                  }
                }

                elseif( empty($json_a[0][2]) && empty($json_a[1][2]) ){
                  for( $i=0; $i<2; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F1C40F"],
                    <?php
                  }
                }

                elseif( empty($json_a[0][3]) && empty($json_a[1][3]) ){
                  for( $i=0; $i<3; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F1C40F"],
                    <?php
                  }
                }

                elseif( empty($json_a[0][4]) && empty($json_a[1][4]) ){  
                  for( $i=0; $i<4; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F1C40F"],
                    <?php
                  }
                }
                
                else{
                  for( $i=0; $i<5; $i++ ){
                    $name = $json_a[0][$i];
                    $value = $json_a[1][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F1C40F"],
                    <?php
                  }
                }
                ?>
              ]);
        
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
                               { calc: "stringify",
                                 sourceColumn: 1,
                                 type: "string",
                                 role: "annotation" },
                               2]);
        
              var options = {
                title: "",
                backgroundColor: '#F7F9F9',
                bar: {groupWidth: "80%"},
                legend: { position: "none" },
              };
              var chart = new google.visualization.BarChart(document.getElementById("chart_div"));
              chart.draw(view, options);
          }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Element", "Price Change", { role: "style" } ],
                <?php
                $string = file_get_contents("https://options.icharts.in/opt/hcharts/stx8req/php/getDataForFuturesOptDashboardHome.php");
                $json_a = json_decode($string, true);

                if( empty($json_a[2][1]) && empty($json_a[3][1]) ){
                  for( $i=0; $i<1; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31E14"],
                    <?php
                  }
                }

                elseif( empty($json_a[2][2]) && empty($json_a[3][2]) ){
                  for( $i=0; $i<2; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31E14"],
                    <?php
                  }
                }

                elseif( empty($json_a[2][3]) && empty($json_a[3][3]) ){
                  for( $i=0; $i<3; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31E14"],
                    <?php
                  }
                }

                elseif( empty($json_a[2][4]) && empty($json_a[3][4]) ){  
                  for( $i=0; $i<4; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31E14"],
                    <?php
                  }
                }
                
                else{
                  for( $i=0; $i<5; $i++ ){
                    $name = $json_a[2][$i];
                    $value = $json_a[3][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31E14"],
                    <?php
                  }
                }

                ?>
              ]);
        
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
                               { calc: "stringify",
                                 sourceColumn: 1,
                                 type: "string",
                                 role: "annotation" },
                               2]);
        
              var options = {
                title: "",
                backgroundColor: '#F7F9F9',
                bar: {groupWidth: "80%"},
                legend: { position: "none" },
              };
              var chart = new google.visualization.BarChart(document.getElementById("chart_div1"));
              chart.draw(view, options);
          }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Element", "Price Change", { role: "style" } ],
                <?php
                $string = file_get_contents("https://options.icharts.in/opt/hcharts/stx8req/php/getDataForFuturesOptDashboardHome.php");
                $json_a = json_decode($string, true);

                if( empty($json_a[4][1]) && empty($json_a[5][1]) ){
                  for( $i=0; $i<1; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31DA2"],
                    <?php
                  }
                }

                elseif( empty($json_a[4][2]) && empty($json_a[5][2]) ){
                  for( $i=0; $i<2; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31DA2"],
                    <?php
                  }
                }

                elseif( empty($json_a[4][3]) && empty($json_a[5][3]) ){
                  for( $i=0; $i<3; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31DA2"],
                    <?php
                  }
                }

                elseif( empty($json_a[4][4]) && empty($json_a[5][4]) ){  
                  for( $i=0; $i<4; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31DA2"],
                    <?php
                  }
                }
                
                else{
                  for( $i=0; $i<5; $i++ ){
                    $name = $json_a[4][$i];
                    $value = $json_a[5][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#F31DA2"],
                    <?php
                  }
                }

                ?>
              ]);
        
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
                               { calc: "stringify",
                                 sourceColumn: 1,
                                 type: "string",
                                 role: "annotation" },
                               2]);
        
              var options = {
                title: "",
                backgroundColor: '#F7F9F9',
                bar: {groupWidth: "80%"},
                legend: { position: "none" },
              };
              var chart = new google.visualization.BarChart(document.getElementById("chart_div2"));
              chart.draw(view, options);
          }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Element", "Price Change", { role: "style" } ],
                <?php
                $string = file_get_contents("https://options.icharts.in/opt/hcharts/stx8req/php/getDataForFuturesOptDashboardHome.php");
                $json_a = json_decode($string, true);

                if( empty($json_a[6][1]) && empty($json_a[7][1]) ){
                  for( $i=0; $i<1; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#D2F11F"],
                    <?php
                  }
                }

                elseif( empty($json_a[6][2]) && empty($json_a[7][2]) ){
                  for( $i=0; $i<2; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#D2F11F"],
                    <?php
                  }
                }

                elseif( empty($json_a[6][3]) && empty($json_a[7][3]) ){
                  for( $i=0; $i<3; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#D2F11F"],
                    <?php
                  }
                }

                elseif( empty($json_a[6][4]) && empty($json_a[7][4]) ){  
                  for( $i=0; $i<4; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#D2F11F"],
                    <?php
                  }
                }
                
                else{
                  for( $i=0; $i<5; $i++ ){
                    $name = $json_a[6][$i];
                    $value = $json_a[7][$i];
                    ?>
                    [<?php echo "'$name'"; ?>, <?php echo $value; ?>, "#D2F11F"],
                    <?php
                  }
                }

                ?>
              ]);
        
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
                               { calc: "stringify",
                                 sourceColumn: 1,
                                 type: "string",
                                 role: "annotation" },
                               2]);
        
              var options = {
                title: "",
                backgroundColor: '#F7F9F9',
                bar: {groupWidth: "80%"},
                legend: { position: "none" },
              };
              var chart = new google.visualization.BarChart(document.getElementById("chart_div3"));
              chart.draw(view, options);
          }
        </script>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['time', 'Value'],

              <?php
              $stringg = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/graph&format=&ind_id=9&range=1d&type=area");
              $json_ag = json_decode($stringg, true);
              $selectOptionsg = $json_ag['graph']['values'];
                        
              foreach($selectOptionsg as $datag => $keyg){
                $time = $keyg['_time'];
                ?>
                [<?php echo "'$time'"; ?>,  <?php echo $keyg['_value']; ?>],
                <?php
              }
              ?>
            ]);

            var options = {
              title: '',
              backgroundColor: '#F7F9F9',
              hAxis: {title: 'Time',  titleTextStyle: {color: '#73F314 '}},
              vAxis: {title: 'Value',  minValue: 14800}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div4'));
            chart.draw(data, options);
          }
        </script>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['time', 'Value'],

              <?php
              $stringg = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/graph&format=&ind_id=23&range=1d&type=area");
              $json_ag = json_decode($stringg, true);
              $selectOptionsg = $json_ag['graph']['values'];
                        
              foreach($selectOptionsg as $datag => $keyg){
                $time = $keyg['_time'];
                ?>
                [<?php echo "'$time'"; ?>,  <?php echo $keyg['_value']; ?>],
                <?php
              }
              ?>
            ]);

            var options = {
              title: '',
              hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
              vAxis: {title: 'Value',  minValue: 34900}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div5'));
            chart.draw(data, options);
          }
        </script>

        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <script>
          function fun1(){
            document.getElementById("tab1").style.color = "#D35400";
            document.getElementById("tab2").style.color = "#424949";
            document.getElementById("tab11").style.borderBottom = "solid #1B2631";
            document.getElementById("tab12").style.borderBottom = "solid #D0D3D4";
            document.getElementById("ind").style.display = "block";
            document.getElementById("glb").style.display = "none";
            document.getElementById("more").style.display = "block";
            document.getElementById("more1").style.display = "none";
          }

          function fun2(){
            document.getElementById("tab1").style.color = "#424949";
            document.getElementById("tab2").style.color = "#D35400";
            document.getElementById("tab12").style.borderBottom = "solid #1B2631"; 
            document.getElementById("tab11").style.borderBottom = "solid #D0D3D4";
            document.getElementById("ind").style.display = "none";
            document.getElementById("glb").style.display = "block";
            document.getElementById("more1").style.display = "block";
            document.getElementById("more").style.display = "none";
          }

          function fun3(){
            document.getElementById("sens").style.borderBottom = "solid #1B2631";
            document.getElementById("sens1").style.borderBottom = "solid #D0D3D4";
            document.getElementById("sens2").style.color = "#D35400";
            document.getElementById("sens3").style.color = "#424949";
            document.getElementById("chart_div1").style.display = "block";
            document.getElementById("chart_div").style.display = "none";
          }

          function fun4(){
            document.getElementById("sens1").style.borderBottom = "solid #1B2631";
            document.getElementById("sens").style.borderBottom = "solid #D0D3D4";
            document.getElementById("sens3").style.color = "#D35400";
            document.getElementById("sens2").style.color = "#424949";
            document.getElementById("chart_div").style.display = "block";
            document.getElementById("chart_div1").style.display = "none";
          }

          function fun5(){
            document.getElementById("tabp1").style.color = "#D35400";
            document.getElementById("tabp2").style.color = "#424949";
            document.getElementById("tabp11").style.borderBottom = "solid #1B2631";
            document.getElementById("tabp12").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indp").style.display = "block";
            document.getElementById("glbp").style.display = "none";
            document.getElementById("morep").style.display = "block";
            document.getElementById("morep1").style.display = "none";
          }

          function fun6(){
            document.getElementById("tabp1").style.color = "#424949";
            document.getElementById("tabp2").style.color = "#D35400";
            document.getElementById("tabp12").style.borderBottom = "solid #1B2631"; 
            document.getElementById("tabp11").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indp").style.display = "none";
            document.getElementById("glbp").style.display = "block";
            document.getElementById("morep1").style.display = "block";
            document.getElementById("morep").style.display = "none";
          }

          function fun7(){
            document.getElementById("tabp1f").style.color = "#D35400";
            document.getElementById("tabp2f").style.color = "#424949";
            document.getElementById("tabp11f").style.borderBottom = "solid #1B2631";
            document.getElementById("tabp12f").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indpf").style.display = "block";
            document.getElementById("glbpf").style.display = "none";
            document.getElementById("morepf").style.display = "block";
            document.getElementById("morep1f").style.display = "none";
          }

          function fun8(){
            document.getElementById("tabp1f").style.color = "#424949";
            document.getElementById("tabp2f").style.color = "#D35400";
            document.getElementById("tabp12f").style.borderBottom = "solid #1B2631"; 
            document.getElementById("tabp11f").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indpf").style.display = "none";
            document.getElementById("glbpf").style.display = "block";
            document.getElementById("morep1f").style.display = "block";
            document.getElementById("morepf").style.display = "none";
          }

          function fun9(){
            document.getElementById("tabp1fu").style.color = "#D35400";
            document.getElementById("tabp2fu").style.color = "#424949";
            document.getElementById("tabp11fu").style.borderBottom = "solid #1B2631";
            document.getElementById("tabp12fu").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indpfu").style.display = "block";
            document.getElementById("glbpfu").style.display = "none";
            document.getElementById("morepfu").style.display = "block";
            document.getElementById("morep1fu").style.display = "none";
          }

          function fun10(){
            document.getElementById("tabp1fu").style.color = "#424949";
            document.getElementById("tabp2fu").style.color = "#D35400";
            document.getElementById("tabp12fu").style.borderBottom = "solid #1B2631"; 
            document.getElementById("tabp11fu").style.borderBottom = "solid #D0D3D4";
            document.getElementById("indpfu").style.display = "none";
            document.getElementById("glbpfu").style.display = "block";
            document.getElementById("morep1fu").style.display = "block";
            document.getElementById("morepfu").style.display = "none";
          }

        </script>

        <script>
          // document.getElementById("chart_div2").style.display = "none";
          document.getElementById("tabp11").style.borderBottom = "solid #1B2631";
          document.getElementById("tabp11f").style.borderBottom = "solid #1B2631";
          document.getElementById("tabp11fk").style.borderBottom = "solid #1B2631";
          document.getElementById("tabp11fu").style.borderBottom = "solid #1B2631";
        </script>

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