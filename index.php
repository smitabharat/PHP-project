<?php

// ApiKey: 38b4801fd7ca4079bd6276e546eb054b
// ApiKey: 8a8f65962bac4dc896a733a34615fe94
// ApiKey: e2df2e3b8b4245e08362056a7c4f9382
// ApiKey: 8bdf620efed74e0e8d074bc74921239a
// ApiKey: 03ff5ea3b692463594c57f2d26e0b46a-most trending news
// ApiKey: 03ff5ea3b692463594c57f2d26e0b46a-most shared
// ApiKey: 03ff5ea3b692463594c57f2d26e0b46a-Business-India
// ApiKey: 03ff5ea3b692463594c57f2d26e0b46a-Business-International
include_once 'dbConnection.php';

$url1 = "http://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=8bdf620efed74e0e8d074bc74921239a";
$url2 = "http://newsapi.org/v2/top-headlines?country=in&category=technology&apiKey=8bdf620efed74e0e8d074bc74921239a";
$url4 = "http://newsapi.org/v2/top-headlines?country=in&category=health&apiKey=8bdf620efed74e0e8d074bc74921239a";
$url5 = "http://newsapi.org/v2/top-headlines?country=in&category=science&apiKey=8bdf620efed74e0e8d074bc74921239a";
$url6 = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey=03ff5ea3b692463594c57f2d26e0b46a";
/* $url7 = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=03ff5ea3b692463594c57f2d26e0b46a";
$url8 = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=03ff5ea3b692463594c57f2d26e0b46a";
$url9 = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=03ff5ea3b692463594c57f2d26e0b46a";
$url10 = "https://apidojo-yahoo-finance-v1.p.rapidapi.com/auto-complete?q=tesla&region=US";
 */


$string = file_get_contents($url1);
$string1 = file_get_contents($url2);
$string3 = file_get_contents($url4);
$string4 = file_get_contents($url5);
$string5 = file_get_contents($url6);
/* $string6 = file_get_contents($url7);
$string7 = file_get_contents($url8);
$string8 = file_get_contents($url9); */

/*
$json_a = json_decode($string, true);
$selectOptions = $json_a['articles'];

for($i = 0; $i < 1; $i++){
    $title = $selectOptions[$i]['title'];
    $imgurl = $selectOptions[$i]['urlToImage'];
    $url = $selectOptions[$i]['url'];
    $date = $selectOptions[$i]['publishedAt'];
    $description = $selectOptions[$i]['description'];
    $author = $selectOptions[$i]['source']['name'];
}*/

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

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- custom css -->
        <link href="./custom/custom.css" rel="stylesheet">
        <link href="./custom/extb.css" rel="stylesheet">


        <title>FutureLiv</title>

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
                <li class="active1"><a href="./">Home</a></li>
                <li><a href="./news?url=<?php echo "".$url1; ?>">News</a></li>
                <li><a href="./blog">blogs</a></li>

                <li class="nav-item dropdown">

                  <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#">Equity</a>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item active" href="./Graph.html" style="color: #17202A;"> Graph</a></li>
                    <li><a class="dropdown-item active" href="./equity" style="color: #17202A;"> Equity</a></li>
                  </ul>

                </li>


              </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu">
                    <div class="row">

                        <!-- -------------------------------------------------- -->
                        <!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <lable class="news1"><b>Latest News</b></lable>
                            <hr class="news">
                        </div> -->

                        <!-- -------------------------------------------------- -->
                        <?php
                        $json_a = json_decode($string, true);
                        $selectOptions = $json_a['articles'];
                        
                        for($i = 0; $i < 1; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];

                            ?>
                            <!-- -------------------------------------------------- -->
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 headline">
                                <a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><img src="<?php echo "".$imgurl; ?>"></a>
                                <a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><h3><?php echo "".$title; ?></h3></a>
                                <label><h6><span class="text2"><b>By</b></span> <?php echo "".$author; ?>&nbsp;,&nbsp;<span class="text2"><b><?php echo "".$date; ?></b></h6></label>
                                <p><?php echo "".$description; ?></p>
                            </div>
                            <!-- -------------------------------------------------- -->
                            <?php

                        }
                        
                        
                        ?>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 subimg">
                            <lable class="blog1"><b>Top Headlines</b></lable>
                            <hr class="blog">
                            <ul>
                            <?php
                            $json_a = json_decode($string, true);
                            $selectOptions = $json_a['articles'];
                            
                            for($i = 1; $i < 5; $i++){
                                $title = $selectOptions[$i]['title'];
                                $imgurl = $selectOptions[$i]['urlToImage'];
                                $url = $selectOptions[$i]['url'];
                                $date = $selectOptions[$i]['publishedAt'];
                                $description = $selectOptions[$i]['description'];
                                $author = $selectOptions[$i]['source']['name'];
                                ?>
                                <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><?php echo $title; ?></a></li>
                                <?php
                            }
                            ?>
                            <ul>
                            <center><button class="button"><a href="./news?url=<?php echo "".$url1; ?>">Read more</a></button></center>
                        </div>

                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 adrespon">
                            <lable class="blog1"><b>Blogs</b></lable>
                            <hr class="blog">
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 respon">
                            <lable class="blog1"><b>Blogs</b></lable>
                            <hr class="blog">
                        </div>

                        
                            <?php

                            $q = mysqli_query($con,"SELECT * FROM `upload` ");
                            
                            if($q == true){
                                
                                $row = mysqli_num_rows($q);
                                                              
                                    if($row > 4){
                                        ?>
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 subimg">
                                        <?php
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
                                                <figure>
                                                    <span><a href="./detail?title=<?php echo "".$title ?>"><img src="./admin/image/<?php echo "".$fname ?>" ></a></span>
                                                    <figcaption>
                                                    <h4><a href="./detail?title=<?php echo "".$title ?>"><?php echo "".$title ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label>Admin</h4>
                                                    </figcaption>
                                                </figure>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <center><button class="button"><a href="./blog">Read more</a></button></center>
                                        <?php
                                    }
                                    else if($row == 0){
                                        echo "<center><h4>No Blog</h4></center>";
                                    }else{
                                        ?>
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 subimg">
                                        <?php
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
                                                <figure>
                                                    <span><a href="./detail?title=<?php echo "".$title ?>"><img src="./admin/image/<?php echo "".$fname ?>" ></a></span>
                                                    <figcaption>
                                                    <h4><a href="./detail?title=<?php echo "".$title ?>"><?php echo "".$title ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label>Admin</h4>
                                                    </figcaption>
                                                </figure>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <?php
                                    }
                                 
                                
                            }
                            else{
                                echo "  ";
                            }
                            

                            ?>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hed">
                    <lable class="blog1"><b>News</b></lable>
                    <hr class="blog">

                    <div>

                        <label>Business</label>
                        <br>
                        <br>
                        <ul>
                        <?php
                        $json_a = json_decode($string, true);
                        $selectOptions = $json_a['articles'];
                        
                        for($i = 5; $i < 13; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><?php echo $title; ?></a></li>
                            
                            <?php
                        }
                        ?>
                        <ul>
                        <center><button class="button"><a href="./news?url=<?php echo "".$url1; ?>">Read more</a></button></center>

                    </div>

                    <br>

                    <div>

                        <label>Technolodgy</label>
                        <br>
                        <br>
                        <ul>
                        <?php
                        $json_a = json_decode($string1, true);
                        $selectOptions = $json_a['articles'];
                        
                        for($i = 0; $i < 7; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url2; ?>"><?php echo $title; ?></a></li>
                            <?php
                        }
                        ?>
                        <ul>
                        <center><button class="button"><a href="./news?url=<?php echo "".$url2; ?>">Read more</a></button></center>

                    </div>

                    <div>
                        <label>Health</label>
                        <br>
                        <br>
                        <ul>
                        <?php
                        $json_a = json_decode($string3, true);
                        $selectOptions = $json_a['articles'];

                        for($i = 0; $i < 7; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url4; ?>"><?php echo $title; ?></a></li>
                            <?php
                        }
                        ?>
                        <ul>
                        <center><button class="button"><a href="./news?url=<?php echo "".$url4; ?>">Read more</a></button></center>
                    </div>

                   
                    <div>
                        <label>Science</label>
                        <br>
                        <br>
                        <ul>
                        <?php
                        $json_a = json_decode($string4, true);
                        $selectOptions = $json_a['articles'];

                        for($i = 0; $i < 7; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <li><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url5; ?>"><?php echo $title; ?></a></li>
                            <?php
                        }
                        ?>
                        <ul>
                        <center><button class="button"><a href="./news?url=<?php echo "".$url5; ?>">Read more</a></button></center>
                    </div>

                </div>








                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 subimg">
                    <lable class="blog1"><b>More topics</b></lable>
                    <hr class="blog">

                    <?php
                        $json_a = json_decode($string1, true);
                        $selectOptions = $json_a['articles'];
                        for($i = 10; $i < 13; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <figure>
                                <span><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url2; ?>"><img src="<?php echo "".$imgurl; ?>" ></a></span>
                                <figcaption>
                                <h4><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url2; ?>"><?php echo "".$title; ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label><?php echo "".$author; ?></h4>
                                </figcaption>
                            </figure>
                            
                            <?php
                        }

                        $json_a = json_decode($string, true);
                        $selectOptions = $json_a['articles'];
                        for($i = 6; $i < 8; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <figure>
                                <span><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><img src="<?php echo "".$imgurl; ?>" ></a></span>
                                <figcaption>
                                <h4><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url1; ?>"><?php echo "".$title; ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label><?php echo "".$author; ?></h4>
                                </figcaption>
                            </figure>
                            
                            <?php
                        }

                        $json_a = json_decode($string3, true);
                        $selectOptions = $json_a['articles'];
                        for($i = 10; $i < 13; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <figure>
                                <span><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url4; ?>"><img src="<?php echo "".$imgurl; ?>" ></a></span>
                                <figcaption>
                                <h4><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url4; ?>"><?php echo "".$title; ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label><?php echo "".$author; ?></h4>
                                </figcaption>
                            </figure>
                            
                            <?php
                        }


                        $json_a = json_decode($string4, true);
                        $selectOptions = $json_a['articles'];
                        for($i = 10; $i < 13; $i++){
                            $title = $selectOptions[$i]['title'];
                            $imgurl = $selectOptions[$i]['urlToImage'];
                            $url = $selectOptions[$i]['url'];
                            $date = $selectOptions[$i]['publishedAt'];
                            $description = $selectOptions[$i]['description'];
                            $author = $selectOptions[$i]['source']['name'];
                            ?>
                            <figure>
                                <span><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url5; ?>"><img src="<?php echo "".$imgurl; ?>" ></a></span>
                                <figcaption>
                                <h4><a href="./info?serial=<?php echo "".$i; ?>&url=<?php echo "".$url5; ?>"><?php echo "".$title; ?></a><br><br><label class="text1"><b>By</b>&nbsp;</label><?php echo "".$author; ?></h4>
                                </figcaption>
                            </figure>
                            
                            <?php
                        }


                    ?>

                </div>

            </div>
        </div>

        <br><br><br>

          
        <div class="footer">
            <p>Copyright &#169; 2020 FutureLiv <b>Design By</b> Tablab Technolodgy</p>
        </div>
     


        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>