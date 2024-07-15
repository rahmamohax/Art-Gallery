<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$id= $_SESSION['user_id'] ;
?>
    <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
        <div id="header" class="nav-collapse">
            <div class="row clearfix">
                <div class="col-1">

                    <!--Logo-->
                    <div id="logo">

                        <!--Logo that is shown on the banner-->
                        <a href="index.php"><img src="images/logo.png" id="banner-logo" alt="Landing Page"/></a>
                        <!--End of Banner Logo-->

                        <!--The Logo that is shown on the sticky Navigation Bar-->
                        <img src="images/logo-2.png" id="navigation-logo" alt="Landing Page"/>
                        <!--End of Navigation Logo-->

                    </div>
                    <!--End of Logo-->

                    <aside>

                        <!--Social Icons in Header-->
                        <div class="join-us">
                            <?php  
                            if(isset($_SESSION['user_id']) || isset($_SESSION['artist_id']) ){
                                echo '
                                <a href="profile.php"><button class="button-L">Profile</button></a>
                                <a href="v-area.php"><button class="button-L">V-Area</button></a>';
                            }
                            else{ echo '<a href="join.php" ><button class="button-L">Join Us</button></a>
                            <a   href="log.php"><button class="button-L">Log in</button></a>';}
                            ?>
                            <div class="containerr">
                                <div class="shopping">
                                    <?php
                                    include 'connect.php';
                                    $select =mysqli_query($conn, " SELECT * FROM `cart` where user_id= '$id'");
                                    $row= mysqli_num_rows($select);
                                    ?>
                                        <a href="cart.php"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
                                        <span><sup class="cart-count"><?php echo $row; ?></sup></span>
                                    </div>
                            </div>  
                        </div>
                        <!--End of Social Icons in Header-->

                    </aside>

                    <!--Main Navigation-->
                    <nav id="nav-main">
                    
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="browse.php">Browse</a>
                            </li>
                            <li>
                                <a href="index.php#gallery">Gallery</a>
                            </li>
                            <li>
                                <a href="egift.php">E-Gift</a>
                            </li>
                            <li>
                                <a href="#testimonials">Testimonials</a>
                            </li>
                            <li>
                                <a href="#clients">Clients</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                            
                        </ul>
                    </nav>
                    <!--End of Main Navigation-->

                    <div id="nav-trigger"><span></span></div>
                    <nav id="nav-mobile"></nav>

                </div>
            </div>
        </div><!--End of Header-->

    </header>