

                <div class="row">
                    <?php foreach($recent_reviews as $review)
                        {
                    ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4><a href="/Books/book_reviews/<?=$review['book_id']?>"><?=$review['title']?></a>
                                </h4>
                                <p class="review_p"><a class ="review_a" href=""><?=$review['name']?> says: </a> <?=$review['review']?>
                                <span>
                                Posted on 
                                <?php 
                                    $created_at = new DateTime($review['created_at']);
                                    $time_zone =  new DateTimeZone('America/Los_Angeles');
                                    $created_at->setTimezone($time_zone);
                                    echo date_format($created_at,'M d 20y , g:i A T') ;
                                 ?>
                                 </span>
                                </p>
                            </div>
                            <div class="ratings">

                                <?php
                                    foreach($reviews_count as $count)
                                    {
                                        if($review['book_id']== $count['book_id'])
                                        {
                                ?>
                                  
                                <a href="/Books/view_book/<?=$review['book_id']?>" class="pull-right"> <?= $count['number_of_reviews']?> 
                                    <?php if($count['number_of_reviews']<2)
                                        {
                                    ?>
                                            review </a>
                                    <?php }else
                                            {
                                    ?>
                                            reviews </a>
                                
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                <?php for($i=0; $i<$review['rating']; $i++)
                                    {
                                ?>
                                    <span class="glyphicon glyphicon-star"></span>
                                <?php
                                    }

                                    $count=5-$review['rating'];
                                    for($i=0; $i<$count; $i++)
                                    {
                                ?>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                <?php
                                    }
                                ?>        
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                    <?php if(empty($this->session->userdata('name')))
                        {
                    ?>
                        <h4><a href="#">Would like to post review?</a>
                        </h4>
                        <p>If you like to post review please login or register here.</p>
                        
                        <!-- modal style data-toggle="modal" data-target="#myModal" -->
                        <a data-toggle="modal" data-target="#myModal" class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Login/Register</a>
                    <?php
                        }
                        else
                        {
                    ?>
                            <br><br>
                            <h5><a href="/Books/post_review">Add a book and post review</a></h5>
                    <?php
                        }
                    ?>
                    </div>

                </div>

            
            