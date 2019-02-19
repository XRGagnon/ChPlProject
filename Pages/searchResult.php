<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
sec_session_start();
DefaultHead();

$query = "";
if (isset($_GET["query"])) {
    $query = $_GET["query"];
}



if ($query)
{
echo "<div id=\"content\">
                    <!-- Page header / START -->
                    <div class=\"page-header\">
                        <div class=\"container\">
                            
                            <div class=\"row\">
                              <div class=\"col-xs-12 col-md-12 path-tree\">
                                    <a href=\"index.php\">Home</a> / 
                                    <a href=\"index.php\">Categories</a> /
                                    <a href=\"searchResult.php.php?query=\">".$query."</a>
                                </div>
                            </div>
        
                        </div><!-- Container / END -->
                    </div><!-- Page header / END -->";

                    //Display Search Result Items
                    Display::displaySearchResult($query);
}
else
{
    echo "<div id=\"content\">
                    <!-- Page header / START -->
                    <div class=\"page-header\">
                        <div class=\"container\">
                            
                            <div class=\"row\">
                              <div class=\"col-xs-12 col-md-12 path-tree\">
                                    <a href=\"index.php\">Home</a> / 
                                    <a href=\"index.php\">Categories</a>
                                </div>
                            </div>
        
                        </div><!-- Container / END -->
                    </div><!-- Page header / END -->";
    echo "Database Error: Empty Category";
}
Display::searchBar();
echo "</div><!-- Container / END -->";


DefaultFoot();