<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .serh tr{
      width: 80%;
    }
    .serh td:hover{
        color: #27AE60;
        background: #E5E7E9;
    }
    .serh td{
        background: #CACFD2;
        color: #212F3C;
        cursor: pointer;
        text-align: center;
    }
</style>
</head>

<body>
      <div class="container">
        <div class="row">

          <!-- <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          </div> -->

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?php
            include_once 'dbConnection.php';
            error_reporting(0);

            if(!empty($_POST['keyword']))
            {
                
                $aKeyword = explode(" ", $_POST['keyword']);
                $query ="SELECT * FROM `all` WHERE comp like '%" . $aKeyword[0] . "%'";
                
                for($i = 1; $i < count($aKeyword); $i++) 
                {
                    if(!empty($aKeyword[$i])) 
                    {
                      $query .= " OR field1 like '%" . $aKeyword[$i] . "%'";
                    }
                }

                $result = $con->query($query);
                
                ?>
                
                <?php
                if(mysqli_num_rows($result) > 0) 
                {
                  //$alert='<ul id="state-list">';

                  $alert="<table class='table serh'>";

                  While($row = $result->fetch_assoc()) 
                  {   						  
                    $name = $row['comp'];

                    //$alert.="<lable style='color: red; font-weight: bold;cursor: pointer;'onClick='selectState(\"$name\")'>$name</lable><br>";

                    $alert.="<tbody>
                              <tr>
                                <td style='' onClick='selectState(\"$name\")'>$name</td>
                              </tr>
                            </tbody>";
                  }

                  //$alert.="</ul>";

                  $alert.="</table><br>";
                  echo $alert;
                }
                else 
                {}
            }
            else
            {
                echo "";
            }


            ?>
          </div>

          <!-- <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          </div> -->

        </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>