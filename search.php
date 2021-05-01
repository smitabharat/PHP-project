<?php
include_once 'dbConnection.php';
$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";

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
            <div id="suggesstion-box"></div><br>


            <?php
            if(@$_GET['statelist']){
              ?>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <?php
              $name = $_GET['statelist'];
              $q=mysqli_query($con,"SELECT * FROM `all` WHERE comp='$name' ")or die("Could not connect".mysqli_error($con));
              $result = mysqli_num_rows($q);

              if($result == 0){  
                  echo "<h1>Not Found</h1>";                
              }else{

                            for($i=1;$i<=$result;$i++){
                                $result1 = mysqli_fetch_assoc($q);
                                $id = $result1['id'];
                            }
                            $string = file_get_contents("https://priceapi.moneycontrol.com/pricefeed/nse/equitycash/$id");
                            $json_a = json_decode($string, true);
                            $selectOptions = $json_a['data'];
                            $comp = $selectOptions['SC_FULLNM'];
                            $sect = $selectOptions['SC_SUBSEC'];
                            $price = $selectOptions['BIDP'];
                            $change = $selectOptions['pricechange'];
                            $per = $selectOptions['pricepercentchange'];
                            $date = $selectOptions['lastupd'];
                            $open = $selectOptions['OPN'];
                            $pc = $selectOptions['priceprevclose'];
                            $uc = $selectOptions['upper_circuit_limit'];
                            $lc = $selectOptions['lower_circuit_limit'];
                            $vl = $selectOptions['VOL'];
                            $avg = $selectOptions['AVGP'];
                            $mcp = $selectOptions['MKTCAP'];
                            $av20d = $selectOptions['DVolAvg20'];
                            $a20d = $selectOptions['AvgVolQtyDel_20day'];
                            $fv = $selectOptions['FV'];
                            $pe = $selectOptions['IND_PE'];
                            $bv = $selectOptions['BVCONS'];
                            $bv = $selectOptions['BVCONS'];
                            $pb = $selectOptions['PBCONS'];


                            if($price == 0.00){
                                $price = $selectOptions['OFFERP'];
                            }else{
                                $price = $selectOptions['BIDP'];
                            }
                            ?>
                                <hr class="l1">
                                <div class="title">
                                <h2 class="t1"><?php echo $comp; ?></h2>
                                <h4 class="t2"><b>Sector:&nbsp;&nbsp;</b><?php echo $sect; ?></h4>
                                </div>
                                <hr class="l2">
                                <div class="title1">
                                <h2 class="t3"><?php echo "".$price; ?></h2>
                                <?php
                                if($per >= 0){
                                    ?>
                                    <h4 class="t4">▲&nbsp;&nbsp;<?php echo "".$change."(".$per."%)"; ?></h4>
                                    <?php
                                }else{
                                    ?>
                                    <h4 class="t5">▼&nbsp;&nbsp;<?php echo "".$change."(".$per."%)"; ?></h4>
                                    <?php
                                }
                                ?>
                                <h4 class="t2"><b>As on:&nbsp;&nbsp;</b><?php echo $date; ?></h4>
                                </div>
                                <hr class="l3">

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        
                                        <table class="table">
                                        <tbody>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Open</th><th style="font-size: 16px;"><?php echo "".$open; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Previous Close</th><th style="font-size: 16px;"><?php echo "".$pc; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">UC Limit</th><th style="font-size: 16px;"><?php echo "".$uc; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">LC Limit</th><th style="font-size: 16px;"><?php echo "".$lc; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Volume</th><th style="font-size: 16px;"><?php echo "".$vl; ?></th></tr>
                                        </tbody>                    
                                        </table>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <table class="table">
                                        <tbody>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">VWAP</th><th style="font-size: 16px;"><?php echo "".$avg; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Mkt Cap (Rs. Cr.)</th><th style="font-size: 16px;"><?php echo "".$mcp; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">20D Avg Volume</th><th style="font-size: 16px;"><?php echo "".$av20d; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">20D Avg Delivery</th><th style="font-size: 16px;"><?php echo "".$a20d; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Face Value</th><th style="font-size: 16px;"><?php echo "".$fv; ?></th></tr>
                                        </tbody>                    
                                        </table>

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                                        <table class="table">
                                        <tbody>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Sector PE</th><th style="font-size: 16px;"><?php echo "".$pe; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">Book Value Per Share</th><th style="font-size: 16px;"><?php echo "".$bv; ?></th></tr>
                                            <tr><th style="color:#95A5A6;font-size: 16px;">P/B</th><th style="font-size: 16px;"><?php echo "".$pb; ?></th></tr>
                                        </tbody>                    
                                        </table>

                                    </div>
                                    </div>
                                </div>
                                <?php
              }
              
            }else{
              echo "Access Denied !";
            }
            ?>

          </div>
        </div><br><br><br>




        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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