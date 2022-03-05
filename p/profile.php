<?php
include_once('../p/AdminHeader.php');
include_once('../app/class.php');
session_start();
$Employee_ID = $_SESSION['login'];


// print_r($Employee_ID);
?>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<?php

		include_once('../p/navbar.php');
		include_once('../p/AdminSidebar.php');
		?>


		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Profile Page</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<!-- YOU CAN"T DELETE THIS WHOLE CONTENT FROM THE TOP -->



			<!-- YOU CAN EDIT AND DELETE THIS WHOLE CONTENT -->
			<!-- Main content -->
			<section class="content">


				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Title</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
								<i class="fas fa-times"></i>
							</button>
						</div>
					</div>
					<div class="card-body">

						<!-- START OF PROFILE PAGE HTML -->
						<div class="container emp-profile">
							<?php
							$Account_ID = $_SESSION['login'];
							$getUsers = $pdo->prepare("SELECT * FROM users_tbl where Account_ID ='$Account_ID'");
							$getUsers->execute();
							$users = $getUsers->fetchAll();
							foreach ($users as $user) {

							?>

								<form method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-4 mb-5">
											<div class="profile-img">
												<img src="../dist/img/avatar4.png" alt="User">



												<input type="file" name="fileToUpload" id="fileToUpload" hidden>
												<input type="submit" value="Upload Image" name="submit">

											</div>
										</div>
								</form>
								<div class="col-md-6">
									<div class="profile-head">
										<h5>
											<?php $student->getFullName(); ?>
										</h5>
										<h6>
											RRM
										</h6>

										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
											</li>

										</ul>
									</div>
								</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="profile-work">
									<!--START OF BASIC INFO-->
									<h2 class="w-text-basicinfo">Basic&nbsp;information</h2>
									<div class="row">
										<div class="col-md-4">
											<label>Full&nbsp;Name</label>
										</div>
										<div class="col-md-4">
											<label><?php echo " $user[First_Name]"; ?> <?php echo " $user[Last_Name]"; ?></label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>Position</label>
										</div>
										<div class="col-md-4">
											<label><?php echo "$user[Position]"; ?></label>
										</div>
									</div>

								</div>
							</div>
							<!--END OF BASIC INFO-->


							<div class="col-md-8">
								<!--START OF PROFILE TAB-->
								<div class="tab-content profile-tab" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

										<div class="row">
											<div class="col-md-6">
												<label>Firstname</label>
											</div>
											<div class="col-md-6">
												<p> <?php echo "$user[First_Name]"; ?> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Last Name</label>
											</div>
											<div class="col-md-6">
												<p><?php echo "$user[Last_Name]"; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Position</label>
											</div>
											<div class="col-md-6">
												<p><?php echo "$user[Position]"; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Section</label>
											</div>
											<div class="col-md-6">
												<p><?php echo "$user[Section]"; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Email</label>
											</div>
											<div class="col-md-6">
												<p><?php echo "$user[Email]"; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Phone Number</label>
											</div>
											<div class="col-md-6">
												<p><?php echo "$user[ContactNumber]"; ?></p>
											</div>
										</div>

									</div>
									<!--END OF PROFILE TAB-->



								</div>
							</div>
						</div>

					</div>
				<?php

							} ?>

				<!-- END OF PROFILE PAGE HTML -->



				<!-- Start creating your amazing application! -->
				</div>

				<div class="card-footer">
					Footer
				</div>

		</div>


		</section>

	</div>
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
		</div>
	</aside>

	<?php

	include_once('../p/footer.php'); ?>