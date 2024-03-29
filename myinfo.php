<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include_once ("classes/Player.PDO.Class.php"); ?>
<?php include('assets/inc/info_arrays.php'); ?>
<?php 

$playerDB = new PlayerDB; 
$player = $playerDB->getObjectByID($_SESSION['id']);
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    if (isset($_GET['logout'])) {
        $playerDB->logout();
    }
}
?>
<?php include('assets/inc/header.inc.php'); ?>
<script>
$(document).ready(function(){
  //$(selector).inputmask("99-9999999");  //static mask
  $('#cellphone').inputmask({"mask": "(999) 999-9999"}); //specifying options
  $('#homephone').inputmask({"mask": "(999) 999-9999"}); //specifying options
  $('#ref1-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
  $('#ref2-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
  $('#ref3-phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
  //$(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax
});
</script>
                <div id='body-main'>
<?php if($player != null && $player->getPersonType() == "player"){ ?>
					<form id='player-form'
						  method = 'POST'
						  action= 'profile.php?id=<?php echo $player->getId();?>'
						  onsubmit = '' 
						  enctype='multipart/form-data' >
						<h1>Player Info</h1>
						<div id='refs-container'>
						<p>
						<label class='span'>Name:* &nbsp; </label> 
							<input type='text'
								   id = 'name'
								   name= 'name'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'First and Last Name'
								   value='<?php echo $player->getName(); ?>'
								   required >
						</p>
						<p>
						 <label class='span'>Email:* &nbsp; </label> 
							<input type='email'
								   id = 'email'
								   name= 'email'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'example@example.com'
								   value='<?php echo $player->getEmail();?>'
								   required >
						</p>
						<p>
						<label class='span'>Gender:* &nbsp; </label> 
							<select name='gender' required>
								<option value=' ' selected disabled>Select Gender:</option>
								<option <?php if($player->getGender() == "Male"){echo "selected";} ?> value='Male'>Male    </option>
								<option <?php if($player->getGender() == "Female"){echo "selected";} ?> value='Female'>Female  </option>
							</select>
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
							<input type='tel'
								   id = 'cellphone'
								   name= 'cellPhone'
								   class= "masked"
								   size = '35'
								   maxlength = '50'
								   placeholder = '(xxx) xxx-xxxx'
								   value='<?php echo $player->getCellPhone();?>'
								   required >
						</p>
						<p>
						<label class='span'>Home Phone:* &nbsp; </label>
							<input type='tel'
								   id = 'homephone'
								   name= 'homePhone'
								   class= "masked"
								   size = '35'
								   maxlength = '50'
								   placeholder = '(xxx) xxx-xxxx'
								   value='<?php echo $player->getHomePhone();?>'
								   required >
						</p>
						<p>
						<label class='span'>Address:* &nbsp; </label>
							<input type='text'
								   id = 'address'
								   name= 'address'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Address'
								   value='<?php echo $player->getAddress()?>'
								   required >
						</p>
						<p>
						<label class='span'>City:* &nbsp; </label>
							<input type='text'
								   id = 'city'
								   name= 'city'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your City'
								   value='<?php echo $player->getCity()?>'
								   required >
						</p>
						<p>
						<label class='span' for='state'>State:* &nbsp;</label>
							<select name='state' required>
                                <option value=' ' selected disabled>Select State:</option>
<?php foreach($states as $value){ ?>
                                <option <?php if($player->getState() == $value){echo "selected";} ?> value=<?php echo "'".$value."'" ?>><?php echo $value?></option>
<?php } ?>
							</select>
						</p>
						<p>
						<label class='span'>Zip:* &nbsp; </label>
							<input type='text'
								   id = 'zip'
								   name= 'zip'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxxxx'
								   value='<?php echo $player->getZip()?>'
								   required >
						</p>
						<p>
						<label class='span'>School:* &nbsp; </label>
							<input type='text'
								   id = 'highschool'
								   name= 'highschool'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your School'
								   value='<?php echo $player->getHighschool()?>'
								   required >
						</p>
						<p>
						<label class='span'>Weight:* &nbsp; </label>
							<input type='text'
								   id = 'weight'
								   name= 'weight'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx'
								   value='<?php echo $player->getWeight()?>'
								   required >
						</p>
						<p>
						<label class='span'>Height*: &nbsp; </label>
						<select name='height' required>
                            <option value='' selected disabled>Select height:</option>
<?php foreach($heights as $value){ ?>
                            <option <?php if($player->getHeight() == $value){echo "selected";}?> value=<?php echo "'".$value."'" ?>><?php echo $value ?></option>
<?php } ?>
						</select>
						</p>
						<p>
						<label class='span'>Graduation Year*: &nbsp; </label>
						  <input type='text'
								 id = 'grad-year'
								 name= 'gradYear'
								 size = '35'
								 maxlength = '50'
								 placeholder = 'xxxx'
								 value='<?php echo $player->getGradYear()?>'
								 required >
						</p>
						<div>
						<p>
							<label class='span'>Sport*: &nbsp; </label>
							<select name='sport' required autocomplete="off">
                                <option value=' ' selected disabled>Select Sport:</option>
<?php foreach($sports as $key=>$value){ ?>
                                <option <?php if($player->getSport() == $value){echo "selected ";}?>value=<?php echo "'".$key."'" ?> ><?php echo $value ?></option>
<?php } ?>
							</select>
						</p>
						</div>
						<p>
						<label class='span'>Primary Position:* &nbsp; </label>
							<input type='text'
								   id = 'primary-position'
								   name= 'primaryPosition'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Primary Position'
								   value='<?php echo $player->getPrimaryPosition()?>'
								   required >
						</p>
						<p>
						<label class='span'>Secondary Position:* &nbsp; </label>
							<input type='text'
								   id = 'secondary-position'
								   name= 'secondaryPosition'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Secondary Position'
								   value='<?php echo $player->getSecondaryPosition()?>'
								   required >
						</p>
						<p>
						<label class='span'>Travel Team:* &nbsp; </label>
							<input type='text'
								   id = 'travel-team'
								   name= 'travelTeam'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Travel Team'
								   value='<?php echo $player->getTravelTeam()?>'
								   required >
						</p>
						<p>
						<label class='span'>GPA:* &nbsp; </label>
							<input type='text'
								   id = 'gpa'
								   name= 'gpa'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'x.xx'
								   value='<?php echo $player->getGpa()?>'
								   required >
						</p>
						<p>
						<label class='span'>SAT: &nbsp; </label>
							<input type='text'
								   id = 'sat'
								   name= 'sat'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx or xxxx'
								   value='<?php echo $player->getSat()?>'
								    >
						</p>
						<p>
						<label class='span'>ACT: &nbsp; </label>
							<input type='text'
								   id = 'act'
								   name= 'act'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx'
								   value='<?php echo $player->getAct()?>'
								    >
						</p>
						<p>
						<label class='span'>Intended Major*: &nbsp; </label>
							<input type='text'
								   id = 'major'
								   name= 'major'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='<?php echo $player->getMajor()?>'
								   required >
						</p>
						<p>
						<label class='span'>Instagram: &nbsp; </label>
							<input type='text'
								   id = 'instagram'
								   name= 'instagram'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='<?php echo $player->getInstagram()?>'
								    >
						</p>
						<p>
						<label class='span'>Twitter: &nbsp; </label>
							<input type='text'
								   id = 'twitter'
								   name= 'twitter'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='<?php echo $player->getTwitter()?>'
								    >
						</p>
						<p>
						<label class='span'>Commitment: &nbsp; </label>
							<input type='text'
								   id = 'commitment'
								   name= 'commitment'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='<?php echo $player->getCommitment()?>'
								    >
						</p>
					</div>
						<hr/>
						<h3>Player Image and Video</h3>
						<div id='refs'>
							<p>
								<span class='span'>Upload Player Profile Picture: &nbsp; </span>
								<input type='file' name='profileImage' accept='image/*'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 1 ): &nbsp; </span>
								<input type='text' name='showcase1' id='showcase1' class='showcase' size = '35' maxlength = '50' value=<?php echo $player->getShowcase1()?>>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 2 ): &nbsp; </span>
								<input type='text' name='showcase2' id='showcase2' class='showcase' size = '35' maxlength = '50' value=<?php echo $player->getShowcase2()?>>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 3 ): &nbsp; </span>
								<input type='text' name='showcase3' id='showcase3' class='showcase' size = '35' maxlength = '50' value=<?php echo $player->getShowcase3()?>>
							</p>
						</div><!-- end of refs -->
						<hr/>
						<h3>References</h3>
						<div id='refs-container'>
						<div id='refs'>
						<p class='span'>Reference 1</p>
							<p>
							  <!--  <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-name'
									   name = 'ref1Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php echo $player->getRef1Name()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-job-title'
									   name = 'ref1JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Job Title'
									   value='<?php echo $player->getRef1JobTitle()?>'
									    >
							</p>
							<p>
							 <!--   <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref1-email'
									   name = 'ref1Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.con'
									   value='<?php echo $player->getRef1Email()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-phone'
									   name = 'ref1Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxxxxxxxxx'
									   value='<?php echo $player->getRef1Phone()?>'
									    >
							</p>
							</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Reference 2</p>
							<p>
							  <!--  <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-name'
									   name = 'ref2Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php echo $player->getRef2Name()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-job-title'
									   name = 'ref2JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Job Title'
									   value='<?php echo $player->getRef2JobTitle()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref2-email'
									   name = 'ref2Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.com'
									   value='<?php echo $player->getRef2Email()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-phone'
									   name = 'ref2Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxxxxxxxxx'
									   value='<?php echo $player->getRef2Phone()?>'
									    >
							</p>
							</div><!-- end of refs -->
						
						<div id='refs'>
						<p class='span'>Reference 3</p>
							<p>
							 <!--   <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-name'
									   name = 'ref3Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
									   value='<?php echo $player->getRef3Name()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-job-title'
									   name = 'ref3JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Job Title'
									   value='<?php echo $player->getRef3JobTitle()?>'
									    >
							</p>
							<p>
							  <!--  <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref3-email'
									   name = 'ref3Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'example@example.com'
									   value='<?php echo $player->getRef3Email()?>'
									    >
							</p>
							<p>
								<!-- <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-phone'
									   name = 'ref3Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'xxxxxxxxxx'
									   value='<?php echo $player->getRef3Phone()?>'
									    >
							</p>
							
						</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Personal Statement: &nbsp; </p>
						<p>
						  <textarea placeholder='Personal Statement...' rows='4' cols='150' id='textarea' name='persStatement' form='player-form'><?php echo $player->getPersStatement()?></textarea>
					  	</p>  
						  </div>
					</div><!-- end of test-container -->
						<input type='submit'
							   value='Update My Info'
							   name = 'updateUserInfo'
							   class='btn-all-buttons'
							   id='btnSubmit'
							   onClick='' />
				</form>
				<a href='passwordreset.php'>Reset my password>>></a>
<?php } else {?>
    <div id='cont' class='go-login'>
        <h3 id='nologin'>You must be logged in</h3>
        <a href='login.php' class='redirect-link'>Login</a>
    </div>
<?php } ?>
<?php include('assets/inc/footer.inc.php');?>