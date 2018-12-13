<?php 
    require_once "PDO.DB.class.php";

	include("Player.class.php");

	/*
	* UserDB class contains all of the methods for using PHP Data Objects to 
	* interface with the database, specifically in relation to users.
	* version 11/6/2018
	*/
    class PlayerDB extends DB{
        private $dbConn;
		/*
		* Constructor for UserDB calls the parent constructor and obtains the connection
		* using the connection accessor method. This will allow us to use methods in the parent class.
		*/
        function __construct(){
            parent::__construct();
            $this->dbConn = $this->getConn();
		}
		
		/**
		 * getUsersByRole() - returns an array of users from the database whose role matches that of the specified role
		 */
		function getUsersByRole($role){
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("select * from user where role = :role"); 
                $stmt->bindParam("role",$role,PDO::PARAM_INT);    
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"User");
                while($databaseUser = $stmt->fetch()){
                    $data[] = $databaseUser;
                }
                return $data;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                throw new Exception("Problem getting Project from database.");
            }
		}

		/**
		 * updateUser() - Takes in an associative array where the key is the field name and the value is the value to be updated for that field, then updates them
		 */
		function updateUser($updateArray){
			$id = '';
            foreach($updateArray as $key=>$val){
                switch($key){
                    case "id": // case will be the name of the form field the user types in
                        $id = $val;
						break;
					case 'username':
                        $this->updateField('players', 'username', $val, $id);
                        break;
                    case 'password':
                        $this->updateField('players', 'password', $val, $id);
                        break;
                    case 'name':
                        $this->updateField('players', 'name', $val, $id);
                        break;
                    case 'gender':
                        $this->updateField('players', 'gender', $val, $id);
						break;
					case 'email':
                        $this->updateField('players', 'email', $val, $id);
                        break;
                    case 'cellPhone':
                        $this->updateField('players', 'cellPhone', $val, $id);
                        break;
                    case 'homePhone':
                        $this->updateField('players', 'homePhone', $val, $id);
						break;		
					case 'address':
                    	$this->updateField('players', 'address', $val, $id);
                        break;
                    case 'city':
                        $this->updateField('players', 'city', $val, $id);
                        break;
                    case 'state':
                        $this->updateField('players', 'state', $val, $id);
						break;
					case 'zip':
						$this->updateField('players', 'zip', $val, $id);
						break;
					case 'highschool':
						$this->updateField('players', 'highschool', $val, $id);
						break;
					case 'weight':
						$this->updateField('players', 'weight', $val, $id);
						break;
					case 'heightFeet':
						$this->updateField('players', 'heightFeet', $val, $id);
						break;
					case 'heightInches':
						$this->updateField('players', 'heightInches', $val, $id);
						break;
					case 'gradYear':
						$this->updateField('players', 'gradYear', $val, $id);
						break;
					case 'sport':
						$this->updateField('players', 'sport', $val, $id);
						break;
					case 'primaryPosition':
						$this->updateField('players', 'primaryPosition', $val, $id);
						break;
					case 'secondaryPosition':
						$this->updateField('players', 'secondaryPosition', $val, $id);
						break;
					case 'travelTeam':
						$this->updateField('players', 'travelTeam', $val, $id);
						break;
					case 'gpa':
						$this->updateField('players', 'gpa', $val, $id);
						break;
					case 'sat':
						$this->updateField('players', 'sat', $val, $id);
						break;
					case 'act':
						$this->updateField('players', 'act', $val, $id);
						break;
					case 'ref1Name':
						$this->updateField('players', 'ref1Name', $val, $id);
						break;
					case 'ref1JobTitle':
						$this->updateField('players', 'ref1JobTitle', $val, $id);
						break;
					case 'ref1Email':
						$this->updateField('players', 'ref1Email', $val, $id);
						break;
					case 'ref1Phone':
						$this->updateField('players', 'ref1Phone', $val, $id);
						break;
					case 'ref2Name':
						$this->updateField('players', 'ref2Name', $val, $id);
						break;
					case 'ref2JobTitle':
						$this->updateField('players', 'ref2JobTitle', $val, $id);
						break;
					case 'ref2Email':
						$this->updateField('players', 'ref2Email', $val, $id);
						break;
					case 'ref2Phone':
						$this->updateField('players', 'ref2Phone', $val, $id);
						break;
					case 'ref3Name':
						$this->updateField('players', 'ref3Name', $val, $id);
						break;
					case 'ref3JobTitle':
						$this->updateField('players', 'ref3JobTitle', $val, $id);
						break;
					case 'ref3Email':
						$this->updateField('players', 'ref3Email', $val, $id);
						break;
					case 'ref3Phone':
						$this->updateField('players', 'ref3Phone', $val, $id);
						break;
					case 'persStatement':
						$this->updateField('players', 'persStatement', $val, $id);
						break;
					case 'commitment':
						$this->updateField('players', 'commitment', $val, $id);
						break;
					case 'service':
						$this->updateField('players', 'service', $val, $id);
						break;
					case 'profileImage':
						$this->updateField('players', 'profileImage', $val, $id);
						break;
                }
			}
		}

		/**
		 * login() - Takes in a possible username and password for a given user, checks them against the databas, returns a boolean if the user and password match 
		 * and false if they don't
		 */
		function login($username, $password){
				$data = array();
				//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				//$hashed_password = hash('sha256', $password);
				$stmt = $this->dbConn->prepare("SELECT username, pass, id FROM players WHERE username = ?"); 
				$stmt->bindParam(1, $username, PDO::PARAM_STR);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($data);
				}
				if((count($data)) == 1){
					$player = $data[0];
					//var_dump($data[0]);
					//$pass = $player->getPassword();
					//var_dump($player->getUsername());
					//var_dump($player->getPassword());
					if(password_verify($password, $player->getPassword())){
						$_SESSION['username'] = $player->getUsername();
						//$_SESSION['role'] = $user->getRole();
						$_SESSION['loggedIn'] = true;
						$_SESSION['fullname'] = $player->getName();
						$_SESSION['id'] = $player->getId();
						//echo "<p style=color:green;>success login</p>";
					}
					//true
					return 1;

				}
				//false
				return 0;
		}
		function getMyInfo($id){//profile.php
			$player = $this->getObjectByID('players', 'Player', $id);
			$html = " ";
			//var_dump($player);
			if ($player != null) {
				$html .= "<div id='body-main'>
				<h2><a href='myinfo.php'><img src='assets/img/edit2.png'/ id='edit-img'></a> {$player->getName()} {$player->getCommitment()}</h2>
				<hr/>
				<div id='profile-area'>
				<figure>
					<img src='assets/img/userpictures/{$player->getProfileImage()}' alt='player picture' id='player-pic'>
					<figcaption></figcaption>
				</figure>
				<div id='info-box-container'>
				<div class='info-box'>
					<h3>Player Info</h3>
					<ul>
						<li><span class='attributes'>Email:</span> {$player->getEmail()}</li>
						<li><span class='attributes'>Cell Phone:</span> {$player->getCellPhone()}</li>
						<li><span class='attributes'>Home Phone:</span> {$player->getHomePhone()}</li>
						<li><span class='attributes'>City:</span> {$player->getCity()}</li>
						<li><span class='attributes'>State:</span> {$player->getState()}</li>
						<li><span class='attributes'>Zip:</span> {$player->getZip()}</li>
						<li><span class='attributes'>Highschool:</span> {$player->getHighschool()}</li>
						<li><span class='attributes'>Graduation Year:</span> {$player->getGradYear()}</li>
						<li><span class='attributes'>GPA:</span> {$player->getGpa()}</li>
						<li><span class='attributes'>SAT:</span> {$player->getSat()}</li>
						<li><span class='attributes'>ACT:</span> {$player->getAct()}</li>
					</ul>
					</div><!-- end of .info-box -->
			<div class='info-box'>
				<h3>Sport Info</h3>
					<ul>
						<li><span class='attributes'>Sport:</span> {$player->getSport()}</li>
						<li><span class='attributes'>Primary Position:</span> {$player->getPrimaryPosition()}</li>
						<li><span class='attributes''>Secondary Position:</span> {$player->getSecondaryPosition()}</li>
						<li><span class='attributes'>Travel Team:</span> {$player->getTravelTeam()}</li>
						<li><span class='attributes'>Height:</span> {$player->getHeightFeet()}'{$player->getHeightInches()}</li>
						<li><span class='attributes'>Weight:</span> {$player->getWeight()}</li>
					</ul>
					</div> <!-- end of .info-box -->
			</div> <!-- end of info-box-container -->
			</div><!-- end of profile-area --> 
			<hr/>
			<h3>Videos</h3>
				<div id='videos'>
					<img src='https://via.placeholder.com/300x250'>
					<img src='https://via.placeholder.com/300x250'>
					<img src='https://via.placeholder.com/300x250'>
				</div>
			<h3>References</h3>
			<div id='reference-container'>
				<div class='references'>
				<ul>
					<li><span class='attributes'>Name:</span> {$player->getRef1Name()}</li>
					<li><span class='attributes'>Job Title:</span> {$player->getRef1JobTitle()}</li>
					<li><span class='attributes'>Email:</span> {$player->getRef1Email()}</li>
					<li><span class='attributes'>Phone:</span> {$player->getRef1Phone()}</li>
				</ul>
			</div>
			<div class='references'>
				<ul>
					<li><span class='attributes'>Name:</span> {$player->getRef2Name()}</li>
					<li><span class='attributes'>Job Title:</span> {$player->getRef2JobTitle()}</li>
					<li><span class='attributes'>Email:</span> {$player->getRef2Email()}</li>
					<li><span class='attributes'>Phone:</span> {$player->getRef2Phone()}</li>
				</ul>
			</div>
			<div class='references'>
				<ul>
					<li><span class='attributes'>Name:</span> {$player->getRef3Name()}</li>
					<li><span class='attributes'>Job Title:</span> {$player->getRef3JobTitle()}</li>
					<li><span class='attributes''>Email:</span> {$player->getRef3Email()}</li>
					<li><span class='attributes'>Phone:</span> {$player->getRef2Phone()}</li>
				</ul>
			</div>
		</div> <!--end of #references-container -->
		<hr/>
		<div id='personal-statement'>
			<h3>Personal Statement</h3>
			<p>{$player->getPersStatement()}</p>
		</div>
		";
			}
			return $html;
		}
		function getMyEditableInfo($id) {//myInfo.php
			$player = $this->getObjectByID('players', 'Player', $id);
			$html = " ";
			//var_dump($player);
			
			if ($player != null) {
				$html .= "<div id='body-main'>
					<form id='player-form'
						  method = 'POST'
						  action= ''
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
								   placeholder = 'Your Name*'
								   value='{$player->getName()}'
								   onclick='' />
						</p>
						<p>
						 <label class='span'>Email:* &nbsp; </label> 
							<input type='email'
								   id = 'email'
								   name= 'email'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Email*'
								   value='{$player->getEmail()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Gender:* &nbsp; </label> 
							<input type='text'
								   id = 'gender'
								   name= 'gender'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Gender'
								   value='{$player->getGender()}' />
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
							<input type='text'
								   id = 'cellphone'
								   name= 'cellphone'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Cellphone*'
								   value='{$player->getCellPhone()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Home Phone:* &nbsp; </label>
							<input type='text'
								   id = 'homephone'
								   name= 'homePhone'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Home Phone*'
								   value='{$player->getHomePhone()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Address:* &nbsp; </label>
							<input type='text'
								   id = 'address'
								   name= 'address'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Address*'
								   value='{$player->getAddress()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>City:* &nbsp; </label>
							<input type='text'
								   id = 'city'
								   name= 'city'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your City*'
								   value='{$player->getCity()}'
								   onclick='' />
						</p>
						<p>
						<label class='span' for='state'>State:* &nbsp;</label>
							<select id='state' name='state'>
								<option value='' disabled selected >Your State*</option>
								<option value='Alabama'{if ($player->getState() == 'Alabama') echo 'selected' }>Alabama</option>
								<option value='Alaska'>Alaska</option>
								<option value='Arizona'>Arizona</option>
								<option value='Arkansas'>Arkansas</option>
								<option value='California'>California</option>
								<option value='Colorado'>Colorado</option>
								<option value='Connecticut'>Connecticut</option>
								<option value='Delaware'>Delaware</option>
								<option value='District of Columbia'>District of Columbia</option>
								<option value='Florida'>Florida</option>
								<option value='Georgia'>Georgia</option>
								<option value='Guam'>Guam</option>
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
								<option value='Northern Marianas Islands'>Northern Marianas Islands</option>
								<option value='Ohio'>Ohio</option>
								<option value='Oklahoma'>Oklahoma</option>
								<option value='Oregon'>Oregon</option>
								<option value='Pennsylvania'>Pennsylvania</option>
								<option value='Puerto Rico'>Puerto Rico</option>
								<option value='Rhode Island'>Rhode Island</option>
								<option value='South Carolina'>South Carolina</option>
								<option value='South Dakota'>South Dakota</option>
								<option value='Tennessee'>Tennessee</option>
								<option value='Texas'>Texas</option>
								<option value='Utah'>Utah</option>
								<option value='Vermont'>Vermont</option>
								<option value='Virginia'>Virginia</option>
								<option value='Virgin Islands'>Virgin Islands</option>
								<option value='Washington'>Washington</option>
								<option value='West Virginia'>West Virginia</option>
								<option value='Wisconsin'>Wisconsin</option>
								<option value='Wyoming'>Wyoming</option>
							</select>
						</p>
						<p>
						<label class='span'>Zip:* &nbsp; </label>
							<input type='text'
								   id = 'zip'
								   name= 'zip'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Zip*'
								   value='{$player->getZip()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>High School:* &nbsp; </label>
							<input type='text'
								   id = 'highschool'
								   name= 'highschool'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Highschool*'
								   value='{$player->getHighschool()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Weight:* &nbsp; </label>
							<input type='text'
								   id = 'weight'
								   name= 'weight'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Weight*'
								   value='{$player->getWeight()}'
								   onclick='' />
						</p>
						<label class='span'>Height*: &nbsp; </label>
						  	<input type='text'
								id = 'heightFeet'
								name= 'heighFeet'
								size = '15'
								maxlength = '5'
								placeholder = 'Feet*'
								value='{$player->getHeightFeet()}'
								onclick='' />
						
							<input type='text'
								id = 'heightInches'
								name= 'heightInches'
								size = '15'
								maxlength = '5'
								placeholder = 'Inches*'
								value='{$player->getHeightInches()}'
								onclick='' />
						</p>
						<p>
						<label class='span'>Graduation Year*: &nbsp; </label>
						  <input type='text'
								 id = 'grad-year'
								 name= 'grad-year'
								 size = '35'
								 maxlength = '50'
								 placeholder = 'Your Graduation Year*'
								 value='{$player->getGradYear()}'
								 onclick='' />
					  </p>
						<p>
							<label class='span'>Sport:* &nbsp; </label>
								<input type='text'
									   	id = 'sport'
										name= 'sport'
										size = '35'
										maxlength = '50'
										placeholder = 'Football, Basketball, Esports, etc'
										value='{$player->getSport()}'
										onclick='' />
						</p>
						<p>
						<label class='span'>Primary Position:* &nbsp; </label>
							<input type='text'
								   id = 'primary-position'
								   name= 'primaryPosition'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Primary Position*'
								   value='{$player->getPrimaryPosition()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Secondary Position:* &nbsp; </label>
							<input type='text'
								   id = 'secondary-position'
								   name= 'secondaryPosition'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Secondary Position*'
								   value='{$player->getSecondaryPosition()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>Travel Team:* &nbsp; </label>
							<input type='text'
								   id = 'travel-team'
								   name= 'travelTeam'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Travel Team*'
								   value='{$player->getTravelTeam()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>GPA:* &nbsp; </label>
							<input type='text'
								   id = 'gpa'
								   name= 'gpa'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your GPA*'
								   value='{$player->getGpa()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>SAT: &nbsp; </label>
							<input type='text'
								   id = 'sat'
								   name= 'sat'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your SAT Score'
								   value='{$player->getSat()}'
								   onclick='' />
						</p>
						<p>
						<label class='span'>ACT: &nbsp; </label>
							<input type='text'
								   id = 'act'
								   name= 'act'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your ACT Score'
								   value='{$player->getAct()}'
								   onclick='' />
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
								<span class='span'>Upload Video(Showcase): &nbsp; </span>
								<input type='file' name='showcase-vid' accept='videos/*'>
							</p>
							<p>
								<span class='span'>Upload Video(Showcase): &nbsp; </span>
								<input type='file' name='showcase-vid' accept='videos/*'>
							</p>
							<p>
								<span class='span'>Upload Video(Showcase): &nbsp; </span>
								<input type='file' name='showcase-vid' accept='videos/*'>
							</p>
						</div><!-- end of refs -->
						<hr/>
						<h3>References</h3>
						<div id='refs-container'>
						<div id='refs'>
						<p class='span'>Reference 1(Optional)</p>
							<p>
							  <!--  <span class='span'>First Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-name'
									   name = 'ref1Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Name'
									   value='{$player->getRef1Name()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-job-title'
									   name = 'ref1JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Job Title'
									   value='{$player->getRef1JobTitle()}'
									   onclick='' />
							</p>
							<p>
							 <!--   <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref1-email'
									   name = 'ref1Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Email'
									   value='{$player->getRef1Email()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-phone'
									   name = 'ref1Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 1 Phone Number'
									   value='{$player->getRef1Phone()}'
									   onclick='' />
							</p>
							</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Reference 2(Optional)</p>
							<p>
							  <!--  <span class='span'>First Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-name'
									   name = 'ref2Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Name'
									   value='{$player->getRef2Name()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-job-title'
									   name = 'ref2JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Job Title'
									   value='{$player->getRef2JobTitle()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref2-email'
									   name = 'ref2Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Email'
									   value='{$player->getRef2Email()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-phone'
									   name = 'ref2Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 2 Phone Number'
									   value='{$player->getRef2Phone()}'
									   onclick='' />
							</p>
							</div><!-- end of refs -->
						
						<div id='refs'>
						<p class='span'>Reference 3(Optional)</p>
							<p>
							 <!--   <span class='span'>First Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-name'
									   name = 'ref3Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Name'
									   value='{$player->getRef3Name()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Job Title: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-job-title'
									   name = 'ref3JobTitle'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Job Title'
									   value='{$player->getRef3JobTitle()}'
									   onclick='' />
							</p>
							<p>
							  <!--  <span class='span'>Email: &nbsp; </span> -->
								<input type='email'
									   id = 'ref3-email'
									   name = 'ref3Email'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Email'
									   value='{$player->getRef3Email()}'
									   onclick='' />
							</p>
							<p>
								<!-- <span class='span'>Phone Number: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-phone'
									   name = 'ref3Phone'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'Reference 3 Phone Number'
									   value='{$player->getRef3Phone()}'
									   onclick='' />
							</p>
							
						</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Personal Statement: &nbsp; </p>
						<p>
						  <textarea placeholder='Personal Statement...' rows='4' cols='50' id='textarea' name='persStatement' form='player-form'>{$player->getPersStatement()}</textarea>
					  	</p>
						  <p class='servicelabel' for='service'>Choose Service</p>  
						<p>
					  	<select id='service' name='service'>
						  <option value='' disabled selected>Choose Service</option>
						  <option value='free'>Free Player Profile</option>
						  <option value='biweekly'>Bi-weekly recruiting checklist and articles - $100/per year</option>
						  <option value='mentor1yr'>Mentor Program 1 year - $1099</option>
						  <option value='mentor6mo'>Mentor Program 6 months - $650</option>
					  	</select>
						  </p>
						  </div>
					</div><!-- end of test-container -->
						<input type='submit'
							   value='Update My Info'
							   name = 'updateUserInfo'
							   class='btn-all-buttons'
							   id='btnSubmit'/>
				</form>
				</body>
    			<footer>
        			<div class='Footer'>
        			</div>
    			</footer>
			</html>
					\n";
				
			}
			return $html;
		}
	} // class
?>
