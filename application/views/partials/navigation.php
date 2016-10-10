<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">                     
                    <?php if(!empty($this->session->userdata('name')))
                            {
                    ?> 

                        Hello <?=$this->session->userdata('name')?>
                    <?php 
                        }
                    ?>
                 </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="">About</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                </ul>
                <div class="login">
                    <!-- modal style data-toggle="modal" data-target="#myModal" -->
                    <a data-toggle="modal" data-target="#myModal" href="">Login/Register</a>
                    <?php if(!empty($this->session->userdata('name')))
                        {
                    ?>
                            <a href="/Users/user_reviews">Edit Profile</a>
                            <a href="/Books/post_review">Post Review</a>
                            <a href="/Users/logout">LogOut</a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>