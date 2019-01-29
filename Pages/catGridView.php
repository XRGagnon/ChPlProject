<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
sec_session_start();
DefaultHead();
//TODO: Add protection against empty GET
?>
        


           


<?php
$cat = $_GET["catId"];
Display::displayCategoryGrid($cat);
?>


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
        
    </body>
</html>