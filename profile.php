<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php $playerDB = new PlayerDB; $player = $playerDB->getObjectByID($_GET['id']); ?>

<?php include("assets/inc/populate_content_edit_forms.php"); ?>
<?php include("assets/inc/phpmailer_download_db.php"); ?>
<?php include("assets/inc/phpmailer_report_profile.php"); ?>

<?php include("assets/inc/delete_profile.php"); ?>
<?php include("assets/inc/handle_myinfo.php");?>

<?php include('assets/inc/header.inc.php'); ?>  

<script src="https://js.stripe.com/v3"></script>

            <div id='body-main'>
<?php  if($player != null && $player->getPersonType() == 'player'): ?>
				<div id='title-wrapper'>

	<?php if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id']): ?> 
                    <a href='myinfo.php'>Edit My Profile</a>
    <?php endif; ?>
                <h2 id='name'><?php echo $player->getName() ?></h2>
					<h3 id='hs'><?php echo $player->getHighschool() ?></h3>
				</div>
				<hr/>
				<div id='profile-area'>
				<figure>
					<img src='assets/img/userpictures/<?php echo $player->getProfileImage() ?>' alt='player picture' id='player-pic'>
					<form method='post' action='' onsubmit="alert('Profile Reported.');">
						<input type='text' name='playerid' value='<?php echo $player->getId()?>' id='hide'>
    					<input type='submit' name='report' value='Report this profile...'> 
					</form>
				</figure>
				<div id='info-box-container'>
				<div class='info-box' id='info-box-underline'>
					<h3>Player Info</h3>
						<ul>
							<?php //only show those elements which are not null ?>
							<?php if($player->getEmail() != null){ ?><li><span class='attributes'>Email:</span> <a href='mailto: <?php $player->getEmail() ?>'><?php echo $player->getEmail() ?></a></li><?php } ?>
							<?php if($player->getCity() != null){ ?><li><span class='attributes'>City:</span> <?php echo $player->getCity() ?></li><?php } ?>
							<?php if($player->getState() != null){ ?><li><span class='attributes'>State:</span> <?php echo $player->getState() ?></li><?php } ?>
							<?php if($player->getZip() != null){ ?><li><span class='attributes'>Zip:</span> <?php echo $player->getZip() ?></li><?php } ?>
							<?php if($player->getHighschool() != null){ ?><li><span class='attributes'>School:</span> <?php echo $player->getHighschool() ?></li><?php } ?>
							<?php if($player->getGradYear() != null){ ?><li><span class='attributes'>Graduation Year:</span> <?php echo $player->getGradYear() ?></li><?php } ?>
							<?php if($player->getGpa() != null){ ?><li><span class='attributes'>GPA:</span> <?php echo $player->getGpa() ?></li><?php } ?>
							<?php if($player->getSat() != null){ ?><li><span class='attributes'>SAT:</span> <?php echo $player->getSat() ?></li><?php } ?>
							<?php if($player->getAct() != null){ ?><li><span class='attributes'>ACT:</span> <?php echo $player->getAct() ?></li><?php } ?>
							<?php if($player->getMajor() != null){ ?><li><span class='attributes'>Intended Major:</span> <?php echo $player->getMajor() ?></li><?php } ?>
						</ul>
					</div><!-- end of .info-box -->
				<div class='info-box'>
					<h3>Sport Info</h3>
						<ul>
							<?php if($player->getSport() != null){ ?><li><span class='attributes'>Sport:</span> <?php echo $player->getSport() ?></li></li><?php } ?>
							<?php if($player->getPrimaryPosition() != null){ ?><li><span class='attributes'>Primary Position:</span> <?php echo $player->getPrimaryPosition() ?></li></li><?php } ?>
							<?php if($player->getSecondaryPosition() != null){ ?><li><span class='attributes''>Secondary Position:</span> <?php echo $player->getSecondaryPosition() ?></li></li><?php } ?>
							<?php if($player->getTravelTeam() != null){ ?><li><span class='attributes'>Travel Team:</span> <?php echo $player->getTravelTeam() ?></li></li><?php } ?>
							<?php if($player->getHeight() != null){ ?><li><span class='attributes'>Height:</span> <?php echo $player->getHeight() ?></li></li><?php } ?>
							<?php if($player->getWeight() != null){ ?><li><span class='attributes'>Weight:</span> <?php echo $player->getWeight() ?></li></li><?php } ?>
						</ul>
					</div> <!-- end of .info-box -->
				</div> <!-- end of info-box-container -->
				</div><!-- end of profile-area --> 
				<p id='com-prompt'>When you become committed to a college, please send us an email at <a href='kprestano@athleticprospects.com'>kprestano@athleticprospects.com</a></p>
				
	<?php if ($player->getShowcase1() != null || $player->getShowcase2() != null || $player->getShowcase3() != null){ ?>
				<hr/>
				<h3>Videos</h3>	
				<div id='videos'>	
		<?php if($player->getShowcase1() != null){ ?>
					<iframe id='ytplayer' allowfullscreen type='text/html' width='300' height='250' src='<?php echo $player->getShowcase1() ?>'></iframe>
		<?php  } if($player->getShowcase2() != null){ ?>
					<iframe id='ytplayer' allowfullscreen type='text/html' width='300' height='250' src='<?php echo $player->getShowcase2() ?>'></iframe>
		<?php  } if($player->getShowcase3() != null){ ?>
					<iframe id='ytplayer' allowfullscreen type='text/html' width='300' height='250' src='<?php echo $player->getShowcase3() ?>'></iframe>
		<?php  } ?>
				</div>
	<?php  } ?>
	<?php if($player->getRef1Name() != null || $player->getRef2Name() != null || $player->getRef3Name() != null){ ?>
				<hr/>
				<h3>References</h3>
				<div id='reference-container'>
			<?php if($player->getRef1Name() != null){ ?>
				<div class='references'>
					<ul>
						<li><span class='attributes'>Name:</span> <?php echo $player->getRef1Name() ?></li>
						<li><span class='attributes'>Job Title:</span> <?php echo $player->getRef1JobTitle() ?></li>
						<li><span class='attributes'>Email:</span> <a href='mailto:<?php echo $player->getRef1Email() ?>'><?php echo $player->getRef1Email() ?></a></li>
						<li><span class='attributes'>Phone:</span> <?php echo $player->getRef1Phone() ?></li>
					</ul>
				</div>
			<?php } ?>
			<?php if($player->getRef2Name() != null){ ?>
				<div class='references'>
					<ul>
						<li><span class='attributes'>Name:</span> <?php echo $player->getRef2Name() ?></li>
						<li><span class='attributes'>Job Title:</span> <?php echo $player->getRef2JobTitle() ?></li>
						<li><span class='attributes'>Email:</span> <a href='mailto:<?php echo $player->getRef2Email() ?>'><?php echo $player->getRef2Email() ?></a></li>
						<li><span class='attributes'>Phone:</span> <?php echo $player->getRef2Phone() ?></li>
					</ul>
				</div>
			<?php } ?>
			<?php if($player->getRef3Name() != null){ ?>
				<div class='references'>
						<ul>
							<li><span class='attributes'>Name:</span> <?php echo $player->getRef3Name() ?></li>
							<li><span class='attributes'>Job Title:</span> <?php echo $player->getRef3Jobtitle() ?></li>
							<li><span class='attributes'>Email:</span> <a href='mailto:<?php echo $player->getRef3Email() ?>'><?php echo $player->getRef3Email() ?></a></li>
							<li><span class='attributes'>Phone:</span> <?php echo $player->getRef3Phone() ?></li>
						</ul>
					</div>
			<?php } ?>
				</div> <!--end of #references-container -->
	<?php  } ?>
	<?php  if($player->getPersStatement() != null){ ?>
			<hr/>
			<div id='personal-statement'>
					<h3>Personal Statement</h3>
					<p><?php echo $player->getPersStatement() ?></p>
				</div>
	<?php  } ?>
<?php elseif($player != null && $player->getPersonType() == 'coach'): ?>
                <h2><a href='myinfo.php'><img src='assets/img/edit2.png'/ id='edit-img'></a> {$player->getName()} <span id='collegeh2'>{$player->getCollege()}</span></h2>
                <hr/>
                <div id='profile-area'>
                        <figure>
                            <img src='assets/img/userpictures/{$player->getProfileImage()}' alt='player picture' id='player-pic'>
                            <form method='post' action=''>
                                <input type='text' name='playerid' value='{$player->getId()}' id='hide'>
                                <input type='submit' name='report' value='Report this profile...'> 
                            </form>
                        </figure>
                    <div id='info-box-container'>
                        <div class='info-box' id='border-right'>
                            <h3>Coach Info</h3>
                            <ul>
                                <li><span class='attributes'>Sport:</span> {$player->getSport()}</li>
                                <li><span class='attributes'>Email:</span> <a href='{$player->getEmail()}'>{$player->getEmail()}</a></li>
                                <li><span class='attributes'>Cell Phone:</span> {$player->getCellPhone()}</li>
                                <li><span class='attributes'>Home Phone:</span> {$player->getHomePhone()}</li>
                                <li><span class='attributes'>Address:</span> {$player->getAddress()}</li>
                                <li><span class='attributes'>City:</span> {$player->getCity()}</li>
                                <li><span class='attributes'>State:</span> {$player->getState()}</li>
                                <li><span class='attributes'>Zip:</span> {$player->getZip()}</li>
                                <li><span class='attributes'>Twitter:</span> {$player->getTwitter()}</li>
                                <li><span class='attributes'>Instagram:</span> {$player->getInstagram()}</li>
                                <li><span class='attributes'>Facebook:</span> {$player->getFacebook()}</li>
                                <li><span class='attributes'>Sport Website:</span> <a href='http://{$player->getwebsite()}' target='_blank'>http://{$player->getwebsite()}</a></li>
                            </ul>
                        </div><!-- end of .info-box -->
                        <div class='info-box'>
                            <h3>Type of athlete ourprogram is looking for</h3>
                            <ul>
                                <li><span class='attributes'>Characteristics:</span> {$player->getCharacteristics()}</li>
                                <li><span class='attributes''>Velocity:</span> {$player->getVelocity()}</li>
                                <li><span class='attributes'>GPA Requirement:</span> {$player->getGpaReq()}</li>
                                <li><span class='attributes'>SAT/ACT Scores:</span> {$player->getSatAct()}</li>
                            </ul>
                        </div> <!-- end of .info-box -->
                    </div> <!-- end of info-box-container -->
                </div><!-- end of profile-area --> 
<?php elseif($player != null && $player->getPersonType() == 'admin' && $_SESSION['id'] == 1 || $player != null && $player->getPersonType() == 'admin' && $_SESSION['id'] == 2): ?>
					<script>
						window.onload = function() {
							$( "#tabs" ).tabs();
							$( "#edit-tabs" ).tabs();
						}
					</script>
					
					<div id='content'>
					<h2>Administration Panel</h2>
					<div id="tabs">
						<ul>
							<li><a href="#fragment-1" class="tab-headers">Post A Blog</a></li>
							<li><a href="#fragment-5" class="tab-headers">Edit Site Content</a></li>
							<li><a href="#fragment-2" class="tab-headers">Delete Profiles</a></li>
							<li><a href="#fragment-3" class="tab-headers">Download Database</a></li>
							<li><a href="#fragment-4" class="tab-headers">Pay For Webhosting</a></li>
						</ul>
						<div id="fragment-1">
							<h3>Blog Post</h3>
							<form	id='blog-form'
									class='admin-panel'
									method = 'POST'
									action= 'blog.php'
									onsubmit = '' 
									enctype='multipart/form-data' >
							<input type='text'
									id = 'title'
									name = 'title'
									size = '20'
									maxlength = '50'
									placeholder = 'Title'
									value=''
									onclick='' />
							<input type='text'
									id = 'tags'
									name = 'tags'
									size = '20'
									maxlength = '50'
									placeholder = 'Tags'
									value=''
									onclick='' />
							<textarea name='post' form='blog-form' col='50' row='10' style='resize:none' placeholder='Enter text here...'></textarea>
							<input type='submit'
									value='Submit Post'
									name = 'submit-post'
									class='btnSubmit'
									id='btn-post'/>
							</form>
						</div> <!-- fragment 1 -->
						<div id="fragment-2">
							<h3>Search for Player</h3>
							<div id='form-wrapper'>
								<form   id='player-form'
										class='admin-panel'
										method = 'POST'
										action= ''
										onsubmit = '' 
										enctype='multipart/form-data' >
									<input type='text'
											id = 'name'
											name = 'name'
											size = '20'
											maxlength = '50'
											placeholder = 'Full Name'
											value=''
											onclick='' />
									<select name='sport'>
										<option value=' ' selected disabled>Select Sport:</option>
										<option value='football'>Football</option>
										<option value='basketball'>Basketball</option>
										<option value='baseball'>Baseball</option>
										<option value='softball'>Softball</option>
										<option value='hockey'>Hockey</option>
										<option value='fieldhockey'>Field Hockey</option>
										<option value='lacrosse'>Lacrosse</option>
										<option value='soccer'>Soccer</option>
										<option value='trackandField'>Track and Field</option>
										<option value='volleyball'>Volleyball</option>
										<option value='wrestling'>Wrestling</option>
										<option value='tennis'>Tennis</option>
										<option value='swimming'>Swimming</option>
										<option value='golf'>Golf</option>
										<option value='gymnastics'>Gymnastics</option>
										<option value='cheerleading'>Cheerleading</option>
										<option value='esports'>Esports</option>
									</select>
									<select name='state'>
										<option value=' ' selected disabled>Select State:</option>
										<option value='New York'>New York</option>
										<option value='Alabama'>Alabama</option>
										<option value='Alaska'>Alaska</option>
										<option value='Arizona'>Arizona</option>
										<option value='rkansas'>Arkansas</option>
										<option value='California'>California</option>
										<option value='Colorado'>Colorado</option>
										<option value='Connecticut'>Connecticut</option>
										<option value='Delaware'>Delaware</option>
										<option value='District of columbia'>District Of Columbia</option>
										<option value='Florida'>Florida</option>
										<option value='Georgia'>Georgia</option>
										<option value='Hawaii'>Hawaii</option>
										<option value='Idaho'>Idaho</option>
										<option value='Illinois'>Illinois</option>
										<option value='Indiana'>Indiana</option>
										<option value='Iowa'>Iowa</option>
										<option value='Kansas'>Kansas</option>
										<option value='Kentucky'>Kentucky</option>
										<option value='Louisiana'>Louisiana</option>
										<option value='Maine'>Maine</option>
										<option value='Maryland'>Maryland</option>
										<option value='Massachusetts'>Massachusetts</option>
										<option value='Michigan'>Michigan</option>
										<option value='Minnesota'>Minnesota</option>
										<option value='Mississippi'>Mississippi</option>
										<option value='Missouri'>Missouri</option>
										<option value='Montana'>Montana</option>
										<option value='Nebraska'>Nebraska</option>
										<option value='Nevada'>Nevada</option>
										<option value='New Hampshire'>New Hampshire</option>
										<option value='New Jersey'>New Jersey</option>
										<option value='New Mexico'>New Mexico</option>
										<option value='New York'>New York</option>
										<option value='North Carolina'>North Carolina</option>
										<option value='North Dakota'>North Dakota</option>
										<option value='Ohio'>Ohio</option>
										<option value='Oklahoma'>Oklahoma</option>
										<option value='Oregon'>Oregon</option>
										<option value='Pennsylvania'>Pennsylvania</option>
										<option value='Rhode Island'>Rhode Island</option>
										<option value='South Carolina'>South Carolina</option>
										<option value='South Dakota'>South Dakota</option>
										<option value='Tennessee'>Tennessee</option>
										<option value='Texas'>Texas</option>
										<option value='Utah'>Utah</option>
										<option value='Vermont'>Vermont</option>
										<option value='Virginia'>Virginia</option>
										<option value='Washington'>Washington</option>
										<option value='West Virginia'>West Virginia</option>
										<option value='Wisconsin'>Wisconsin</option>
										<option value='Wyoming'>Wyoming</option>			
									</select>
									<select name='class'>
									<option value=' ' selected disabled>Class of:</option>
										<option value='2024'>2024</option>
										<option value='2023'>2023</option>
										<option value='2022'>2022</option>
										<option value='2021'>2021</option>
										<option value='2022'>2020</option>
										<option value='2019'>2019</option>
										<option value='2018'>2018</option>
										<option value='2017'>2017</option>
										<option value='2016'>2016</option>
										<option value='2015'>2015</option>
										<option value='2014'>2014</option>
										<option value='2013'>2013</option>
										<option value='2012'>2012</option>
										<option value='2011'>2011</option>
										<option value='2010'>2010</option>
									</select>
									<input type='text'
											id = 'position'
											name = 'position'
											size = '20'
											maxlength = '50'
											placeholder = 'Position'
											value=''
											onclick='' />
						
									<input type='text'
											id = 'school'
											name = 'school'
											size = '20'
											maxlength = '50'
											placeholder = 'School'
											value=''
											onclick='' />                    
									<select name='gpa'>
										<option value=' ' selected disabled>Select GPA:</option>
										<option value='4.5'>Greater than 4.5</option>
										<option value='4.0'>Greater than 4.0</option>
										<option value='3.5'>Greater than 3.5</option>
										<option value='3.0'>Greater than 3.0</option>
										<option value='2.5'>Greater than 2.5</option>
										<option value='2.0'>Greater than 2.0</option>
									</select>
									<input type='submit'
										value='Search'
										name = 'admin-search'
										class='btnSubmit'
										id='btn-Submit'/>
								</form>
								</div> <!-- end of form-wrapper -->
						</div> <!-- end of fragment 2 -->
						<div id="fragment-3" >
							<form action="" method='POST'>
							<input type='submit'
										value='Download Database'
										name = 'download-db'
										class='btnSubmit'
										id=''/>
							</form>
						</div> <!-- end of fragment 3 -->
						<div id="fragment-4">
							<!-- <form action="" method='POST'> -->
							<button style="background-color:#bb0a1e;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
  									id="checkout-button-plan_FJ7HouBZeAK4zB"
									class="btnSubmit"
  									role="link">
									Pay For Webhosting
							</button>
							<div id="error-message"></div>
		<script>
			var stripe = Stripe('pk_live_S2WeKKv4ANIOBSjI3FdXx5Uf00TTNsDx2j');

			var checkoutButton = document.getElementById('checkout-button-plan_FJ7HouBZeAK4zB');
			checkoutButton.addEventListener('click', function () {
				stripe.redirectToCheckout({
				items: [{plan: 'plan_FJ7HouBZeAK4zB', quantity: 1}],

				successUrl: window.location.protocol + '//www.athleticprospects.com/profile.php?id=2',
				cancelUrl: window.location.protocol + '//www.athleticprospects.com/profile.php?id=2',
				})
				.then(function (result) {
				if (result.error) {
					var displayError = document.getElementById('error-message');
					displayError.textContent = result.error.message;
				}
				});
			});
		</script>
						</div> <!-- end of fragment 4-->
						<div id="fragment-5">
							<div id="edit-tabs">
								<ul>
									<li><a href="#about-us" class="tab-headers">Edit About Us</a></li>
									<li><a href="#home-page" class="tab-headers">Edit Home Page</a></li>
								</ul>
								<div id="about-us">
									<form id='edit-about-us-form'
											class='edit-about-us'
											method = 'POST'
											action='about.php'
											enctype='multipart/form-data'>
											<h4>Section: About Us</h4>
										<input type='text'
											id = 'about-us-header'
											name = 'about-us-header'
											value='<?php echo $_SESSION['aboutUsHeader'] ?>'
											size = '20'
											maxlength = '50'
											placeholder = 'Header'/>
										<textarea name='about-us-content' form='edit-about-us-form' id='about-us-text' style='resize:none' col='50' row='10' placeholder='Enter text here...'><?php echo $_SESSION['aboutUsText'] ?></textarea>
										<input type='submit'
											value='Submit "About Us" Section'
											name = 'submit-about-us'
											class='btnSubmit'
											id='btn-about-us'/>
									</form>
								</div> <!-- end of about-us -->
								<div id="home-page">
									<form id='edit-home-page-form'
											class='edit-home-page'
											method = 'POST'
											action= 'index.php'
											enctype='multipart/form-data'>
										<h4>Section: Home Page</h4>
										<input type='text'
											id = 'home-page-header'
											name = 'home-page-header'
											value='<?php echo $_SESSION['homePageHeader'] ?>'
											size = '20'
											maxlength = '50'
											placeholder = 'Header' />
										<textarea name='home-page-content' form='edit-home-page-form' id='home-page-text' style='resize:none' col='50' row='10' placeholder='Enter text here...'><?php echo $_SESSION['homePageText'] ?></textarea>
										<input type='submit'
											value='Submit "Home Page" Section'
											name = 'submit-home-page'
											class='btnSubmit'
											id='btn-home-page'/>
									</form>
								</div> <!-- end of home-page -->
							</div> <!-- end of edit-tabs-->
						</div> <!-- end of fragment 5-->
					</div> <!-- end of #tabs -->
				<?php include("assets/inc/admin_search.php"); ?>
				</div><!-- end of #content -->
	<?php else: ?>
					<div id='profile-area'>
							<p>Restricted</p>
					</div>
<?php endif; ?>
<?php include("assets/inc/footer.inc.php"); ?>