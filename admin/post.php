<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>
  
  <body>
        <!-- Header -->
        <div class="sub-header">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="./action">Home</a></li>
            </ul>
          </div>

          <!-- <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div> -->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <form role="form" action="./postb" method="POST" enctype="multipart/form-data" style="width: 99%; margin-top: 15px;">
              
              <div class="form-group">
                <label>Please Title Upload Image</label>
                <input type="file" name="fileToUpload" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Blog Title" required>
              </div>

              <div class="form-group">
                <textarea id="l1" name="l1" style="resize: none;" rows="3" cols="10" class="form-control" placeholder="(3000 Charactors) Paragraph 1" required></textarea>  
              </div>

              <div class="form-group">
                <textarea id="l2" name="l2" style="resize: none;" rows="3" cols="10" class="form-control" placeholder="(3000 Charactors) Paragraph Line 2 (Optional)"></textarea>  
              </div>

              <div class="form-group">
                <textarea id="l3" name="l3" style="resize: none;" rows="3" cols="10" class="form-control" placeholder="(3000 Charactors) Paragraph Line 3 (Optional)"></textarea>  
              </div>

              <div class="form-group">
                <textarea id="l4" name="l4" style="resize: none;" rows="3" cols="10" class="form-control" placeholder="(3000 Charactors) Paragraph Line 4 (Optional)"></textarea>  
              </div>

              <div class="form-group">
                <textarea id="l5" name="l5" style="resize: none;" rows="3" cols="10" class="form-control" placeholder="(3000 Charactors) Paragraph Line 5 (Optional)"></textarea>  
              </div>
        
              <div><input type="submit" class="btn btn-primary" value="POST"></div>

              <div> 
              <?php
                    if(isset($_GET['a']))
                    {
                        echo '<script type="text/JavaScript"> alert("Blog Posted !"); </script>' ; 
                    }
              ?>
              </div>
        
            </form>
          </div>
        </div>
      </div>
    </div>
      
  </body>
</html>