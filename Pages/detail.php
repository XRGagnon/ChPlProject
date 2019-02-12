<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
sec_session_start();
DefaultHead();

$data = false;
$itemId;
if(isset($_GET["itemId"]))
{
    $data = true;
    $itemId = $_GET["itemId"];
}
else{
    $itemId = 0;
}

?>
        
         <div id="content">

             <!-- Page header / START -->
            <div class="page-header">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-6 title">
                            <h2>Cleaners</h2>
                            
                        </div>

                        <div class="col-xs-12 col-md-6 path-tree">
                            <a href="#">Home</a> / 
                            <a href="#">Path</a>
                        </div>
                    </div>

                </div><!-- Container / END -->
            </div><!-- Page header / END -->

            <?php Display::displayItem($itemId) ?>


<?php
DefaultFoot();