
<?php
include 'connection.php';
include 'session.php';
$upl_id = $_REQUEST['pid'];
if(!$ad_level == 1)
      {  session_destroy();
        echo '<script language="javascript">';
        echo 'alert("Not Valid User"); location.href="index.php"';
        echo '</script>';
      }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="background-main no-js">
<head>
    <title><?php $stmt = $conn->prepare("SELECT * FROM `upload` WHERE up_id = $upl_id");
                $stmt->execute();
                foreach ($stmt as $key => $value) { echo"{$value['up_title']}";}
                ?>

    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="framework/js/html5shiv.js"></script>
	<script src="framework/js/respond.min.js"></script>
<![endif]-->

    <link href="../framework/addons/lightbox/nivo-lightbox.css" rel="stylesheet" />

    <link href="../social-icons.css" rel="stylesheet" />

    <link href="../style.css" rel="stylesheet" />

    <link href="../theme-color.css" rel="stylesheet" />

    <link href="../responsive.css" rel="stylesheet" />

    <link href="../firefox.css" rel="stylesheet" />

    <script src="../framework/js/modernizr.js"></script>
</head>


<body>

    <a class="sr-only" href="#content"></a>

    <div class="header-background">

        <?php

      include_once '../top.php';


        ?>

    </div>

    <!-- Main Container -->
    <div class="container main-site-container" itemscope itemtype="http://schema.org/CreativeWork">

        <div class="row">
            <div class="col-md-8">

                <!-- main content -->
                <article class="article-container clearfix" itemscope itemtype="http://schema.org/Article">

                    <div class="article-content clearfix">
                        <header>
<?php $stmt = $conn->prepare("SELECT u.up_id, u.up_title, u.up_content, u.up_img, u.u_id, u.cat_id,u.up_date,u.up_upload,
    c.cat_name ,usr.u_name
     FROM upload AS u
     LEFT JOIN category AS c
     ON u.cat_id = c.cat_id
     LEFT JOIN user AS usr
     ON u.u_id = usr.u_id
    WHERE u.up_id = $upl_id
");
                $stmt->execute();
                foreach ($stmt as $key => $value) {
                    echo"      <div class=\"breadcrumb-container clearfix\" itemscope itemtype=\"http://schema.org/WebPage\">
                                <ul class=\"breadcrumb ltr\" itemprop=\"breadcrumb\">
                                    <li><i class=\"icon-home3\"></i><a href=\"post_list.php\">Home</a></li>
                                    <li><a href=\"# \">{$value['cat_name']}</a></li>
                                    <li>{$value['up_title']}</li>
                                </ul>
                            </div>";

                     echo"<div class=\"figure-container\">
                                <figure class=\"featured-post-figure\" itemprop=\"associatedMedia\" itemscope itemtype=\"http://schema.org/ImageObject\">

                                    <a data-lightbox=\"true\" title=\"{$value['up_title']}\" href=\"{$value['up_img']}\">
                                        <img itemprop=\"contentURL\" src=\"{$value['up_img']}\" /></a>

                                    <figcaption itemprop=\"description\">{$value['up_title']}</figcaption>
                                </figure>

                            </div>";

                    echo"<h1 itemprop=\"headline\">{$value['up_title']}</h1>";
                    echo"<div class=\"post-meta\">
                                <ul>
                                    <li><i class=\"icon-user3\"></i><a href=\"#\">{$value['u_name']}</a></li>
                                    <li><i class=\"icon-clock\"></i><a href=\"#\">{$value['up_date']}</a></li>
                                </ul>
                            </div>

                            <div class=\"divider\"></div>
                        </header>";
                    echo" <div class=\"post-entry\" itemprop=\"articleBody\">
                                 {$value['up_content']}
<!--
                            <nav class=\"post-navigation clearfix\">
                                <div class=\"prev-article col-md-6 col-sm-6 col-xs-12\">
                                    <cite>Previous Article</cite>
                                    <h3>India Takes Down Its First Cyber Criminal</h3>
                                    <a href=\"#Prev_Article\" class=\"more\"></a>
                                </div>

                                <div class=\"next-article col-md-6 col-sm-6 col-xs-12\">
                                    <cite>Next Article</cite>
                                    <h3>Bear Introduced to Snow for the First Time</h3>
                                    <a href=\"#Next_Article\" class=\"more\"></a>
                                </div>
                            </nav> -->

                        </div>";

                      echo" <footer class=\"article-boxes clearfix\">
                          <aside class=\"share-box clearfix\" data-showonscroll=\"true\" data-animation=\"fadeIn\">
                              <div class=\"box-title\">
                                  <h3>Downlaod :</h3>
                              </div>

                              <div class=\"box-content share-icons clearfix\">
                                  <a href=\"{$value['up_upload']}\" class=\"gplus\">Download<span class=\"badge\"></span></a>
                              </div>
                          </aside> ";
}
      ?>

                        </footer>

                    </div>
                </article>

            </div>

           

        </div>

        <?php
        include_once '../footer.php';
        ?>
    </div>


    <div class="btn-goto-top border-radius-2px">
        <i class="icon-arrow-up7"></i>
    </div>


    <!-- Body Scripts -->
    <script src="../framework/js/jquery-2.0.3.min.js"></script>
    <script src="../framework/js/jquery-migrate-1.2.1.min.js"></script>

    <script src="../framework/bootstrap/js/bootstrap.min.js"></script>

    <!-- OWL Carousel -->
    <script src="../framework/addons/owl/owl.carousel.min.js"></script>

    <!-- Breaking News Ticker -->
    <script src="../framework/addons/breaking-news-ticker/jquery.ticker.js"></script>

    <!-- Mobile Menu -->
    <script src="../framework/addons/mobile-menu/pushy.js"></script>

    <!-- Mobile Menu -->
    <script src="../framework/addons/img-liquid/imgLiquid-min.js"></script>

    <!-- Show On Scroll -->
    <script src="../framework/addons/show-on-scroll/jquery.appear.js"></script>

    <!-- Fit Videos -->
    <!-- Fit Videos - Declare -->

    <!-- Lightbox -->
    <script src="../framework/addons/lightbox/nivo-lightbox.min.js"></script>

    <script src="../framework/js/serpentsoft-scripts.js"></script>


</body>

</html>
