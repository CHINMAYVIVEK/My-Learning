
<?php
include 'connection.php';
$upl_id = $_REQUEST['pid'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="background-main no-js">
<head>
    <title><?php $stmt = $conn->prepare("SELECT * FROM `upload` WHERE up_id = $upl_id");
                //$stmt->bindParam(':upl_id', $upl_id);
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

    <link href="framework/addons/lightbox/nivo-lightbox.css" rel="stylesheet" />

    <link href="social-icons.css" rel="stylesheet" />

    <link href="style.css" rel="stylesheet" />

    <link href="theme-color.css" rel="stylesheet" />

    <link href="responsive.css" rel="stylesheet" />

    <link href="firefox.css" rel="stylesheet" />

    <script src="framework/js/modernizr.js"></script>
</head>


<body>

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
                                    <li><i class=\"icon-home3\"></i><a href=\"index.php\">Home</a></li>
                                    <li><a href=\"projects.php?prj_id={$value['cat_id']} \">{$value['cat_name']}</a></li>
                                    <li>{$value['up_title']}</li>
                                </ul>
                            </div>";

                     echo"<div class=\"figure-container\">
                                <figure class=\"featured-post-figure\" itemprop=\"associatedMedia\" itemscope itemtype=\"http://schema.org/ImageObject\">

                                    <a data-lightbox=\"true\" title=\"{$value['up_title']}\" href=\"login/{$value['up_img']}\">
                                        <img itemprop=\"contentURL\" src=\"login/{$value['up_img']}\" /></a>

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
                                  <a href=\"login/{$value['up_upload']}\" class=\"gplus\">Download<span class=\"badge\"></span></a>
                              </div>
                          </aside> ";
}
      ?>
<!--
                            <aside class="share-box clearfix" data-showonscroll="true" data-animation="fadeIn">
                                <div class="box-title">
                                    <h3>Share On:</h3>
                                </div>

                                <div class="box-content share-icons clearfix">
                                    <a href="#" class="facebook">facebook<span class="badge"><i class="zoc-facebook"></i></span></a>
                                    <a href="#" class="twitter">twitter<span class="badge"><i class="zoc-twitter"></i></span></a>
                                    <a href="#" class="gplus">google+<span class="badge"><i class="zoc-gplus"></i></span></a>
                                    <a href="#" class="pinterest">pinterest<span class="badge"><i class="zoc-pinterest"></i></span></a>
                                    <a href="#" class="stumbleupon">stumbleupon<span class="badge"><i class="zoc-stumbleupon"></i></span></a>
                                </div>
                            </aside>

                            <aside class="author-box clearfix" itemprop="author" itemscope="" itemtype="http://schema.org/Person" data-showonscroll="true" data-animation="fadeIn">
                                <div class="box-title">
                                    <h3 class="hidden">Written By:</h3>
                                    <div itemprop="image">
                                        <img alt="Serpentsoft" src="img-samples/avatars/1.png" class="avatar">
                                    </div>
                                </div>
<!--
                                <div class="box-content clearfix">
                                    <h4 class="name">
                                        <a itemprop="name" href="pg-category.html" title="Serpentsoft">Serpentsoft</a>
                                    </h4>

                                    <div itemprop="description">
                                        <p>A few words about article's author, I am a Web Developer and Designer, i love computer programming either Desktop or Web</p>
                                    </div>

                                </div>
                            </aside>


                            <!-- Comments Box -->
                            <aside class="cat-widget comments-box clearfix" itemprop="comment" itemscope="" itemtype="http://schema.org/UserComments">
                                <div class="widget-title">
                                    <h3>Comments</h3>

                                    <div class="sep-widget"></div>
                                </div>

                                <div class="widget-content color-theme clearfix">
                                    <div class="comments">
<?php

$stmt = $conn->prepare("SELECT u.up_id,  cm.cm_id,cm.cm_content ,usr.u_name
     FROM comment AS cm
     LEFT JOIN upload AS u
     ON cm.up_id = u.up_id
     LEFT JOIN user AS usr
     ON cm.u_id = usr.u_id
WHERE cm.up_id = $upl_id ORDER by cm.cm_id DESC
");

              $stmt->execute();

                foreach ($stmt as $key => $value) {
                 //$tem_array[] = $v;
                 $up_id = $value['up_id'];
                 $cm_id = $value['up_title'];
                 $cm_content = $value['cm_content'];
                 $u_name = $value['u_name'];

echo "  <ol class=\"comment-list\">

      <li class=\"comment-main\" data-showonscroll=\"true\" data-animation=\"fadeIn\">
          <article class=\"comment\">

              <div class=\"comment-content comment\">

                  <a href=\"#\" class=\"time\">
                    <i class=\"icon-alarm2\"></i>
                    <time itemprop=\"commentTime\" datetime=\"\">August 14, 2013 at 05:41 am</time>
                  </a>

                  <cite class=\"creator\" itemprop=\"creator\"><a href=\"#\" class=\"url\">$u_name</a></cite>

                  <p class=\"text\" itemprop=\"commentText\">$cm_content</p>

              </div>

          </article>

      </li>

  </ol>";
  }
                                       ?>



                                        <div id="respond" class="comment-respond" data-showonscroll="true" data-animation="fadeIn">
                                            <h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>

                                            <form action="#" method="post" id="commentform" class="comment-form">
                                                <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
                                                <p class="comment-form-author">
                                                    <label for="author">Name <span class="required">*</span></label>
                                                    <input id="author" name="author" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input id="email" name="email" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                <p class="comment-form-url">
                                                    <label for="url">Website</label>
                                                    <input id="url" name="url" type="text" value="" size="30">
                                                </p>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Comment</label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                </p>

                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" value="Post Comment">
                                                </p>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </aside>

                        </footer>

                    </div>
                </article>

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

                <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3>Recent Posts</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content clearfix">
                        <div class="wdg-classic-posts color-theme clearfix">
                            <ul class="list-unstyled">
                                <?php
                                $stmt = $conn->prepare("SELECT u.up_id, u.up_title, u.up_content, u.up_img, u.u_id, u.cat_id,u.up_date,
                                    c.cat_name ,usr.u_name
                                     FROM upload AS u
                                     LEFT JOIN category AS c
                                     ON u.cat_id = c.cat_id
                                     LEFT JOIN user AS usr
                                     ON u.u_id = usr.u_id
                                    WHERE u.up_status = 1 ORDER by u.up_id DESC LIMIT 4
                    ");
                            $stmt->execute();
                            foreach ($stmt as $key => $value) {
                               //$tem_array[] = $v;
                               $up_id = $value['up_id'];
                               $up_title = $value['up_title'];
                               $up_content = $value['up_content'];
                               $up_img = $value['up_img'];

                               $u_id = $value['u_name'];
                            $cat_id = $value['cat_name'];

                            echo"<li class=\"post-item\">
                                    <article class=\"post-box clearfix\">
                                        <figure class=\"wdg-col-4 sec-image\">
                                            <div class=\"mask-background white\"></div>

                                            <div class=\"post-thumbnail border-radius-2px\">
                                                <img class=\"border-radius-2px\" src=\"login/$up_img\" alt=\"login/$up_img\" />
                                            </div>


                                            <a href=\"#\" class=\"more\"></a>
                                        </figure>

                                        <div class=\"wdg-col-8 sec-title\">

                                            <span class=\"btn-srp\"><a href=\"projects.php?prj_id={$value['cat_id']}\">$cat_id</a></span>

                                            <h5><a href=\"post.php?pid={$value['up_id']} \" title=\"$up_title\">$up_title</a></h5>

                                            <div class=\"meta-info\">

                                                <span class=\"author\"><i class=\"icon-user3\"></i><a href=\"#\">$u_id</a></span>
                                                <span class=\"date\"><i class=\"icon-alarm2\"></i>{$value['up_date']}</span>

                                            </div>

                                        </div>
                                    </article>
                                </li>";
                            }
                            ?>




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

    <script src="framework/bootstrap/js/bootstrap.min.js"></script>

    <!-- OWL Carousel -->
    <script src="framework/addons/owl/owl.carousel.min.js"></script>

    <!-- Breaking News Ticker -->
    <script src="framework/addons/breaking-news-ticker/jquery.ticker.js"></script>

    <!-- Mobile Menu -->
    <script src="framework/addons/mobile-menu/pushy.js"></script>

    <!-- Mobile Menu -->
    <script src="framework/addons/img-liquid/imgLiquid-min.js"></script>

    <!-- Show On Scroll -->
    <script src="framework/addons/show-on-scroll/jquery.appear.js"></script>

    <!-- Fit Videos -->
    <!-- Fit Videos - Declare -->

    <!-- Lightbox -->
    <script src="framework/addons/lightbox/nivo-lightbox.min.js"></script>

    <script src="framework/js/serpentsoft-scripts.js"></script>


    <script>
        jQuery(function () {

            // Owl
            serpentsoft_owlStartCarousel('divRelatedBox_1', 2, {

                itemsCustom: [
	                [0, 2],
                    [992, 2],
	                [765, 2],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });

            // Widget Slides ( divWidgetSlides_1 )
            serpentsoft_owlStartCarousel('divWidgetSlides_1', 1, {

                itemsCustom: [
	                [0, 1],
                    [992, 1],
	                [765, 1],
                    [480, 1],
                    [150, 1],
                ],

                itemsTablet: false, //2 items between 600 and 0
                itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
                rewindNav: true,
                lazyLoad: true,
            });

        });


    </script>


    <!-- histats code -->

<!-- Histats.com  START (hidden counter)--><script type="text/javascript"></script>              <script src='../../../../s10.histats.com/js15.js' type='text/javascript'></script><script language='javascript'>><a href="../../../../www.histats.com" target="_blank" title="stats web" ><script  type="text/javascript" >try {Histats.start(1,2620834,4,0,0,0,"");Histats.track_hits();} catch(err){};</script></a><noscript><a href="../../../../www.histats.com/default.htm" target="_blank"><img  src="../../../../sstatic1.histats.com/0.gif@2620834&101" alt="stats web" border="0"></a></noscript><!-- Histats.com  END  -->
</body>

</html>
