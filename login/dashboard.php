
		<?php
include 'top.php';
if(!$ad_level == 1)
      {  session_destroy();
        echo '<script language="javascript">';
        echo 'alert("Not Valid User"); location.href="index.php"';
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
						<a href="users.php">
							<i class="menu-icon fa fa-gear"></i>
							<span class="menu-text"> User Control </span>
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

									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>
											<?php
											$stmt = $conn->prepare("SELECT * FROM user WHERE u_level= 1 AND u_status =1 ");
													$stmt->execute();
                                                                                                        $count =  $stmt->rowCount();
													echo " <div class=\"infobox-data\"> <a href=\"users.php\">
													           <span class=\"infobox-data-number\">$count</span>
													           <div class=\"infobox-content\">Users</div> </a>
													       </div> ";


											 ?>

										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-user"></i>
											</div>

											<?php
											$stmt = $conn->prepare("SELECT * FROM user WHERE u_level= 0 AND u_status =1 ");
													$stmt->execute();
                                                                                                        $count =  $stmt->rowCount();
													echo "<div class=\"infobox-data\"><a href=\"users.php\">
														<span class=\"infobox-data-number\">$count</span>
														<div class=\"infobox-content\">Admin</div> </a>
													    </div>";


											 ?>
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-comment"></i>
											</div>

											<?php
											$stmt = $conn->prepare("SELECT * FROM upload WHERE up_status =1 ");
													$stmt->execute();
                                                                                                        $count =  $stmt->rowCount();
														echo "<div class=\"infobox-data\"> <a href=\"post_list.php\">
															<span class=\"infobox-data-number\">$count</span>
															<div class=\"infobox-content\">Post</div> </a>
															</div>";


											 ?>

										</div>

										<div class="space-6"></div>

									</div>

									<div class="vspace-12-sm"></div>


								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-4">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-user orange"></i>
													Pending Users
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
																	<i class="ace-icon fa fa-caret-right blue"></i>name
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>email
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th>
																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>level
																</th>
																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Action
																</th>
															</tr>
														</thead>

														<tbody>
															<?php
															$stmt = $conn->prepare("SELECT * FROM user WHERE u_status= 0  ");
																	$stmt->execute();
																	foreach ($stmt->fetchAll() as $value) {
                                         echo "<tr>
	                                                <td>{$value['u_name']}</td>
                                                  <td>{$value['u_email']}</td>
                                                  <td>{$value['u_status']}</td>
	                                          <td>{$value['u_level']}</td>
						  <td><a href=\"action.php?activate={$value['u_id']}\"> Approve</a> &nbsp; &nbsp;
						      <a href=\"action.php?delete={$value['u_id']}\">Delete</td>
                                               </tr>";
                                           }

															 ?>


														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									<div class="col-sm-8">
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
																	<i class="ace-icon fa fa-caret-right blue"></i>User name
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Title
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Date
																</th>
																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Action
																</th>
															</tr>
														</thead>

														<tbody>
															<?php
															$stmt = $conn->prepare("SELECT * FROM upload WHERE up_status= 0 ORDER BY up_date  ");
																	$stmt->execute();
																	foreach ($stmt->fetchAll() as $value) {
																		echo "<tr>

																			<td>
																				<b class=\"green\">{$value['u_id']}</b>
																			</td>
																			<td>{$value['up_title']}</td>
																			<td>{$value['up_date']}</td>
																			<td><a href=\"master_view.php?pid={$value['up_id']}\" target=\"_blank\"> View</a> &nbsp; &nbsp;
																			    <a href=\"action.php?approve={$value['up_id']}\"> Approve</a> &nbsp; &nbsp;
                                                                                                                                                            <a <a href=\"action.php?del={$value['up_id']}\">Delete</td>
																		</tr>";
																	}
															 ?>


														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<?php include 'footer.php'; ?>
