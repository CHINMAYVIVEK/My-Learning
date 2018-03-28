
		<?php
include 'top.php';
if(!$ad_level == 0)
      {  session_destroy();
        echo '<script language="javascript">';
        echo 'alert("Only for user"); location.href="index.php"';
        echo '</script>';
      }
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
					<li class="active">
						<a href="dashboard.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					                                        
                                        <li>
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
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
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
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Pending Posts
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Title
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i> Category
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Date
																</th>
																
															</tr>
														</thead>

														<tbody>
															<?php
															$stmt = $conn->prepare("SELECT * FROM upload,category WHERE up_status= 0 "
                                                                                                                                . "AND u_id =$id AND upload.cat_id = category.cat_id ORDER BY up_date  ");
																	$stmt->execute();
																	foreach ($stmt->fetchAll() as $value) {
																		echo "<tr>
																			<td>{$value['up_title']}</td>
                                                                                                                                                        <td>{$value['cat_name']}</td>    
																			<td>{$value['up_date']}</td>
																		     </tr>";
																	}
															 ?>


														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>
									<div class="vspace-12-sm"></div>


								</div><!-- /.row -->

								

								<div class="hr hr32 hr-dotted"></div>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<?php include 'footer.php'; ?>
