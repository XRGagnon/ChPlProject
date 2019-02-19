<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
include_once "../DBManager/Utility.php";
sec_session_start();
DefaultHead();
//If Transcation Data was sent
if (isset($_POST["ROMANCARTXML"]))
{
    $transactionData = simplexml_load_string($_POST["ROMANCARTXML"]);
    if (Login_Check())
    {
        //If a user is logged in, insert the transaction into their record
        Utility::manageOrder($transactionData,$_SESSION["user_id"]);
    }

}


?>






<?php

?>
<div class="container block md-margin-top">
<img src="../image/thankyou.png" alt="Thank You Image" />
    <br/>
        <div class="title-big" style="text-align:center">
            <h1>For your purchase!</h1>
        </div>
        <h2 style="text-align:center">We hope to see you again soon!</h2>
        <div  class="btn btn-primary btn-circle sm-margin-top "><a href="index.php">Return to Home Page</a></div>
    </div><!-- Container / END -->
<?php

DefaultFoot();