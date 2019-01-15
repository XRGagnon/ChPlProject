<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:14 AM
 */
function DefaultHead()
{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Olympic Pool Accessories by Champlain Plastics, Inc.</title>
        
        <meta name="description" content="Shop home - Senseras"/>
        <link rel="shortcut icon" href="../image/favicon.png" type="image/png"/>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        
        <!-- Style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
        <link rel="stylesheet" href="../css/blue.css" type="text/css" />
		<link rel="stylesheet" href="../css/Forms.css" type="text/css" />
        <!--<link rel="stylesheet" type="text/css" href="../css/Bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/Bootstrap/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="../css/Bootstrap/bootstrap-reboot.css">-->
        <!--JS Includes for Form security -->
        <script type="text/JavaScript" src="../js/sha512.js"></script>
        <script type="text/JavaScript" src="../js/forms.js"></script>
    </head>
    <body>
    <!-- Navigation / START -->
        <nav class="navbar navbar-default">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Show menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" id="logo" href="#">
                         <img src="../image/Logo.png" class="mylogos" alt="Olympic by Champlain Plastics">
                    </a>
                </div>


                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav">
                    
                        <li class="drop active">

                            <a href="../Pages/TestHome.php">


                                Home
                            </a>
                        </li>

                        <li class="drop active">
                            <a href="../Pages/Login.php">
                                Login
                            </a>
                        </li>

                        <li class="drop">
                            <a href="#">
                                Products
                            </a>
                            <div class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">New Products</a>
                                    </li>
                                    <li>
                                        <a href="#">Maintenance</a>
                                    </li>
                                    <li>
                                        <a href="#">Vacuum Hoses</a>
                                    </li>
                                    <li>
                                        <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                        <a href="#">Backwash Hoses</a>
                                    </li>
                                    <li>
                                        <a href="#">Skimmers/Drains</a>
                                    </li>
                                    <li>
                                        <a href="#">Plumbing</a>
                                    </li>
                                    <li>
                                        <a href="#">Ladders/Steps</a>
                                    </li>
                                    <li>
                                        <a href="#">Lights</a>
                                    </li>
                                     <li>
                                        <a href="#">Cover Reels/Solar Rollers</a>
                                    </li>
                                    <li>
                                        <a href="#">Games, Chairs and More</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="drop">
                            <a href="#">
                                Instruction Manuals
                            </a>
                        </li>

                        <li class="drop">
                            <a href="#">
                                Contact us
                            </a>
                        </li>

                        <li class="drop">
                            <a href="../Pages/Login.php">
                                Dealer Login
                            </a>
                        </li>
						
						<li class="drop">
                            <a href="../Pages/Register.php">
                                Dealer Register
                            </a>
                        </li>

                    </ul>

                </div>
                
            </div>

        </nav><!-- Navigation / END -->
<?php
}

function DefaultFoot()
{
    ?>
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
    <?php
}