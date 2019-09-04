<?php include("config/pageconfig.php"); session_start(); error_reporting(0); 

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include('assets/inc/info_arrays.php'); ?>
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
                <h2 id='name'><?php echo $player->getName(); ?></h2>
					<h3 id='hs'><?php echo $player->getHighschool(); ?></h3>
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
			<?php if($_SESSION[id] == 1 || $_SESSION['id'] == 2){ ?>
							<?php if($player->getCellphone() != null){ ?><li><span class='attributes'>Cellphone:</span> <?php echo $player->getCellphone() ?></li><?php } ?>
							<?php if($player->getHomephone() != null){ ?><li><span class='attributes'>Homephone:</span> <?php echo $player->getHomephone() ?></li><?php } ?>
							<?php if($player->getAddress() != null){ ?><li><span class='attributes'>Address:</span> <?php echo $player->getAddress() ?></li><?php } ?>
			<?php }?>				
							<?php if($player->getCity() != null){ ?><li><span class='attributes'>City:</span> <?php echo $player->getCity() ?></li><?php } ?>
							<?php if($player->getState() != null){ ?><li><span class='attributes'>State:</span> <?php echo $player->getState() ?></li><?php } ?>
							<?php if($player->getZip() != null){ ?><li><span class='attributes'>Zip:</span> <?php echo $player->getZip() ?></li><?php } ?>
							<?php if($player->getHighschool() != null){ ?><li><span class='attributes'>School:</span> <?php echo $player->getHighschool() ?></li><?php } ?>
							<?php if($player->getGradYear() != null){ ?><li><span class='attributes'>Graduation Year:</span> <?php echo $player->getGradYear() ?></li><?php } ?>
							<?php if($player->getGpa() != null){ ?><li><span class='attributes'>GPA:</span> <?php echo $player->getGpa() ?></li><?php } ?>
							<?php if($player->getSat() != null){ ?><li><span class='attributes'>SAT:</span> <?php echo $player->getSat() ?></li><?php } ?>
							<?php if($player->getAct() != null){ ?><li><span class='attributes'>ACT:</span> <?php echo $player->getAct() ?></li><?php } ?>
							<?php if($player->getMajor() != null){ ?><li><span class='attributes'>Intended Major:</span> <?php echo $player->getMajor() ?></li><?php } ?>
			<?php if($_SESSION[id] == 1 || $_SESSION['id'] == 2){ ?>
							<?php if($player->getInstagram() != null){ ?><li><span class='attributes'>Instagram:</span> <?php echo $player->getInstagram() ?></li><?php } ?>
							<?php if($player->getTwitter() != null){ ?><li><span class='attributes'>Twitter:</span> <?php echo $player->getTwitter() ?></li><?php } ?>
			<?php }?>
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
							var index = 'admin-active-tab';
							//  Define friendly data store name
							var dataStore = window.sessionStorage;
							var oldIndex = 0;
							//  Start magic!
							try {
								// getter: Fetch previous value
								oldIndex = dataStore.getItem(index);
							} catch(e) {}
							$( "#tabs" ).tabs({
								active: oldIndex,
								activate: function(event, ui) {
									//  Get future value
									var newIndex = ui.newTab.parent().children().index(ui.newTab);
									//  Set future value
									try {
										dataStore.setItem( index, newIndex );
									} catch(e) {}
								}
							}
							);
							$( "#edit-tabs" ).tabs();
						}
					</script>
					
					<div id='content'>
					<h2>Administration Panel</h2>
					<div id="tabs">
						<ul>
							<li><a href="#fragment-1" class="tab-headers">Post A Blog</a></li>
							<li><a href="#fragment-2" class="tab-headers">Edit Site Content</a></li>
							<li><a href="#fragment-3" class="tab-headers">Edit a Player Profile</a></li>
							<li><a href="#fragment-4" class="tab-headers">Delete Profiles</a></li>
							<li><a href="#fragment-5" class="tab-headers">Download Database</a></li>
							<li><a href="#fragment-6" class="tab-headers">Pay For Web Development</a></li>
						</ul>
						<div id="fragment-1">
							<h3>Blog Post</h3>
							<form	id='blog-form'
									class='admin-panel'
									method = 'POST'
									action= 'blog.php'
									onsubmit = '' 
									enctype='multipart/form-data' >
								<span class='span'>Title: &nbsp; </span>
								<input type='text'
										id = 'title'
										name = 'title'`
										size = '20'
										maxlength = '50'
										placeholder = ''
										value=''
										onclick='' />
								<span class='span'>Tags: &nbsp; </span>
								<input type='text'
										id = 'tags'
										name = 'tags'
										size = '20'
										maxlength = '50'
										placeholder = ''
										value=''
										onclick='' />
								<span class='span'>YouTube Video Link: &nbsp; </span>
								<input type='text' name='blog-youtube' id='blog-youtube' class='showcase' size = '35' maxlength = '50' >
								<span class='span'>Upload Blog Image: &nbsp; </span>
								<input type='file' name='blogImage' accept='image/*'>
								<textarea name='post' form='blog-form' col='50' row='10' style='resize:none' placeholder='Enter text here...'></textarea>
								<input type='submit'
										value='Submit Post'
										name = 'submit-post'
										class='btnSubmit'
										id='btn-post'/>
							</form>
						</div> <!-- fragment 1 -->
						<div id="fragment-2">
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
						</div> <!-- end of fragment 2-->
						<div id="fragment-3">
						<script>
							$(document).ready(function(){
							//input masking for phone numbers
							$('#cellphone').inputmask({"mask": "(999) 999-9999"}); //specifying options
							$('#homephone').inputmask({"mask": "(999) 999-9999"}); //specifying options
							$('#ref1-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
							$('#ref2-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
							$('#ref3-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
							});
						</script>
							<h3>Edit Player Profile</h3>
							<form	id='edit-player-form'
									class='admin-panel'
									method = 'POST'
									action= 'profile.php?id=<?php echo $player->getId();?>'
									onsubmit = '' 
									enctype='multipart/form-data' >
								<div id="edit-player-profile">
									<select name='playerid'>
										<option value=' ' selected disabled>Select Player:</option>
							<?php $ids = $playerDB->getPlayerNamesForAdmin(); 
								$sel = "";
								foreach($ids as $value){
									echo "<option value='{$value->getId()}'>{$value->getName()}</option>";
								}
							?>
									</select>
									<input type='submit'
										value='Get Player Info'
										name = 'get-player-info'
										class='btnSubmit'
										id='btn-post'/>
								</div>
<?php

if(isset($_POST['get-player-info'])){
	$info = $playerDB->getObjectByID($_POST['playerid']);
	//$_POST['id'] = $info->getId();
}
?>
							<input type='text'
									id = 'hiddenid'
									name = 'id'
									size = '20'
									maxlength = '50'
									placeholder = 'id'
									readonly
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getId();} ?>'
									onclick='' />
							<span class='span'>Name: &nbsp; </span>
							<input type='text'
									id = 'name'
									name = 'name'
									size = '20'
									maxlength = '50'
									placeholder = 'Name'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getName();} ?>'
									onclick='' />
							<span class='span'>Email: &nbsp; </span>
							<input type='text'
									id = 'email'
									name = 'email'
									size = '20'
									maxlength = '50'
									placeholder = 'Email'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getEmail();} ?>'
									onclick='' />
							<span class='span'>Gender: &nbsp; </span>
							<select name='gender' >
								<option value=' ' selected disabled>Select Gender:</option>
								<option <?php if(isset($_POST['get-player-info']) && $info->getGender() == "Male"){echo "selected";} ?> value='Male'>Male    </option>
								<option <?php if(isset($_POST['get-player-info']) && $info->getGender() == "Female"){echo "selected";} ?> value='Female'>Female  </option>
							</select>
							<span class='span'>Cell Phone: &nbsp; </span>
							<input type='text'
									id = 'cellphone'
									name = 'cellPhone'
									size = '20'
									maxlength = '50'
									placeholder = 'Cell Phone'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getCellPhone();} ?>'
									onclick='' />
							<span class='span'>Home Phone: &nbsp; </span>
							<input type='text'
									id = 'homephone'
									name = 'homePhone'
									size = '20'
									maxlength = '50'
									placeholder = 'Home Phone'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getHomePhone();} ?>'
									onclick='' />
							<span class='span'>Address: &nbsp; </span>
							<input type='text'
									id = 'address'
									name = 'address'
									size = '20'
									maxlength = '50'
									placeholder = 'Address'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getAddress();} ?>'
									onclick='' />
							<span class='span'>City: &nbsp; </span>
							<input type='text'
									id = 'city'
									name = 'city'
									size = '20'
									maxlength = '50'
									placeholder = 'City'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getCity();} ?>'
									onclick='' />
							<span class='span'>State: &nbsp; </span>
							<select name='state' >
                                <option value=' ' selected disabled>Select State:</option>
<?php foreach($states as $value){ ?>
                                <option <?php if(isset($_POST['get-player-info']) && $info->getState() == $value){echo "selected";} ?> value=<?php echo "'".$value."'" ?>><?php echo $value?></option>
<?php } ?>
							</select>
							<span class='span'>Zip: &nbsp; </span>
							<input type='text'
									id = 'zip'
									name = 'zip'
									size = '20'
									maxlength = '50'
									placeholder = 'zip'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getZip();} ?>'
									onclick='' />
							<span class='span'>School: &nbsp; </span>
							<input type='text'
									id = 'highschool'
									name = 'highschool'
									size = '20'
									maxlength = '50'
									placeholder = 'School'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getHighschool();} ?>'
									onclick='' />
							<span class='span'>Graduation Year: &nbsp; </span>
							<input type='text'
									id = 'gradYear'
									name = 'gradYear'
									size = '20'
									maxlength = '50'
									placeholder = 'Graduation Year'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getGradYear();} ?>'
									onclick='' />
							<span class='span'>GPA: &nbsp; </span>
							<input type='text'
									id = 'gpa'
									name = 'gpa'
									size = '20'
									maxlength = '50'
									placeholder = 'GPA'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getGpa();} ?>'
									onclick='' />
							<span class='span'>SAT: &nbsp; </span>
							<input type='text'
									id = 'sat'
									name = 'sat'
									size = '20'
									maxlength = '50'
									placeholder = 'SAT'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getSat();} ?>'
									onclick='' />
							<span class='span'>ACT: &nbsp; </span>
							<input type='text'
									id = 'act'
									name = 'act'
									size = '20'
									maxlength = '50'
									placeholder = 'ACT'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getAct();} ?>'
									onclick='' />
									<span class='span'>Twitter: &nbsp; </span>
							<input type='text'
									id = 'twitter'
									name = 'twitter'
									size = '20'
									maxlength = '50'
									placeholder = 'Twitter'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getTwitter();} ?>'
									onclick='' />
									<span class='span'>Instagram: &nbsp; </span>
							<input type='text'
									id = 'instagram'
									name = 'instagram'
									size = '20'
									maxlength = '50'
									placeholder = 'Instagram'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getInstagram();} ?>'
									onclick='' />
							<span class='span'>Sport: &nbsp; </span>
							<select name='sport' autocomplete="off">
                                <option value=' ' selected disabled>Select Sport:</option>
<?php foreach($sports as $key=>$value){ ?>
                                <option <?php if(isset($_POST['get-player-info']) && $info->getSport() == $value){echo "selected ";}?>value=<?php echo "'".$key."'" ?> ><?php echo $value ?></option>
<?php } ?>
							</select>
							<span class='span'>Primary Position: &nbsp; </span>
							<input type='text'
									id = 'primaryPosition'
									name = 'primaryPosition'
									size = '20'
									maxlength = '50'
									placeholder = 'Primary Position'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getPrimaryPosition();} ?>'
									onclick='' />
							<span class='span'>Secondary Position: &nbsp; </span>
							<input type='text'
									id = 'secondaryPosition'
									name = 'secondaryPosition'
									size = '20'
									maxlength = '50'
									placeholder = 'Secondary Position'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getSecondaryPosition();} ?>'
									onclick='' />
							<span class='span'>Travel Team: &nbsp; </span>
							<input type='text'
									id = 'travelTeam'
									name = 'travelTeam'
									size = '20'
									maxlength = '50'
									placeholder = 'Travel Team'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getTravelTeam();} ?>'
									onclick='' />
							<span class='span'>Height: &nbsp; </span>
							<select name='height'>
                            <option value='' selected disabled>Select height:</option>
<?php foreach($heights as $value){ ?>
                            <option <?php if(isset($_POST['get-player-info']) && $info->getHeight() == $value){echo "selected";}?> value=<?php echo "'".$value."'" ?>><?php echo $value ?></option>
<?php } ?>
						</select>
							<span class='span'>Weight: &nbsp; </span>
							<input type='text'
									id = 'weight'
									name = 'weight'
									size = '20'
									maxlength = '50'
									placeholder = 'Weight'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getWeight();} ?>'
									onclick='' />
							<span class='span'>Major: &nbsp; </span>
							<input type='text'
									id = 'major'
									name = 'major'
									size = '20'
									maxlength = '50'
									placeholder = 'Major'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getMajor();} ?>'
									onclick='' />
							<span class='span'>Commitment: &nbsp; </span>
							<input type='text'
									id = 'commitment'
									name = 'commitment'
									size = '20'
									maxlength = '50'
									placeholder = 'Commitment'
									value='<?php if(isset($_POST['get-player-info'])){echo $info->getCommitment();} ?>'
									onclick='' />
							<span class='span'>Replace Player Profile Picture: &nbsp; </span>
							<input type='file' name='profileImage' accept='image/*'>
							
							<span class='span'>Upload Video ( Showcase 1 ): &nbsp; </span>
							<input type='text' name='showcase1' id='showcase1' class='showcase' size = '35' maxlength = '50' value=<?php if(isset($_POST['get-player-info'])){echo $info->getShowcase1();}?>>
							
							<span class='span'>Upload Video ( Showcase 2 ): &nbsp; </span>
							<input type='text' name='showcase1' id='showcase2' class='showcase' size = '35' maxlength = '50' value=<?php if(isset($_POST['get-player-info'])){echo $info->getShowcase2();}?>>
							
							<span class='span'>Upload Video ( Showcase 3 ): &nbsp; </span>
							<input type='text' name='showcase1' id='showcase3' class='showcase' size = '35' maxlength = '50' value=<?php if(isset($_POST['get-player-info'])){echo $info->getShowcase3();}?>>
							
							<!-- <textarea name='post' form='blog-form' col='50' row='10' style='resize:none' placeholder='Enter text here...'></textarea> -->
							<p class='span'>Reference 1</p>
							<span class='span'>Name: &nbsp; </span>
							<input type='text'
									   id = 'ref1-name'
									   name = 'ref1Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef1Name();;}?>'
									    >
							   <span class='span'>Job Title: &nbsp; </span>
								<input type='text'
									   id = 'ref1-job-title'
									   name = 'ref1JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Job Title'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef1JobTitle();}?>'
									    >
							   <span class='span'>Email: &nbsp; </span>
								<input type='email'
									   id = 'ref1-email'
									   name = 'ref1Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.con'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef1Email();}?>'
									    >
							   <span class='span'>Phone Number: &nbsp; </span>
								<input type='text'
									   id = 'ref1-phone'
									   name = 'ref1Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxx-xxx-xxxx'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef1Phone();}?>'
									    >
						<p class='span'>Reference 2</p>
							   <span class='span'>Name: &nbsp; </span>
								<input type='text'
									   id = 'ref2-name'
									   name = 'ref2Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef2Name();}?>'
									    >
							   <span class='span'>Job Title: &nbsp; </span>
								<input type='text'
									   id = 'ref2-job-title'
									   name = 'ref2JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Job Title'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef2JobTitle();}?>'
									    >
							   <span class='span'>Email: &nbsp; </span>
								<input type='email'
									   id = 'ref2-email'
									   name = 'ref2Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.com'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef2Email();}?>'
									    >
							   <span class='span'>Phone Number: &nbsp; </span>
								<input type='text'
									   id = 'ref2-phone'
									   name = 'ref2Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxx-xxx-xxxx'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef2Phone();}?>'
									    >
						<p class='span'>Reference 3</p>
							   <span class='span'>Name: &nbsp; </span>
								<input type='text'
									   id = 'ref3-name'
									   name = 'ref3Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef3Name();}?>'
									    >
							   <span class='span'>Job Title: &nbsp; </span>
								<input type='text'
									   id = 'ref3-job-title'
									   name = 'ref3JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Job Title'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef3JobTitle();}?>'
									    >
							   <span class='span'>Email: &nbsp; </span>
								<input type='email'
									   id = 'ref3-email'
									   name = 'ref3Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.com'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef3Email();}?>'
									    >
								<span class='span'>Phone Number: &nbsp; </span>
								<input type='text'
									   id = 'ref3-phone'
									   name = 'ref3Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxx-xxx-xxxx'
									   value='<?php if(isset($_POST['get-player-info'])){ echo $info->getRef3Phone();}?>'
									    >
								<input type='submit'
										value="Update This Player's Details"
										name='update-player-details'
										class='btnSubmit'
										id='btn-post'/>
							</form>
						</div> <!-- fragment 3 -->
						<div id="fragment-4">
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
						</div> <!-- end of fragment 4 -->
						<div id="fragment-5" >
							<form action="" method='POST'>
							<input type='submit'
										value='Download Database'
										name = 'download-db'
										class='btnSubmit'
										id=''/>
							</form>
						</div> <!-- end of fragment 5 -->
						<div id="fragment-6">
							<div id="variable-pay">
								<form action="" method='POST'>
									<label for="amount">Name of Feature You're Paying For:</label>
									<input type='text'
											id = 'featurename'
											name = 'featurename'
											size = '20'
											maxlength = '50'
											placeholder = 'e.g. Blog Redesign'
											value=''/> 
									<label for="amount">Amount to Pay:</label>
									<input type='text'
											id = 'amount'
											name = 'dollaramount'
											size = '20'
											maxlength = '50'
											placeholder = 'Dollar Amount'
											value=''/>  
									<input type='submit'
											value='Pay This Amount'
											name = 'pay'
											class='btnSubmit'
											id="pay"
											onclick=""/>
								</form>
							</div>
								<!-- <form action="" method='POST'> -->
								<button style="background-color:#bb0a1e;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
  									id="checkout-button-plan_FJ7HouBZeAK4zB"
									class="btnSubmit"
  									role="link">
									Pay For Webhosting($40/mo)
								</button>
							<div id="error-message"></div>
							<?php
require_once('vendor/autoload.php');
if(isset($_POST["pay"])){
	$dollaramount = 0;
	$featurename = "";
	try{
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey('sk_live_rESgN13voLaezuatjONWTwiM00KXVZVC6n');
		if(!empty($_POST["dollaramount"])){
			$dollaramount = $_POST["dollaramount"] * 100;
			$featurename = $_POST["featurename"];
			$session = \Stripe\Checkout\Session::create([
			'payment_method_types' => ['card'],
			'line_items' => [[
				'name' => $featurename,
				'amount' => $dollaramount,
				'currency' => 'usd',
				'quantity' => 1,
			]],
			'success_url' => 'https://www.athleticprospects.com/profile.php?id=2',
			'cancel_url' => 'https://www.athleticprospects.com/profile.php?id=2',
			]);
		}
		else{
			echo "<script>alert('Please enter a value greater than $0.50');</script>";
		}
		
	}
	catch(\Stripe\Error\InvalidRequest $e){
		
	}
	catch (Exception $e) {
		
	} 
	

?>
<script>
		var stripe2 = Stripe('pk_live_S2WeKKv4ANIOBSjI3FdXx5Uf00TTNsDx2j');
		stripe2.redirectToCheckout({
			sessionId: "<?php echo $session["id"]; ?>"
		}).then(function (result) {
			//console.log('error: ' + result.error.message);
		});
</script>
<?php
}//leave this. Makes the stripe integration here work
?>

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
						</div> <!-- end of fragment 6-->
					</div> <!-- end of #tabs -->
				<?php include("assets/inc/admin_search.php"); ?>
				</div><!-- end of #content -->
	<?php else: ?>
					<div id='profile-area'>
							<p>Restricted</p>
					</div>
<?php endif; ?>



<?php include("assets/inc/footer.inc.php"); ?>

<?php //var_dump($info) ?>