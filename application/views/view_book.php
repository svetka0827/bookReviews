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
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4><?= $book_info['title']?></h4>
                        <p> by <?= $book_info['first_name'] ,$book_info['last_name']  ?></p>
                        
                    </div>

                    <div class="ratings">
                        <p class="pull-right"><?= $book_info['reviews_count']?> reviews</p>
                        <p>

                            <?php for($i=0; $i<$rating_average['average']; $i++)
                                {
                            ?>                      
                            <span class="glyphicon glyphicon-star"></span>
                            <?php
                                }
                                    $count=5-$rating_average['average'];
                                    for($i=0; $i<$count; $i++)
                                    {
                                ?>

                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php
                                }
                            ?> 
                            <?=$rating_average['average']?> stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a href="/Books/existing_book_review" class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <?php foreach($book_reviews as $book_review)
                        {
                    ?>
                    <div class="row">

                            <div class="col-md-12">
                                <?php for($i=0; $i<$book_review['rating']; $i++)
                                    {
                                ?>
                                    <span class="glyphicon glyphicon-star"></span>
                                <?php
                                    }
       
                                    $count=5-$book_review['rating'];
                                    for($i=0; $i<$count; $i++)
                                    {
                                ?>
                                    <span class="glyphicon glyphicon-star-empty"></span>

                                <?php
                                    }
                                ?>

                                <?= $book_review['name']?>

                                <span class="pull-right">10 days ago</span>
                                <p><?=$book_review['review']?></p>
                            </div>
                        <hr>
                    </div>
                    <?php
                        }
                    ?>




                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>



      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <?php     if($this->session->flashdata("registration_errors"))
            {
                echo $this->session->flashdata("registration_errors");
            }

            if($this->session->flashdata("login_errors"))
            {
                echo $this->session->flashdata("login_errors");
            }

            ?>
                <!-- LOGIN REG CODE STARTS -->
                <header>
                    <h1>Login and Registration Form </h1>
                </header>
                <section>               
                    <div id="container_demo" >
                        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                        <a class="hiddenanchor" id="toregister"></a>
                        <a class="hiddenanchor" id="tologin"></a>
                        <div id="wrapper">
                            <div id="login" class="animate form">
                                <form  action="/Users/login" autocomplete="on" method ="post"> 
                                    <h1>Log in</h1> 
                                    <p> 
                                        <label for="email" class="uname" data-icon="e" > Your email </label>
                                        <input id="username" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
                                    </p>
                                    <p> 
                                        <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                        <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                    </p>

                                    <p class="login button"> 
                                        <input type="submit" value="Login" /> 
                                    </p>
                                    <p class="change_link">
                                        Not a member yet ?
                                        <a href="#toregister" class="to_register">Join us</a>
                                    </p>
                                </form>
                            </div>

                            <div id="register" class="animate form">
                                <form  action="Users/register" autocomplete="on" method="post"> 
                                    <h1> Sign up </h1> 
                                    <p> 
                                        <label for="usernamesignup" class="uname" data-icon="u">Your name</label>
                                        <input id="usernamesignup" name="name" required="required" type="text" placeholder="name" />
                                    </p>
                                    <p> 
                                        <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                        <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                    </p>
                                    <p> 
                                        <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                        <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                    </p>
                                    <p> 
                                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                        <input id="passwordsignup_confirm" name="confirm_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                    </p>
                                    <p class="signin button"> 
                                        <input type="submit" value="Sign up"/> 
                                    </p>
                                    <p class="change_link">  
                                        Already a member ?
                                        <a href="#tologin" class="to_register"> Go and log in </a>
                                    </p>
                                </form>
                            </div>
                            
                        </div>
                    </div>  
                </section>
        <!-- LOGIN REG CODE ENDS -->





            </div> 
            <!-- MODAL BODY ENDS -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal ends -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>
