<?php 
    require_once ("/var/www/html/classes/PDO.DB.class.php");

	include("/var/www/html/classes/Player.class.php");

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
		
		/*
		* Searchs for players by their first or last name
		*
		*/
		function searchPlayers($name){
			if($name !== " "){
			try{
				 $name = "%".$name."%";
						$data = array();
						   $stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, email, sport, persontype FROM players WHERE name LIKE :name"); 
						$stmt->bindParam(":name", $name, PDO::PARAM_STR, 150);    
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_CLASS,"Players");
						while($databaseProjects = $stmt->fetch()){
								$data[] = $databaseProjects;
						}
						return $data;
					}
					catch(PDOException $e){
						echo $e->getMessage();
						throw new Exception("Problem searching for players in the database.");
					}
			}
			else{
				header("Location: findProject.php");
			}
		}
		/**
		 * getUsersByRole() - returns an array of users from the database whose role matches that of the specified role
		 */
		function getPlayersByGender($gender){
			//echo $gender;
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT id, username, name, email, sport, persontype FROM players WHERE gender = :gender"); 
                $stmt->bindParam("gender",$gender,PDO::PARAM_STR);    
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($databaseUser);
				}
				//var_dump($data);
                return $data;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                throw new Exception("Problem getting players from database.");
            }
		}
		function getPlayersFromSearch($data=null){
            if($data != null && count($data) > 0){
                $html = "<div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Name</th><th>Sport</th><th>Role</th><th>Email</th></tr>";
                    foreach($data as $player){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$player[0]}'>{$player[1]}</a></td>
							<td>{$player[3]}</td>
							<td>{$player[4]}</td>
                            <td><a href='mailto:'{$player[2]}'>{$player[2]}</a></td>
                        </tr>\n";
					}
					$html .= "</table></div>";
				}
			}
			return $html;
		}

		function getPlayersAsTable($data=null){//$data=null
			//var_dump($data);
			//var_dump($player->getID());
            //$data = $this->getEverythingAsObjects("project", "Project");
            if($data != null && count($data) > 0){
                $html = "<div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Name</th><th>Sport</th><th>Role</th><th>Email</th></tr>";
                    foreach($data as $player){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getSport()}</td>
							<td>{$player->getPersonType()}</td>
                            <td><a href='mailto:'{$player->getEmail()}'>{$player->getEmail()}</a></td>
                        </tr>\n";
                    }
                }else{
                    $html .= "<tr><th>Player Name</th><th>Sport</th><th>Email</th></tr>";
                    foreach($data as $project){
                        $html .= "<tr>
                            <td>{$project->getProjectName()}</td>
                            <td>{$project->getProjectLead()}</td>
                            <td><a href='mailto:{$project->getEmail()}'>{$project->getEmail()}</a></td>
                            <td>{$project->getDescription()}</td>
        
                        </tr>";
                    }
                }
                $html .= "</table></div>";
            }else{
                $html = "<div id='body-main'><h2 class='errorMsg'>Error getting players</h2></div>";
            }
            return $html;
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
					case 'showcase1':
						$this->updateField('players', 'showcase1', $val, $id);
						break;
					case 'showcase2':
						$this->updateField('players', 'showcase2', $val, $id);
						break;
					case 'showcase3':
						$this->updateField('players', 'showcase3', $val, $id);
						break;
					case 'college':
						$this->updateField('players', 'college', $val, $id);
						break;
					case 'facebook':
						$this->updateField('players', 'facebook', $val, $id);
						break;
					case 'twitter':
						$this->updateField('players', 'twitter', $val, $id);
						break;
					case 'instagram':
						$this->updateField('players', 'instagram', $val, $id);
						break;
					case 'website':
						$this->updateField('players', 'website', $val, $id);
						break;
					case 'velocity':
						$this->updateField('players', 'velocity', $val, $id);
						break;
					case 'gpareq':
						$this->updateField('players', 'gpareq', $val, $id);
						break;
					case 'satactreq':
						$this->updateField('players', 'satactreq', $val, $id);
						break;
					case 'characteristics':
						$this->updateField('players', 'characteristics', $val, $id);
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

		function register($username, $hashed_password, $persontype){
			$data = [];
			$stmt = $this->dbConn->prepare("SELECT username, pass, id FROM players WHERE username = ?");
			$stmt->bindParam(1, $username, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
            while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) >= 1){
				return 0;
			}
			else{
				$query = "INSERT INTO players(username, pass, persontype) VALUES(:username, :pass, :persontype)"; 
				$stmt = $this->dbConn->prepare($query);
				$stmt->execute(array(":username"=>$username, ":pass"=>$hashed_password, ":persontype"=>$persontype));
				
				$info = $this->dbConn->prepare("SELECT username, id, persontype FROM players WHERE username = ?");
				$info->bindParam(1, $username, PDO::PARAM_STR);
				$info->execute();
				$info->setFetchMode(PDO::FETCH_CLASS,"Player");
            	while($databaseUser = $info->fetch()){
					$data[] = $databaseUser;
				}
				if((count($data)) == 1){
					$player = $data[0];
					$_SESSION['username'] = $player->getUsername();
					$_SESSION['id'] = $player->getId();
					$_SESSION['loggedIn'] = true;
					$_SESSION['persontype'] = $player->getPersonType();
					return 1;	
				}
			}
			
		}

		function getMyInfo($id){//profile.php
			$player = $this->getObjectById('players', 'Player', $id);
			$html = " ";
			//var_dump($player);
			if ($player != null && $player->getPersonType() == 'player') {
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
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='https://www.youtube.com/embed/{$player->getShowcase1()}'></iframe>
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='https://www.youtube.com/embed/{$player->getShowcase2()}'></iframe>
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='https://www.youtube.com/embed/{$player->getShowcase3()}'></iframe>
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
			else if ($player != null && $player->getPersonType() == 'coach') {
				$html .= "<div id='body-main'>
				<h2><a href='myinfo.php'><img src='assets/img/edit2.png'/ id='edit-img'></a> {$player->getName()} <span id='collegeh2'>{$player->getCollege()}</span></h2>
				<hr/>
				<div id='profile-area'>
				<figure>
					<img src='assets/img/userpictures/{$player->getProfileImage()}' alt='player picture' id='player-pic'>
					<figcaption></figcaption>
				</figure>
				<div id='info-box-container'>
				<div class='info-box'>
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
				";
			}
			return $html;
		}
		function getMyEditableInfo($id) {//myInfo.php
			$player = $this->getObjectByID('players', 'Player', $id);
			$html = " ";
			//var_dump($player);
			
			if ($player != null && $player->getPersonType() == 'player') {
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
								   placeholder = 'First and Last Name'
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
								   placeholder = 'example@example.com'
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
								   placeholder = 'Male or Female'
								   value='{$player->getGender()}' />
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
							<input type='text'
								   id = 'cellphone'
								   name= 'cellphone'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
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
								   placeholder = 'xxx-xxx-xxxx'
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
								   placeholder = 'Your Address'
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
								   placeholder = 'Your City'
								   value='{$player->getCity()}'
								   onclick='' />
						</p>
						<p>
						<label class='span' for='state'>State:* &nbsp;</label>
							<input type='text'
									id = 'state'
									name= 'state'
									size = '35'
									maxlength = '50'
									placeholder = 'Full Name ex. Alabama'
									value='{$player->getState()}'
									onclick='' />
						</p>
						<p>
						<label class='span'>Zip:* &nbsp; </label>
							<input type='text'
								   id = 'zip'
								   name= 'zip'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxxxx'
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
								   placeholder = 'Your Highschool'
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
								   placeholder = 'xxx'
								   value='{$player->getWeight()}'
								   onclick='' />
						</p>
						<label class='span'>Height*: &nbsp; </label>
						  	<input type='text'
								id = 'heightFeet'
								name= 'heighFeet'
								size = '15'
								maxlength = '5'
								placeholder = 'Feet'
								value='{$player->getHeightFeet()}'
								onclick='' />
						
							<input type='text'
								id = 'heightInches'
								name= 'heightInches'
								size = '15'
								maxlength = '5'
								placeholder = 'Inches'
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
								 placeholder = 'xxxx'
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
								   placeholder = 'Your Primary Position'
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
								   placeholder = 'Your Secondary Position'
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
								   placeholder = 'Your Travel Team'
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
								   placeholder = 'x.xx'
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
								   placeholder = 'xxx or xxxx'
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
								   placeholder = 'xxx'
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
								<span class='span'>Upload Video ( Showcase 1 ): &nbsp; </span>
								<input type='text' name='showcase1' id='showcase1' size = '35' maxlength = '50' value='www.youtube.com/watch?v={$player->getShowcase1()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 2 ): &nbsp; </span>
								<input type='text' name='showcase2' id=showcase2 size = '35' maxlength = '50' value='www.youtube.com/watch?v={$player->getShowcase2()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 3 ): &nbsp; </span>
								<input type='text' name='showcase3' id=showcase3 size = '35' maxlength = '50' value='www.youtube.com/watch?v={$player->getShowcase3()}'>
							</p>
						</div><!-- end of refs -->
						<hr/>
						<h3>References</h3>
						<div id='refs-container'>
						<div id='refs'>
						<p class='span'>Reference 1(Optional)</p>
							<p>
							  <!--  <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref1-name'
									   name = 'ref1Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
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
									   placeholder = 'example@example.con'
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
									   placeholder = 'xxx-xxx-xxxx'
									   value='{$player->getRef1Phone()}'
									   onclick='' />
							</p>
							</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Reference 2(Optional)</p>
							<p>
							  <!--  <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref2-name'
									   name = 'ref2Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
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
									   placeholder = 'example@example.com'
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
									   placeholder = 'xxx-xxx-xxxx'
									   value='{$player->getRef2Phone()}'
									   onclick='' />
							</p>
							</div><!-- end of refs -->
						
						<div id='refs'>
						<p class='span'>Reference 3(Optional)</p>
							<p>
							 <!--   <span class='span'>Name: &nbsp; </span> -->
								<input type='text'
									   id = 'ref3-name'
									   name = 'ref3Name'
									   size = '35'
									   maxlength = '50'
									   placeholder = 'First and Last Name'
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
									   placeholder = 'example@example.com'
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
									   placeholder = 'xxx-xxx-xxxx'
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
			else if ($player != null && $player->getPersonType() == 'coach') {
				$html .= "<div id='body-main'>
					<form id='player-form'
						  method = 'POST'
						  action= ''
						  onsubmit = '' 
						  enctype='multipart/form-data' >
						<h1>Coach Info</h1>
						<div id='refs-container'>
						<div id='refs'>
							<p>
							<p>Name:* &nbsp; </p>
								<input type='text'
								   id = 'name'
								   name= 'name'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'First and Last Name'
								   value='{$player->getName()}'
								   onclick='' />
							</p>
							<p>
							<p>College Name:* &nbsp; </p>
								<input type='text'
								   id = 'college'
								   name= 'college'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your College'
								   value='{$player->getCollege()}'
								   onclick='' />
							</p>
							<p>
							<p>Sport:* &nbsp; </p>
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
							 <p>Email:* &nbsp; </p> 
								<input type='email'
								   id = 'email'
								   name= 'email'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'example@example.com'
								   value='{$player->getEmail()}'
								   onclick='' />
							</p>
							<p>
							<p>Cell Phone:* &nbsp; </p>
								<input type='text'
								   id = 'cellphone'
								   name= 'cellphone'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
								   value='{$player->getCellPhone()}'
								   onclick='' />
							</p>
							<p>
							<p>Home Phone:* &nbsp; </p>
								<input type='text'
								   id = 'homephone'
								   name= 'homePhone'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
								   value='{$player->getHomePhone()}'
								   onclick='' />
							</p>
							<p>
							<p>Address:* &nbsp; </p>
								<input type='text'
								   id = 'address'
								   name= 'address'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your Address'
								   value='{$player->getAddress()}'
								   onclick='' />
							</p>
							<p>
							<p>City:* &nbsp; </p>
								<input type='text'
								   id = 'city'
								   name= 'city'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Your City'
								   value='{$player->getCity()}'
								   onclick='' />
							</p>
							<p>
							<p for='state'>State:* &nbsp;</p>
								<input type='text'
									id = 'state'
									name= 'state'
									size = '35'
									maxlength = '50'
									placeholder = 'Full Name ex. Alabama'
									value='{$player->getState()}'
									onclick='' />
							</p>
							<p>
							<p>Zip:* &nbsp; </p>
								<input type='text'
								   id = 'zip'
								   name= 'zip'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxxxx'
								   value='{$player->getZip()}'
								   onclick='' />
							</p>
							<p>
							<p>Twitter: &nbsp; </p>
								<input type='text'
								   id = 'twitter'
								   name= 'twitter'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Twitter Handle'
								   value='{$player->getTwitter()}'
								   onclick='' />
							</p>
							</div><!-- end of refs -->
							<div id='refs'>
							<p>
							<p>Instagram: &nbsp; </p>
								<input type='text'
								   id = 'instagram'
								   name= 'instagram'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'Instagram Handle'
								   value='{$player->getInstagram()}'
								   onclick='' />
							</p>
							<p>
							<p>Facebook: &nbsp; </p>
						  		<input type='text'
									id = 'facebook'
									name= 'facebook'
									size = '35'
									maxlength = '50'
									placeholder = 'Facebook Handle'
									value='{$player->getFacebook()}'
								 	onclick='' />
					  		</p>
							<p>
							<p>Your Sports Website: &nbsp; </p>
								<input type='text'
								   id = 'website'
								   name= 'website'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'http://example.com'
								   value='{$player->getWebsite()}'
								   onclick='' />
							</p>
							<p>
							<p>Preferred Athlete Characteristics: &nbsp; </p>
								<input type='text'
								   id = 'characteristics'
								   name= 'characteristics'
								   size = '35'
								   maxlength = '150'
								   placeholder = 'example, example, example'
								   value='{$player->getCharacteristics()}'
								   onclick='' />
							</p>
							<p>
							<p>Velocity: &nbsp; </p>
								<input type='text'
								   id = 'velocity'
								   name= 'velocity'
								   size = '35'
								   maxlength = '50'
								   placeholder = ''
								   value='{$player->getVelocity()}'
								   onclick='' />
							</p>
							<p>GPA Required: &nbsp; </p>
								<input type='text'
								   id = 'gpareq'
								   name= 'gpareq'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'x.xx'
								   value='{$player->getGpaReq()}'
								   onclick='' />
							</p>
							<p>SAT/ACT Required: &nbsp; </p>
								<input type='text'
								   id = 'satactreq'
								   name= 'satactreq'
								   size = '35'
								   maxlength = '5'
								   placeholder = 'xxx'
								   value='{$player->getSatAct()}'
								   onclick='' />
							</p>
							</div><!-- end of refs -->
							<div id='refs'>
							<p>
								<span class='span'>Upload Profile Picture: &nbsp; </span>
								<input type='file' name='profileImage' accept='image/*'>
							</p>
							</div><!-- end of refs -->
						</div>
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
