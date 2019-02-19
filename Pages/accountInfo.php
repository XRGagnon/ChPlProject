<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
include_once "../DBManager/Retrieval.php";
sec_session_start();
DefaultHead();



?>
        
        <!-- Page header / START -->
            <div class="page-header">
                <div class="container">
                    
                    <div class="row">
                      <div class="col-xs-12 col-md-12 path-tree">
                          <a href="index.php">Home</a> /
                          <a href="accountInfo.php">Account</a>
                        </div>
                    </div>

                </div><!-- Container / END -->
            </div><!-- Page header / END -->
        
        <div id="content">

            <div class="container contact">


                <?php
                if (!Login_Check())
                {
                    echo "Please Login";
                }
                else
                {
                    $user = Retrieval::getUser($_SESSION["user_id"]);
                    echo "
                    <h2>Name</h2>
                    <p>".$user["User_Fname"].$user["User_Lname"]."</p>
                    <h2>Username</h2>
                    <p>".$user["Username"]."</p>
                    <h2>Email</h2>
                    <p>".$user["User_Email"]."</p>
                    <br/>
                    <br/>
                    ";
                    $transactions = Retrieval::getUserTransaction($_SESSION["user_id"]);
                    while ($row = $transactions->fetch_assoc())
                    {
                        echo
                        "<table>
                            <tr>
                                <th>Total Price</th>
                                <td>$".$row["Total"]."</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>".$row["Date"]."</td>
                                
                            </tr>
                        </table>";
                        $items = Retrieval::getUserTransactionItems($row["Transaction_ID"]);
                        echo "<ul>";

                        while ($item = $items->fetch_assoc())
                        {
                            $itemData = Retrieval::getItem($item["Item_No"]);
                            echo "<li>&nbsp;&nbsp;&nbsp;-".$item["Quantity"]." ".$itemData["Title_English"]." for $".($item["Quantity"]*$itemData["Price"])."</li>";
                        }
                        echo "</ul>";
                    }


                }
                ?>


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
        <script type="text/javascript"
        
    </body>
</html>