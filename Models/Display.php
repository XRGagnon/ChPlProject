<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 24/01/2019
 * Time: 2:22 PM
 */
include_once "../DBManager/Retrieval.php";
//This file contains all display methods
class Display
{
    //This method displays all Main categories
    static function displayCategories()
    {
        //Get the categories from the database
        $cats = Retrieval::getCategories();

        if ($cats)
        {
            //Display header
            echo
            "
            <div class=\"block shop-grid no-margin-bottom\">

                    <div class=\"row\">

                        
        ";
            while($cat = $cats->fetch_assoc())
            {
                $id = $cat["Category"];
                $title = $cat["EnglishCat"];
                $image = $cat["Image"];
                //Display only if a main category
                if (strpos($id, 'sc') == false) {



                    echo
                        "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-sx-6\">

                                    <div class=\"image\">
                                        <a href=\"catGridView.php?catId=" . $id . "\">
                                            <img src=\".." . $image . "\" alt=\"Shop item image\"/>
                                        </a>
                                  </div>

                                    <div class=\"title\">
                                        <h3><a href=\"catGridView.php?catId=" . $id . "\">" . $title . "</a></h3>
                                    </div>
                                  

                                </div>
                            </section>            
            ";
                }
            }

            echo
            "
        </div><!-- Row / END -->

                </div><!-- Shop grid / END -->
        ";
        }

    }


    //This function displays the item grid of the parent category
    static function displayCategoryGrid($parentCategory)
    {

        $cat = Retrieval::getCategory($parentCategory);
        $items = Retrieval::getCatItems($parentCategory);
        $subCats = Retrieval::getCatSubs($parentCategory);
        $catArray = array();
        $itemArray = array();
        $displayPerPage = 10;
        $pageIndex = 0;
        $emptySC = false;
        $emptyItems = false;

        //SQL into Array
        if($subCats)
        {
            while($row = $subCats->fetch_array())
            {
                array_push($catArray,$row);
            }
        }
        else
        {
            $emptySC = true;
        }

        if($items)
        {
            while($row = $items->fetch_array())
            {
                array_push($itemArray,$row);
            }
        }
        else
        {
            $emptyItems = true;
        }

        //Calculations for separating items into pages
        $itemCount = sizeof($itemArray) + sizeof($catArray);
        $maxIndex = ceil($itemCount / $displayPerPage);
        if (isset($_GET["index"]))
        {
            $pageIndex = $_GET["index"];
        }
        else
        {
            $pageIndex = 0;
        }

        //Determine Which Items to Display

        $startIndex = ($pageIndex) * $displayPerPage;

        $displaySub = false;
        $displayItem = false;
        $arrayDisplayStartItem = 0;
        $arrayDisplayEndItem = sizeof($itemArray);
        $arrayDisplayStartSub = 0;
        $arrayDisplayEndSub = sizeof($catArray);
        if ($startIndex + $displayPerPage <= sizeof($catArray))
        {
            $arrayDisplayStartSub = $startIndex;
            $arrayDisplayEndSub = $startIndex + $displayPerPage;
            $displaySub = true;
        }
        else if ($startIndex >= sizeof($catArray))
        {
            $arrayDisplayStartItem = $startIndex - sizeof($catArray);
            $displayItem = true;
        }
        else if ($startIndex < sizeof($catArray) && ($startIndex + $displayPerPage) > sizeof($catArray))
        {
            $arrayDisplayStartSub = $startIndex;
            $arrayDisplayEndItem = $displayPerPage - (sizeof($cat) - $startIndex);
            $displaySub = true;
            $displayItem = true;
        }
        else
        {
            $emptyItems = true;
            $emptySC = true;
        }


        //Display Content
        if($cat)
        {
            echo "
                
        
                     
                    <div class=\"container block md-margin-top\">
        
                        <!-- Offers/ START -->
                        <div class=\"block text-center\">
        
                            <div class=\"title-big\">
                                <h1>".$cat["EnglishCat"]."</h1>
                            </div>
        
                        </div><!-- Offers / END -->";


                if ($displaySub) {
                    for ($i = $arrayDisplayStartSub; $i < $arrayDisplayEndSub; $i++) {
                        $row = $catArray[$i];
                        if ($i < sizeof($catArray)) {


                            echo "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-xs-6\">

                                    <div class=\"image\">
                                        <a href=\"catGridView.php?catId=" . $row["Category"] . "\">
                                            <img src=\".." . $row["Image"] . "\" alt=\"Alt text from database\"/>
                                        </a>
                                  </div>

                                    <div class=\"title text-center\">
                                        <h3><a href=\"#\">" . $row["EnglishCat"] . "</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->
                    ";
                        }
                    }
                }


                if ($displayItem) {
                    for($i = $arrayDisplayStartItem; $i < $arrayDisplayEndItem; $i++)
                    {

                            if ($i < sizeof($itemArray))
                            {


                            $row = $itemArray[$i];

                            echo "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-xs-6\">

                                    <div class=\"image\">
                                        <a href=\"detail.php?catId=" . $cat["Category"] . "&itemId=" . $row["Item_No"] . "\">
                                            <img src=\".." . $row["Large_Image"] . "\" alt=\"Alt text from database\"/>
                                        </a>
                                  </div>

                                    <div class=\"title text-center\">
                                        <h3><a href=\"detail.php?catId=" . $cat["Category"] . "&itemId=" . $row["Item_No"] . "\">" . $row["Title_English"] . "</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->
                    ";
                        }
                    }
                }


            if ($emptyItems && $emptySC)
            {
                echo "Nothing to Display";
            }
            self::pageSelector($maxIndex,$pageIndex,$parentCategory);

        }
    }

    static function displayItem($itemNo)
    {
        $item = Retrieval::getItem($itemNo);
        if ($item) {
        $code = $item["Item_No"];
        $title = $item["Title_English"];
        $img = $item["Large_Image"];
        $altImg = $item["Large_Image_Text"];
        $desc = $item["Description_English"];
        $spareAvail = $item["Spare_Parts"];
        $spareMsg = "";
        $colors =  self::colorString($item["Colors"]);
        if ($spareAvail)
        {
            $spareMsg = "See catalog for spare parts";
        }
        else
        {
            $spareMsg = "No spare parts available";
        }
        echo "

                <div class=\"row\">

                    <section id=\"shop-detail\">

                        <div class=\"col-xs-12 col-md-8 col-lg-9 shop-detail content-with-sidebar\">

                            <!-- Shop item / START -->
                            <div class=\"shop-item\">

                                <div class=\"title\">
                                    <span>".$title."</span>
                                  

                                    <div class=\"clear\"></div>
                                </div>

                                <div id=\"image\" class=\"gallery carousel slide\" data-wrap=\"false\">
                                    <div class=\"carousel-outer\">
                                    
                                        <!-- Wrapper for slides -->
                                        <div class=\"carousel-inner\">
                                            <div class=\"item active\">
                                                <img src=\"..".$img."\" alt=\"".$altImg."\"/>
                                            </div>
                                         
                                        </div>
                                    </div>
                                    
                                   
                         

                                    
                                </div><!-- Row / END -->

                 

                            </div><!-- Shop item / END -->

                        </div><!-- Shop detail / END -->

                    </section>

                   <div class=\"col-xs-12 col-md-4 col-lg-3 sidebar\">
  
                              <div class=\"page-subheader\">
                                 <h1>".$desc."</h1>

                                  <h3> ".$spareMsg."</h3>
                                    
                                <div class=\"btn btn-primary btn-circle sm-margin-top\"><a href=\"#\">Download Instruction Manual</a></div>
                                
                                <div class=\"btn btn-primary btn-circle sm-margin-top\"><a href='https://www.romancart.com/cart.asp?storeid=66654&itemcode=$code'>Add to Cart</a></div>
                               
  
                                <div class=\"panel panel-light panel-default sm-margin-top\">
                       
                                <div class=\"panel-body\">Colours available: ".$colors."</div>
                        
                                </div>
                              </div>
                    </div>

                </div><!-- Row / END -->

            ";

        }
        else{
            echo "Nothing to Display";
        }
    }

    static function colorString($colors)
    {
        $chart = array("Green ", "Blue", "Grey ","White ","Gold ","Mocha ","Light Grey", "Black ","Red/Grey ");
        $cArray = explode(", ",$colors);
        $cstring = "";
        foreach($cArray as $color)
        {
            if (is_numeric($color))
            {
                $cstring .= $chart[$color-1];
            }
        }
        return $cstring;
    }
    //TODO: Add page select for item grid << < 1 2 3 > >>

    static function pageSelector($maxIndex, $currentIndex,$catId)
    {

        $goFirst = "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl(0,$catId).">First </a></li>";

        $goLast = "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($maxIndex-1,$catId).">Last </a></li>";
            echo "<ul style='text-align:center' class=\"pagination rounded-pagination no-margin col-sm-12\">";
            echo $goFirst;
            if ($currentIndex > 0)
            {
                echo "<li class=\"paginate_button  \"><a class=\"paginate_button\" href=".self::paginationCraftUrl($currentIndex-1,$catId).">Previous </a></li>";;
            }

            for ($x = 0; $x < $maxIndex; $x++)
            {

                echo "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($x,$catId).">".($x+1)." </a></li>";
            }
            if ($currentIndex < $maxIndex-1)
            {

                echo "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($currentIndex+1,$catId).">Next </a></li>";;
            }
            echo $goLast;
            echo "</ul>";


    }

    static function paginationCraftUrl($index,$catId)
    {
        $currentURL = $_SERVER["SCRIPT_NAME"];
        $currentURL .= "?catId=".$catId."&index=".$index;
        return $currentURL;
    }

    static function searchBar()
    {
        echo "<div class=\"col-xs-12  sidebar sm-margin-top\">

                        <div class=\"xs-block bg-gray quick-search\">

                            <form method=\"get\" action=\"searchResult.php\">

                                <div class=\"form-group\">                                    
                                    <div class=\"controls\">
                                        <input placeholder=\"Search word\" type=\"text\" class=\"form-control input\" name='query'/>
                                    </div>
                                </div>

                                <div class=\"form-group\">
                                    <button class=\"btn btn-primary btn-block\">Search</button>
                                </div>

                            </form>

                        </div>
                 </div>";
    }

    static function displaySearchResult($queryString)
    {

        $items = Retrieval::getSearchResult($queryString);
        $itemArray = array();
        $displayPerPage = 10;
        $pageIndex = 0;
        $emptyItems = false;

        //SQL into Array
        if($items)
        {
            while($row = $items->fetch_array())
            {
                array_push($itemArray,$row);
            }
        }
        else
        {
            $emptyItems = true;
        }

        //Calculations for separating items into pages
        $itemCount = sizeof($itemArray);
        $maxIndex = ceil($itemCount / $displayPerPage);
        if (isset($_GET["index"]))
        {
            $pageIndex = $_GET["index"];
        }
        else
        {
            $pageIndex = 0;
        }

        //Determine Which Items to Display

        $startIndex = ($pageIndex) * $displayPerPage;


        $arrayDisplayStartItem = $startIndex;
        $arrayDisplayEndItem = $startIndex + $displayPerPage;



        //Display Content
        if($items)
        {
            echo "
                
        
                     
                    <div class=\"container block md-margin-top\">
        
                        <!-- Offers/ START -->
                        <div class=\"block text-center\">
        
                            <div class=\"title-big\">
                                <h1>Search Result For: ".$queryString."</h1>
                            </div>
        
                        </div><!-- Offers / END -->";




                for($i = $arrayDisplayStartItem; $i < $arrayDisplayEndItem; $i++)
                {


                    if ($i < sizeof($itemArray))
                    {

                        $row = $itemArray[$i];
                        $cat = "";
                        if ($row["SubCategory"] != null)
                        {
                            $cat = $row["SubCategory"];
                        }
                        else
                        {
                            $cat = $row["Category"];
                        }
                        echo "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-xs-6\">

                                    <div class=\"image\">
                                        <a href=\"detail.php?catId=" . $cat . "&itemId=" . $row["Item_No"] . "\">
                                            <img src=\".." . $row["Large_Image"] . "\" alt=\"Alt text from database\"/>
                                        </a>
                                  </div>

                                    <div class=\"title text-center\">
                                        <h3><a href=\"detail.php?catId=" . $cat . "&itemId=" . $row["Item_No"] . "\">" . $row["Title_English"] . "</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->
                    ";
                    }
                }



            if ($emptyItems)
            {
                echo "Nothing to Display";
            }
            self::pageSelector($maxIndex,$pageIndex,0);

        }
    }

    static function pageSelectorSearch($maxIndex, $currentIndex,$query)
    {

        $goFirst = "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl(0,$query).">First </a></li>";

        $goLast = "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($maxIndex-1,$query).">Last </a></li>";
        echo "<ul style='text-align:center' class=\"pagination rounded-pagination no-margin col-sm-12\">";
        echo $goFirst;
        if ($currentIndex > 0)
        {
            echo "<li class=\"paginate_button  \"><a class=\"paginate_button\" href=".self::paginationCraftUrl($currentIndex-1,$query).">Previous </a></li>";;
        }

        for ($x = 0; $x < $maxIndex; $x++)
        {

            echo "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($x,$query).">".($x+1)." </a></li>";
        }
        if ($currentIndex < $maxIndex-1)
        {

            echo "<li class=\"paginate_button  \"><a class=\"paginate_button \" href=".self::paginationCraftUrl($currentIndex+1,$query).">Next </a></li>";;
        }
        echo $goLast;
        echo "</ul>";


    }

    static function paginationCraftUrlSearch($index,$query)
    {
        $currentURL = $_SERVER["SCRIPT_NAME"];
        $currentURL .= "?query=".$query."&index=".$index;
        return $currentURL;
    }
}
