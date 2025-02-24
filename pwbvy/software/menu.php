<div class="ch-container">
	<div class="row">
		<div class="col-sm-2 col-lg-2">
			<div class="sidebar-nav">
				<div class="nav-canvas">
					<div class="nav-sm nav nav-stacked">
					</div>
					<center><a href="https://pwbvyindia.org/public/assets/uploads/master/logo/logo.png">
							<img style="border-radius:25%; width: 100px;" src="https://pwbvyindia.org/public/assets/uploads/master/logo/logo.png">
							<!--<img style="border-radius:25%; width: 100px;" src="<?php echo (isset($_SESSION['user_detail']['image']) && $_SESSION['user_detail']['image'] != '') ? "profilepic/" . $_SESSION['user_detail']['image'] : 'https://helplifefoundation.org.in/images/helplifefoundation-logo-2.png'; ?>" /><br />		-->
							<!--<?php echo $_SESSION['user_detail']['name']; ?>-->
						</a>
						<br />
					</center>
					<ul class="nav nav-pills nav-stacked main-menu">
						<li>
							<a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span>
									Dashboard</span></a>
						</li>

						<?php
						if ($_SESSION['user_detail']['user_type'] == 1) {
							?>
							<li class="accordion">
								<a href="#"><i class="glyphicon glyphicon-plus"></i><span>Registration Manger</span></a>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="reg.php">Registration Manager</a></li>
								</ul>
							</li>
						<?php } ?>
					</ul>
					<label id="for-is-ajax" for="is-ajax" style="text-align:center">Navigation Bar</label>
				</div>
			</div>
		</div>