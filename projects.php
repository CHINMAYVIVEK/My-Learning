<?php
include_once 'connection.php';
$prj_id = $_REQUEST['prj_id'];
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="background-main no-js">
<head>
    <title>
                <?php
                $stmt = $conn->prepare("SELECT * FROM category ORDER by cat_name ASC");
                $stmt->execute();
                foreach ($stmt as $key => $value) { echo"{$value['cat_name']},";}
                ?> Programming, Sourcecode, tutorials and doubt clearing with My learning</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />

    <link href="framework/addons/camera/css/camera.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="framework/js/html5shiv.js"></script>
        <script src="framework/js/respond.min.js"></script>
    <![endif]-->

    <link href="social-icons.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />

    <link href="theme-color.css" rel="stylesheet" />

    <link href="responsive.css" rel="stylesheet" />

    <link href="firefox.css" rel="stylesheet" />

    <script src="framework/js/modernizr.js"></script>
</head>


<body>
    <!--<canvas id="snowfall"></canvas>-->

    <a class="sr-only" href="#content"></a>

    <div class="header-background">

        <?php

      include_once 'top.php';


        ?>

        <!-- Main Menu -->
        <nav class="main-menu navbar visible-lg visible-md" data-sticky-header="true">
            <h2 class="hidden">Main Navigation</h2>

            <div class="container">
                <div class="row">

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div id="main-menu-navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">

                            <li class="color-theme ">
                                <a href="index.php" class="dropdown-toggle" data-hover="dropdown">Home <span class="nav-line"></span></a>
                            </li>

                            <li class="dropdown color-3 active">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Projects<span class="nav-line"></span></a>
                                <ul class="dropdown-menu animated fadeInLeft">
                                    <?php
                $stmt = $conn->prepare("SELECT * FROM category ORDER by cat_name ASC");
                $stmt->execute();
                foreach ($stmt as $key => $value) {
                    echo"<li><a href=\"projects.php?prj_id={$value['cat_id']} \">{$value['cat_name']}</a></li>";

                    }
                ?>

                                </ul>
                            </li>

                            <li class="color-2">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">About<span class="nav-line"></span></a>
                            </li>

                            <li class="color-4">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Contact<span class="nav-line"></span></a>
                            </li>


                        </ul>


                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

        </nav>


        <!-- Mobile Menu (Pushy Menu) -->
        <nav class="mobile-menu pushy pushy-left  animated fadeInLeft">
            <h2 class="hidden">Mobile Navigation</h2>

            <div class="close-button"><i class="icon-close"></i>Close</div>

            <ul class="menu-block">
                <li class="color-theme ">
                                <a href="index.php" class="dropdown-toggle" data-hover="dropdown">Home <span class="nav-line"></span></a>
                            </li>

                            <li class="dropdown color-3 active">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Projects<span class="nav-line"></span></a>
                                <ul class="dropdown-menu animated fadeInLeft">
                                    <?php
                $stmt = $conn->prepare("SELECT * FROM category ORDER by cat_name ASC");
                $stmt->execute();
                foreach ($stmt as $key => $value) {
                    echo"<li><a href=\"projects.php?prj_id={$value['cat_id']} \">{$value['cat_name']}</a></li>";

                    }
                ?>

                                </ul>
                            </li>

                            <li class="color-2">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">About<span class="nav-line"></span></a>
                            </li>

                            <li class="color-4">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Contact<span class="nav-line"></span></a>
                            </li>


            </ul>



        </nav>

        <!-- Mobile-Menu (Close) Site Overlay -->
        <div class="site-overlay"></div>


    </div>


    <!-- Main Container -->
    <div class="container main-site-container" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="row">
            <div class="col-md-8">

                <!-- Opposite Posts Category -->
                <section class="cat-widget wdg-cat-opposite clearfix">



                    <div class="color-red widget-content clearfix">
                        <div>

                            <?php
                           // $sql = "SELECT u.up_id, u.up_title,u.up_content, u.up_img, u.up_vid, u.up_file AS u LEFT JOIN `user` AS us ON u.u_id = us.u_id WHERE u.up_status = 1 ORDER by u.up_id DESC";
                           // $stmt = $conn->prepare($sql);
                        //    $stmt = $conn->prepare("SELECT * FROM upload
                          //    WHERE up_status = 1 AND cat_id = $prj_id ORDER by up_id DESC");

                              $stmt = $conn->prepare("SELECT u.up_id, u.up_title, u.up_content, u.up_img, u.u_id, u.cat_id,u.up_date,
                                  c.cat_name ,usr.u_name
                                   FROM upload AS u
                                   LEFT JOIN category AS c
                                   ON u.cat_id = c.cat_id
                                   LEFT JOIN user AS usr
                                   ON u.u_id = usr.u_id
                                  WHERE u.up_status = 1 AND u.cat_id = $prj_id ORDER by u.up_id DESC
                              ");

                            $stmt->execute();
                              $i=1;
                              foreach ($stmt as $key => $value) {
                               //$tem_array[] = $v;
                               $up_id = $value['up_id'];
                               $up_title = $value['up_title'];
                               $up_content = $value['up_content'];
                               $up_img = $value['up_img'];
                               $u_id = $value['u_name'];
                               $cat_id = $value['cat_id'];
                               $cat_name = $value['cat_name'];
                               $date = $value['up_date'];
                               if(!($i%2==0))
                                {
                                    echo "<article class=\"odd-item\" data-showonscroll=\"true\" data-animation=\"fadeIn\">
                                <figure class=\"sec-image\">

                                    <a class=\"post-thumbnail\">
                                        <img src=\"login/$up_img\" alt=\"$up_img\"/></a>

                                    <div class=\"top-bar\">

                                        <span class=\"btn-srp\"><a href=\"projects.php?prj_id=$cat_id \">$cat_name</a></span>
                                    </div>

                                    <div class=\"bottom-bar\">
                                        <span class=\"btn-srp\"><a href=\"post.php?pid=$up_id\">Read More...</a></span>


                                    </div>

                                </figure>

                                <div class=\"sec-desc\">

                                    <header class=\"title\">
                                        <h4 class=\"post-title\"><a href=\"post.php?pid=$up_id\">$up_title</a></h4>
                                    </header>

                                    <div class=\"meta-info\">
                                        <span class=\"author\"><i class=\"icon-user3\"></i><a href=\"#\">$u_id</a></span>
                                        <span class=\"date-time\"><i class=\"icon-alarm2\"></i>$date</span>
                                    </div>


                                    <div class=\"post-desc\">
                                        <p>$up_content</p>
                                    </div>

                                </div>
                            </article>";
                                }
                                 else{
                                     echo "<article class=\"even-item\" data-showonscroll=\"true\" data-animation=\"fadeIn\">
                                <figure class=\"sec-image\">

                                    <a class=\"post-thumbnail\">
                                        <img src=\"img-samples/$up_img\" alt=\"$up_img\" /></a>

                                    <div class=\"top-bar\">

                                        <span class=\"btn-srp\"><a href=\"projects.php?prj_id=$cat_id \">$cat_id</a></span>
                                    </div>

                                    <div class=\"bottom-bar\">
                                        <span class=\"btn-srp\"><a href=\"post.php?pid=$up_id\">Read More...</a></span>


                                    </div>

                                </figure>

                                <div class=\"sec-desc\">

                                    <header class=\"title\">
                                        <h4 class=\"post-title\"><a href=\"#\">$up_title</a></h4>
                                    </header>

                                    <div class=\"meta-info\">
                                        <span class=\"author\"><i class=\"icon-user3\"></i><a href=\"#\">Serpentsoft</a></span>
                                        <span class=\"date-time\"><i class=\"icon-alarm2\"></i>26 Feb 2013, 05:15 AM</span>
                                    </div>


                                    <div class=\"post-desc\">
                                        <p>$up_content</p>
                                    </div>

                                </div>
                            </article>";
                                 }

                                 echo"<div class=\"divider\"></div>";

                                $i++;
                              }



                            ?>

                        </div>
                    </div>

                    <footer class="blog-pagination">
                                <ul class="pagination">
                                    <li><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                    </footer>

                </section>


            </div>

            <section class="col-md-4">
                <h2 class="hidden">Sidebar</h2>

                <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3>Social Counter</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content clearfix">
                        <div class="wdg-social-counter clearfix">
                            <ul class="social-counter clearfix">
                                <li>
                                    <div class="facebook">
                                        <i class="zoc-facebook border-radius-50-per"></i>

                                        <span class="fans-word">Fans</span>

                                        <span class="fans-count">10,000</span>

                                        <a href="#" class="more"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="twitter">
                                        <i class="zoc-twitter border-radius-50-per"></i>

                                        <span class="fans-word">Followers</span>
                                        <span class="fans-count">2,000</span>

                                        <a href="#" class="more"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="youtube">
                                        <i class="zoc-youtube border-radius-50-per"></i>

                                        <span class="fans-word">Subscribers</span>
                                        <span class="fans-count">150</span>

                                        <a href="#" class="more"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="vimeo">
                                        <i class="zoc-vimeo border-radius-50-per"></i>

                                        <span class="fans-word">Subscribers</span>
                                        <span class="fans-count">4,150</span>

                                        <a href="#" class="more"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="dribbble">
                                        <i class="zoc-dribbble border-radius-50-per"></i>

                                        <span class="fans-word">Followers</span>
                                        <span class="fans-count">200</span>

                                        <a href="#" class="more"></a>

                                    </div>
                                </li>

                                <li>
                                    <div class="rss">
                                        <i class="zoc-rss border-radius-50-per"></i>

                                        <span class="fans-word">To RSS Feed</span>
                                        <span class="fans-count">Subscribe</span>

                                        <a href="#" class="more"></a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </aside>

            </section>

        </div>

        <?php
        include_once 'footer.php';
        ?>

    </div>



    <div class="btn-goto-top border-radius-2px">
        <i class="icon-arrow-up7"></i>
    </div>


    <!-- Body Scripts -->
    <script src="framework/js/jquery-2.0.3.min.js"></script>
    <script src="framework/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="framework/js/jquery.easing.1.3.js"></script>

    <script src="framework/bootstrap/js/bootstrap.min.js"></script>


    <!-- Breaking News Ticker -->
    <script src="framework/addons/breaking-news-ticker/jquery.ticker.js"></script>

    <!-- Mobile Menu -->
    <script src="framework/addons/mobile-menu/pushy.js"></script>

    <!-- Show On Scroll -->
    <script src="framework/addons/show-on-scroll/jquery.appear.js"></script>

    <script src="framework/js/serpentsoft-scripts.js"></script>


   </body>
</html>
