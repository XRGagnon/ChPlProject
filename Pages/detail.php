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
    $catId = $_GET["catId"];
}
else{
    $itemId = 0;
}

echo "<div id=\"content\">
             <!-- Page header / START -->
            <div class=\"page-header\">
                <div class=\"container\">
                    
                    <div class=\"row\">
                        <div class=\"col-xs-12 col-md-6 title\">
                            <h2>Cleaners</h2>
                            
                        </div>

                        <div class=\"col-xs-12 col-md-12 path-tree\">
                        <a href=\"index.php\">Home</a> /
                        <a href=\"index.php\">Categories</a> /
                        <a href=\"catGridView.php?catId=".$catId."\">".Retrieval::getCategory($catId)["EnglishCat"]."</a> /
                        <a href=".$_SERVER["REQUEST_URI"].">".Retrieval::getItem($itemId)["Title_English"]."</a>
                    </div>
                    </div>

                </div><!-- Container / END -->
            </div><!-- Page header / END -->
             <div class=\"container block md-margin-top\">";?>
            <?php Display::displayItem($itemId) ?>
         </div>
         </div>
<?php
DefaultFoot();