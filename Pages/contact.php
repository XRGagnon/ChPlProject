<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
sec_session_start();
DefaultHead();



?>
        
        <!-- Page header / START -->
            <div class="page-header">
                <div class="container">
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 path-tree">
                            <a href="index.php">Home</a> /
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>

                </div><!-- Container / END -->
            </div><!-- Page header / END -->
        
        <div id="content">

            <div class="container contact">

                <section id="contact-info">
                    <div class="row">
                            
                        <div class="col-xs-12 col-sm-6 col-lg-7">
                        
                            <div class="block">

                                <form method="post" action="../Controllers/contactController.php">

                                    <div class="form-group">
                                        <div class="control-label">
                                            Name
                                        </div>
                                        
                                        <div class="controls">
                                            <input type="text" class="form-control input" name="name"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="control-label">
                                            Email
                                        </div>
                                        
                                        <div class="controls">
                                            <input name="sender" type="text" class="form-control input"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="control-label">
                                            Subject
                                        </div>
                                        
                                        <div class="controls">
                                            <input type="text" class="form-control input" name="subject"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="control-label">
                                            Message
                                        </div>
                                        
                                        <div class="controls">
                                            <textarea  class="form-control textarea" name="msg"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <button class="btn btn-primary">Submit</button>

                                    </div>
                                    <div>
                                        <?php

                                        if (isset($_GET["error"]))
                                        {
                                            echo "<p class='alert-danger'> ".$_GET['error']." </p>";
                                        }
                                        if (isset($_GET["success"]))
                                        {
                                            echo "<p class='alert-success'> ".$_GET['success']." </p>";
                                        }

                                        ?>
                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-5">
                            
                            <div class="block bg-gray company-info text-center">

                                <div class="main-info">
                                    <h1 class="name strong">Champlain Plastics, Inc.</h1></div>

                                <div class="address datalist">
                                    <p class="info">
                                        <span class="key">Address:</span><br>
                                        <span class="value">87 Pillsbury Road<br>
Rouses Point, NY<br>
12979 USA</span>
                                    </p>
                                    <p class="info">
                                        <span class="key">Phone:</span><br>
                                        <span class="value">1-800-660-4135</span>
                                    </p>
                                    
                                    <p class="info">
                                        <span class="key">E-mail:</span><br>
                                        <span class="value">info@champlainplastics.net</span>
                                    </p>
                                </div>

                            </div>

                        </div><!-- Row / END -->

                    </div>
                </section><!-- Contact / END -->

                <!-- Our team / START -->
                <section id="team">
                    <div class="lg-block text-center">

                        <div class="title-big">
                            <h1>Contact a Rep</h1>
                        </div>

                        

                    </div><!-- Our team / END -->

                    <div class="block team no-margin-bottom">

                        <div class="row">

                            <div class="col-xs-6 col-md-4">

                                <!-- Team member / START -->
                                <div class="member">
                                  <div class="info">
                                <div class="name">Sylvain Vézina</div>
                                        <div class="position">Cell : 514-891-9444<br>
Vezina.intl@sympatico.ca<br>
Fax : 450-359-0536
</div>
                                        <div class="description">
                                            Québec, Maritimes
                                      </div>
                                    </div>

                                </div><!-- Team member / END -->

                            </div>

                            <div class="col-xs-6 col-md-4">

                                <!-- Team member / START -->
                                <div class="member">
                                  <div class="info">
                                <div class="name">François Bruneau</div>
                                        <div class="position">Cell : 514-895-1609<br>
fbruneau@bruneauintl.com<br>
Fax : 450-492-5209
</div>
                                        <div class="description">
                                            Québec
                                      </div>
                                    </div>

                                </div><!-- Team member / END -->

                            </div>

                            <div class="col-xs-6 col-md-4">

                                <!-- Team member / START -->
                                <div class="member">
                                  <div class="info">
                                <div class="name">Larry McGregor</div>
                                        <div class="position">Cell : 416-948-6408<br>
Office: 905-847-9878<br>
larrymcgregor@cogeco.ca<br>
larrymcgregor44@gmail.com<br>
Fax : 905-847-5683
</div>
                                        <div class="description">
                                            Ontario, Western Canada
                                      </div>
                                    </div>

                                </div><!-- Team member / END -->

                            </div>
                        </div>

                    </div>
                </section><!-- Team / END-->


            </div><!-- Container / END -->

        </div><!-- Content / END -->
    
    
           <!-- Footer / START -->
        <footer class="footer">
            <div class="container">
                
                <span class="copyright">
                    Copyright 2018. Champlain Plastics Inc. All rights served.
                </span>
                
                <span class="links">
                    <a href="#">Terms of service</a>
                    <a href="#">Privacy policy</a>
                </span>
                
            </div>
        </footer><!-- Footer / END -->
    
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
             function initMap(){
                latitude = parseFloat(44.985933);
                longitude = parseFloat(-73.37889189999999);

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: {lat: latitude, lng: longitude},
                    scrollwheel: false,
                    mapTypeControlOptions: {
                        mapTypeIds: []
                    }
                });

                var marker = new google.maps.Marker({
                    position: {lat: latitude, lng: longitude},
                    map: map,
                    title: 'We are located here!'
                });

                
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
        
    </body>
</html>