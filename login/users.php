
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
							<h1>Users list</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
                                                                    <!-- User list-->
                                                                    
									<div class="col-xs-6">
                                                                            <div class="page-header">
							                        <h1>Users list</h1>
						                            </div><!-- /.user list -->
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>

													<th>User NAme</th>
													<th>email</th>
													<th class="hidden-480">Level</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<?php
												$stmt = $conn->prepare("SELECT * FROM user WHERE u_level = 0");
														$stmt->execute();
	                       foreach ($stmt->fetchAll() as $value) {
																	 echo "<tr>
					                           <td>
					 														<a href=\"#\">{$value['u_name']}</a>
					 													</td>
					 													<td>{$value['u_email']}</td>";
                                      													   echo"<td class=\"hidden-480\">user</td>";
																	  echo"	<td>
					 														<div class=\"hidden-sm hidden-xs btn-group\">";
																			if ($value['u_status']==1) {
																				echo "<a class=\"btn btn-xs btn-success\" title=\"Click to deactivate\" 
                                                                                                                                                                    href=\"action.php?deactivate={$value['u_id']}\">
					 																<i class=\"ace-icon fa fa-check bigger-120\"></i>
					 															</a>";
																			}
																			if ($value['u_status']==0) {
																				echo "<a class=\"btn btn-xs btn-danger\" title=\"Click to activate\" 
                                                                                                                                                                    href=\"action.php?activate={$value['u_id']}\">
																					<i class=\"ace-icon fa fa-close bigger-120\"></i>
																				</a>";
																			}

					 														echo"<a class=\"btn btn-xs btn-danger\" title=\"Click to delete\" 
                                                                                                                                                            href=\"action.php?delete={$value['u_id']}\">
                                                                                                                                                            
					 																<i class=\"ace-icon fa fa-trash-o bigger-120\"></i> 
                                                                                                                                                                        
					 															</a>

					 														</div>

					 														<div class=\"hidden-md hidden-lg\">
					 															<div class=\"inline pos-rel\">
					 																<button class=\"btn btn-minier btn-primary dropdown-toggle\" data-toggle=\"dropdown\" data-position=\"auto\">
					 																	<i class=\"ace-icon fa fa-cog icon-only bigger-110\"></i>
					 																</button>

					 																<ul class=\"dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close\">
					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-info\" data-rel=\"tooltip\" title=\"View\">
					 																			<span class=\"blue\">
					 																				<i class=\"ace-icon fa fa-search-plus bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>

					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-success\" data-rel=\"tooltip\" title=\"Edit\">
					 																			<span class=\"green\">
					 																				<i class=\"ace-icon fa fa-pencil-square-o bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>

					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-error\" data-rel=\"tooltip\" title=\"Delete\">
					 																			<span class=\"red\">
					 																				<i class=\"ace-icon fa fa-trash-o bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>
					 																</ul>
					 															</div>
					 														</div>
					 													</td>
					 												</tr>

																				 ";
}

												 ?>


											</tbody>
										</table>
									</div>
                                                                   
                                                                    <!-- Admin List -->
                                                                    <div class="col-xs-6">
                                                                        <div class="page-header">
							                        <h1>Admin list</h1>
						                            </div><!-- /.user list -->
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>

													<th>User NAme</th>
													<th>email</th>
													<th class="hidden-480">Level</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<?php
												$stmt = $conn->prepare("SELECT * FROM user WHERE u_level = 1 ");
														$stmt->execute();
	                                                                                                foreach ($stmt->fetchAll() as $value) {
																	 echo "<tr>
					                                                                                                        <td>
					 														<a href=\"#\">{$value['u_name']}</a>
					 													</td>
					 													<td>{$value['u_email']}</td>";
                                                                                                                                         echo"<td class=\"hidden-480\">Admin</td>";
                                                                                                                                         echo"	
					 													<td>
					 														<div class=\"hidden-sm hidden-xs btn-group\">";
																			if ($value['u_status']==1) {
																				echo "<a class=\"btn btn-xs btn-success\" title=\"Click to deactivate\" 
                                                                                                                                                                    href=\"action.php?deactivate={$value['u_id']}\">
					 																<i class=\"ace-icon fa fa-check bigger-120\"></i>
					 															</a>";
																			}
																			if ($value['u_status']==0) {
																				echo "<a class=\"btn btn-xs btn-danger\" title=\"Click to activate\" 
                                                                                                                                                                    href=\"action.php?activate={$value['u_id']}\">
																					<i class=\"ace-icon fa fa-close bigger-120\"></i>
																				</a>";
																			}

					 														echo"<a class=\"btn btn-xs btn-danger\" title=\"Click to delete\" 
                                                                                                                                                            href=\"action.php?delete={$value['u_id']}\">
                                                                                                                                                            
					 																<i class=\"ace-icon fa fa-trash-o bigger-120\"></i> 
                                                                                                                                                                        
					 															</a>

					 														</div>

					 														<div class=\"hidden-md hidden-lg\">
					 															<div class=\"inline pos-rel\">
					 																<button class=\"btn btn-minier btn-primary dropdown-toggle\" data-toggle=\"dropdown\" data-position=\"auto\">
					 																	<i class=\"ace-icon fa fa-cog icon-only bigger-110\"></i>
					 																</button>

					 																<ul class=\"dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close\">
					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-info\" data-rel=\"tooltip\" title=\"View\">
					 																			<span class=\"blue\">
					 																				<i class=\"ace-icon fa fa-search-plus bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>

					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-success\" data-rel=\"tooltip\" title=\"Edit\">
					 																			<span class=\"green\">
					 																				<i class=\"ace-icon fa fa-pencil-square-o bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>

					 																	<li>
					 																		<a href=\"#\" class=\"tooltip-error\" data-rel=\"tooltip\" title=\"Delete\">
					 																			<span class=\"red\">
					 																				<i class=\"ace-icon fa fa-trash-o bigger-120\"></i>
					 																			</span>
					 																		</a>
					 																	</li>
					 																</ul>
					 															</div>
					 														</div>
					 													</td>
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
