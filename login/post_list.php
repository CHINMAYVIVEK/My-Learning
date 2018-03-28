
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
					<li>
						<a href="dashboard.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="active">
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
							<li class="active">User Control</li>
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
							<h1>Total Approved Post</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
                                                                    <!-- User list-->
                                                                    
									<div class="col-xs-12">
                                                                            <!-- /.user list -->
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>

													<th>Title</th>
													<th>Author</th>
													<th class="hidden-480">Category</th>
													<th>Date</th>
                                                                                                        <th>Action</th>
												</tr>
											</thead>

											<tbody>
												<?php
												$stmt = $conn->prepare("SELECT * FROM upload, category,user "
                                                                                                        . "WHERE upload.up_status = 1"
                                                                                                        . " AND upload.cat_id = category.cat_id "
                                                                                                        . "AND upload.u_id = user.u_id");
														$stmt->execute();
	                       foreach ($stmt->fetchAll() as $value) {
																	 echo "<tr>  <td>
					 														<a href=\"#\">{$value['up_title']}</a>
					 													</td>
					 													<td>{$value['u_name']}</td>";
                                      													   echo"<td class=\"hidden-480\">{$value['cat_name']}</td>";
                                                                                                                                           echo"<td class=\"hidden-480\">{$value['up_date']}</td>";
																	  echo"	<td> <a href=\"master_view.php?pid={$value['up_id']}\" target=\"_blank\">view</a></td>
					 												</tr>

																				 ";
}

												 ?>


											</tbody>
										</table>
									</div>
                                                                   
                                                                    
                                                                    <!-- /.span -->
								</div><!-- /.row -->

								<div class="hr hr-18 dotted hr-double"></div>


							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'footer.php'; ?>
