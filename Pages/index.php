<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
DefaultHead();
?>
        
        <div id="content">

            <!-- Headline / START -->
            <div class="block headline-divided headline-primary no-margin-bottom">

                <div class="contents">

                    <div class="row">
                        <div class="col-xs-12 col-md-4 info">
                        

                            <div class="page-subheader">
                           
                                <h1>Olympic Tag line here <br/>

                                    <a href="Login.php">Login Link</a><br/>
                                    <a href="Register.php">Register Link</a><br/>
                                    <?php
                                    if (Login_Check())
                                    {echo("
                                        <a href=\"../Controllers/LogoutController.php\">Logout</a>
                                        <div>Welcome, ".$_SESSION["username"]."</div>");
                                    }
                                    ?>

                                    <?php
                                    if (Login_Check())
                                    {
                                        echo "Welcome, ".$_SESSION["username"];
                                    }?>
                               
                            </div>

                            <div class="description logo">
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, 
                                by injected humour, or randomised words which don't look even slightly believable. 
                                If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. 
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.<br><br>
                                Download the <a href="../image/Olympic_byChamplainPlastics_Cat_2019.pdf" title="Olympic Catalog 2018-2019" target="_new"><strong>2018-2019 Olympic Catalog</strong></a>
                                
                            </div>
                            </div>
                        <div class="col-xs-12 col-md-8 image">
                            <img src="../image/Main.jpg" class="image-center img-responsive" alt="Olympic Pool Accessories"/>
                        </div>
                    </div>
                    
                </div>

            </div>
                        <!-- Headline / END -->

           

      <div class="container block md-margin-top">

                <!-- Offers/ START -->
                <div class="block text-center">

                    <div class="title-big">
                        <h1>Products</h1>
                    </div>

                </div><!-- Offers / END -->

                <!-- Shop item / START -->
                <div class="block shop-grid no-margin-bottom">

                    <div class="row">

                        <div class="col-xs-6 col-sm-3 col">

                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/1.jpg" alt="Shop item image"/>
                                        </a>
                                  </div>

                                    <div class="title">
                                        <h3><a href="#">New Products</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/5.jpg" alt="Shop item image"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Backwash Hoses</a></h3>
                                    </div>

                                     

                                </div>
                            </section><!-- Shop item / END -->
                            
                              <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/9.jpg" alt="Lights"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Lights</a></h3>
                                    </div>

                                   

                                </div>
                            </section><!-- Shop item / END -->

                        </div><!-- Col / END -->

                        <div class="col-xs-6 col-sm-3 col">

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/2.jpg" alt="Maintenance"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Maintenance</a></h3>
                                    </div>

                               

                                </div>
                            </section><!-- Shop item / END -->

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/6.jpg" alt="Skimmers/Main Drains"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Skimmers/Main Drains</a></h3>
                                    </div>

                                  

                                </div>
                            </section><!-- Shop item / END -->
                            
                             <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/10.jpg" alt="Cover Reels/Solar Rollers"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Cover Reels/Solar Rollers</a></h3>
                                    </div>

                                  

                                </div>
                            </section><!-- Shop item / END -->

                        </div><!-- Col / END -->

                        <div class="col-xs-6 col-sm-3 col">

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/3.jpg" alt="Vacuum Hoses"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Vacuum Hoses</a></h3>
                                    </div>

                                  

                                </div>
                            </section><!-- Shop item / END -->

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/7.jpg" alt="Plumbing"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Plumbing</a></h3>
                                    </div>

                                  

                                </div>
                            </section><!-- Shop item / END -->
                              <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/11.jpg" alt="Games, Chairs and More"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Games, Chairs and More</a></h3>
                                    </div>

                                 

                                </div>
                            </section><!-- Shop item / END -->

                        </div><!-- Col / END -->

                        <div class="col-xs-6 col-sm-3 col">

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/4.jpg" alt="Accessories"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Accessories</a></h3>
                                    </div>

                              
                                </div>
                            </section><!-- Shop item / END -->

                            <!-- Shop item / START -->
                            <section>
                                <div class="shop-grid-item">

                                    <div class="image">
                                        <a href="#">
                                            <img src="../image/8.jpg" alt="Shop item image"/>
                                        </a>
                                    </div>

                                    <div class="title">
                                        <h3><a href="#">Ladders/Steps</a></h3>
                                    </div>

                                    

                                </div>
                            </section><!-- Shop item / END -->

                        </div><!-- Col / END -->
                        
                        <div class="col-xs-6 col-sm-3 col">

                        </div><!-- Col / END -->

                    </div><!-- Row / END -->

                </div><!-- Shop grid / END -->
                
                 <div class="col-xs-12  sidebar sm-margin-top">

                        <div class="xs-block bg-gray quick-search">

                            <form method="post">

                                <div class="form-group">                                    
                                    <div class="controls">
                                        <input placeholder="Search word" type="text" class="form-control input"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Search</button>
                                </div>

                            </form>

                        </div></div>


            </div><!-- Container / END -->
            
             <!-- Headline / START -->
             <div id="login"> 
            <div class="block headline">

                <div class="container">
                    
                    <div class="contents">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-5">

                                <h2 class="strong upper">Promotions and Pricing</h2>
                              <p class="description">Contact us to receive your login credentials<br>
                              <a href="mailto:#">somebody@champlainplastics.com</a><br>
or Login to see our promotions and price list</p>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-7 text-right">

                                <div class="actions">

                                    <a href="#" class="btn btn-lg btn-primary">
                                        Login
                                    </a>
                                </div>

                            </div>

                        </div>
                        
                    </div>

                </div>

            </div></div><!-- Headline / END -->
            
            
            </div><!-- Container / END -->

        </div><!-- Content / END -->

<?php
DefaultFoot();
?>