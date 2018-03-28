		<?php
include 'top.php';
		 ?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
                                    <?php echo"
					<li>";
                                            
                                             if ($ad_level==1){
                                                 echo"<a href=\"dashboard.php\">
							<i class=\"menu-icon fa fa-tachometer\"></i>
							<span class=\"menu-text\"> Dashboard </span>
						</a>
                                                <b class=\"arrow\"></b>";
                                             }
                                             
                                             if ($ad_level==0){
                                                 echo"<a href=\"userboard.php\">
							<i class=\"menu-icon fa fa-tachometer\"></i>
							<span class=\"menu-text\"> Dashboard </span>
						</a>
                                                 <b class=\"arrow\"></b>";
                                             }
                                            	
					echo"</li>";
                                 if ($ad_level==1){
				echo"<li>
						<a href=\"users.php\">
							<i class=\"menu-icon fa fa-gear\"></i>
							<span class=\"menu-text\"> User Control </span>
						</a>

						<b class=\"arrow\"></b>
					</li>";
                                 }
                                ?>
                                        
                                        <li class="active">
						<a href="post.php">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> Post Article </span>
						</a>

						<b class="arrow"></b>
					</li>

						<b class="arrow"></b>




				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
                                                                <a href="dashboard.php">Home</a>
							</li>

							<li class="active">Post Arcticle</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						
						<div class="page-header">
							<h1>Write the Article </h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h4 class="header green clearfix">
									Share Your Knowledge
									
								</h4>
	
                                                                <form class="form-horizontal" role="form" method="post" action="action.php" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Title" class="col-xs-10 col-sm-5" name="title" />
										</div>
                                                                        </div>
                                                                       <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description </label>

										<div class="col-sm-9">
                                                                                    <textarea type="text" id="form-field-1" placeholder="Description" class="col-xs-10 col-sm-5" name="description" > </textarea>
										</div>
                                                                        </div>
                                                                        
                                                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Choose Catagory </label>

										<div class="col-sm-9">
                                                                                    <select class="col-xs-10 col-sm-5" name="cat" > 
                                                                                    <?php 
                                                                                    $stmt = $conn->prepare("SELECT * FROM category ORDER by cat_name ASC");
										    $stmt->execute();
										    foreach ($stmt->fetchAll() as $value) {
                                                                                        echo"<option value=\"{$value['cat_id']}\">{$value['cat_name']}</option>";
                                                                                    }
                                                                                    ?>
                                                                                    </select>
										</div>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Upload Image (jpg,png)/ video(mp4)/ pdf files only </label>

										<div class="col-sm-9">
                                                                                    <input type="file" id="form-field-1"  class="col-xs-10 col-sm-5" name="image_upload" />
										</div>
                                                                        </div>
                                                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Upload Source code (Zip file only) </label>

										<div class="col-sm-9">
                                                                                    <input type="file" id="form-field-1"  class="col-xs-10 col-sm-5" name="code" />
										</div>
                                                                        </div>
                                                                    
                                                                        <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
                                                                                    <button class="btn btn-info" type="submit" name="article">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

                                                                    
                                                                </form>
                                                                
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
                        
			<?php                                         
                        include 'footer.php';

                        

                        
                        
