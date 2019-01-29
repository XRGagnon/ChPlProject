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
        $emptySC = false;
        $emptyItems = false;
        if($cat)
        {
            echo "
                <div id=\"content\">
        
                     <!-- Page header / START -->
                    <div class=\"page-header\">
                        <div class=\"container\">
                            
                            <div class=\"row\">
                              <div class=\"col-xs-12 col-md-12 path-tree\">
                                    <a href=\"#\">Home</a> / 
                                    <a href=\"#\">Path</a>
                                </div>
                            </div>
        
                        </div><!-- Container / END -->
                    </div><!-- Page header / END -->
                    <div class=\"container block md-margin-top\">
        
                        <!-- Offers/ START -->
                        <div class=\"block text-center\">
        
                            <div class=\"title-big\">
                                <h1>".$cat["EnglishCat"]."</h1>
                            </div>
        
                        </div><!-- Offers / END -->";


            if ($subCats->num_rows > 0)
            {
                while($row = $subCats->fetch_assoc())
                {

                    echo "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-xs-6\">

                                    <div class=\"image\">
                                        <a href=\"catGridView.php?catId=".$row["Category"]."\">
                                            <img src=\"..".$row["Image"]."\" alt=\"Alt text from database\"/>
                                        </a>
                                  </div>

                                    <div class=\"title text-center\">
                                        <h3><a href=\"#\">".$row["EnglishCat"]."</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->
                    ";
                }
            }
            else
            {
                $emptySC = true;
            }
            //TODO: fix items not displaying
//TODO: fix display of subcategories

            if ($items->num_rows > 0)
            {
                while($row = $items->fetch_assoc())
                {

                    echo "
                            <section>
                                <div class=\"shop-grid-item col-sm-3 col-xs-6\">

                                    <div class=\"image\">
                                        <a href=\"itemView.php?catId=".$row["Item_No"]."\">
                                            <img src=\"..".$row["Large_Image"]."\" alt=\"Alt text from database\"/>
                                        </a>
                                  </div>

                                    <div class=\"title text-center\">
                                        <h3><a href=\"itemView.php?catId=".$row["Item_No"]."\">".$row["Title_English"]."</a></h3>
                                    </div>
                                  

                                </div>
                            </section><!-- Shop item / END -->
                    ";
                }
            }
            else
            {
                $emptyItems = true;
            }

            if ($emptyItems && $emptySC)
            {
                echo "Nothing to Display";
            }

            echo "</div><!-- Container / END -->

        </div><!-- Content / END -->";

        }
    }
}
