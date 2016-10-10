<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




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

    <!-- Navigation -->
        <div id="navbar">   
        </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <div class="col-md-9">

                <div class="thumbnail">
                    <div class="caption-full">
                        <h4>Personal Information</h4>
                        <p> Name: <?= $this->session->userdata('name')?></p>
                        <p> Email:<?= $this->session->userdata('email')?></p>
                        <p> password:******</p>
                        <hr>
                        
                    </div>

                    <div class="ratings">
                    </div>
                </div>

                <div class="well">


                    <hr>

                    <div class="row">
                    <h4>Reviews posted by you: </h4>
                    <hr>
                    <?php foreach($user_reviews as $user_review)
                        {
                    ?>
                            <div class="col-md-12">
                                <span class="pull-right"><a href="/Books/delete_review" class="btn btn-success">Delete Review</a></span>
                                <p> On 
                                    <?php 
                                        $created_at = new DateTime($user_review['created_at']);
                                        $time_zone =  new DateTimeZone('America/Los_Angeles');
                                        $created_at->setTimezone($time_zone);
                                        echo date_format($created_at,'M d 20y') ;
                                    ?>
                                    you posted: <?=$user_review['review']?>
                                </p>
                            </div>
                             <hr>
                    <?php
                        }
                    ?>
                       
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>



    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>
