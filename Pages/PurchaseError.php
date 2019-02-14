<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
session_start();
DefaultHead();

?>
<div class="container block md-margin-top">

    <br/>
        <div class="title-big" style="text-align:center">
            <h1>Whoops that didn't work!</h1>
        </div>
        <h2 style="text-align:center">Please try again some other time while we figure out what went wrong!</h2>
        <div  class="btn btn-primary btn-circle sm-margin-top "><a href="index.php">Return to Home Page</a></div>
    </div><!-- Container / END -->
<?php

DefaultFoot();