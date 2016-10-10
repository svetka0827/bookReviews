<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Reviews</title>


    <!-- Modal links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Modal links ends -->


    <link rel="stylesheet" type="text/css" href="/assets/styles.css">


    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/shop-homepage.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap CSS ends -->


    <!-- links for login / reg -->
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/animate-custom.css" />
    <!-- links for login / reg ends-->



    <!-- jquery links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- jquery links ends -->

    <!-- form styles -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- form styles ends-->

    <script>

      $(document).ready(function()
        {
            $.get('/Navigation/top_nav',function(res)
            {
                $('#navbar').html(res);
            });

      });
    </script>

</head>

<body>
    <div id="navbar">
        
    </div>

    <div class="container">

      <p><?php echo $this->session->flashdata('success_msg');?></p>
      <p><?php echo $this->session->flashdata('error_msg');?></p>


      <h2>Add Review for : Book title</h2>
      <h2>By Author Name</h2>
      <form class="form-horizontal" method="post" action="/Books/add_review" enctype="multipart/form-data">


        <div class="form-group">
          <label class="control-label col-sm-2" >Review:</label>
          <div class="col-sm-10">
              <textarea name="review" class="form-control" rows="5" id="comment"></textarea>
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-sm-2" for="rating">Rating:</label>
          <div class="col-sm-10">
                <select name="rating" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
          </div>
        </div>



        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>


      </form>
    </div>


</body>
</html>