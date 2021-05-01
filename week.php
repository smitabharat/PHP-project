<?php
include_once 'dbConnection.php';
$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=e2df2e3b8b4245e08362056a7c4f9382";
set_time_limit(500);

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
              <center><h3>Only Seller</h3></center>
              <hr class="new1">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table indx table-hover ">

                <thead>
                  <tr class="th">
                    <td><b>Company</b></td>
                    <td><b>Days High</b></td>
                    <td><b>Current</b></td>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $string1 = file_get_contents("https://appfeeds.moneycontrol.com/jsonapi/market/marketmap&format=&type=0&ind_id=7");
                  $json_a1 = json_decode($string1, true);
                  $selectOptions1 = $json_a1['item'];
                  
                  foreach($selectOptions1 as $data){
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
              <br><br>

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