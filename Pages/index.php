<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
session_start();
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

                <!--Categories go Here -->

                <?php Display::displayCategories(); ?>

          <?php Display::searchBar(); ?>


            </div><!-- Container / END -->
            

            
            
            </div><!-- Container / END -->

        </div><!-- Content / END -->

<?php
DefaultFoot();
?>