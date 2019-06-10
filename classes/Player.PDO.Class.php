<?php 
    require_once ("classes/PDO.DB.class.php");

	include("classes/Player.class.php");

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
						$stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, highschool, gradYear, sport, sport2, primaryposition FROM players WHERE name LIKE :name and persontype = 'player'"); 
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
		}
		/**
		 * getUsersByRole() - returns an array of users from the database whose role matches that of the specified role
		 */
		function getPlayersByGender($gender){
			//echo $gender;
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT id, name, highschool, gradYear, sport, sport2, primaryposition FROM players WHERE gender = :gender"); 
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

		function getPlayersByRole($role){
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT id, name, highschool, gradYear, sport, sport2, primaryposition FROM players WHERE persontype = :role"); 
                $stmt->bindParam("role",$role,PDO::PARAM_STR);    
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

		function getPlayersByFindAthleteSearch($query){
			try{
                $data = array();
                $stmt = $this->dbConn->query($query); 
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
					//var_dump($data);
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
                if(true){
					$html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                    $html .= "<tr><th>Name</th><th>Highschool</th><th>Class of</th><th>1st Sport</th><th>2nd Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$player[0]}'>{$player[1]}</a></td>
							<td>{$player[2]}</td>
							<td>{$player[3]}</td>
							<td>{$player[4]}</td>
							<td>{$player[5]}</td>
							<td>{$player[6]}</td>
						</tr>\n";
					}
					$html .= "</table></div>";
					$html .= "<hr/><div class='search-wrapper'>";
					foreach($data as $player){
						$html .= "<p><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$player[0]}'>{$player[1]}</a></p>";
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$player[2]}</p>";
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$player[3]}</p>";
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>1st Sport: </span>{$player[4]}</p>";
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>2nd Sport: </span>{$player[5]}</p>";
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Position: </span>{$player[6]}</p>";
						$html .= "<hr />";
					}
				$html .= "</div><!-- end of search-wrapper -->";
				}
			}
			else{
				$html = "<div id='body-main'><div id='empty-search-wrapper'><p>No players found. Try again</p></div>";
			}
			return $html;
		}

		function getPlayers($data=null){
			if($data != null && count($data) > 0){
				$html = "<hr/><div class='search-wrapper'>";
				foreach($data as $player){
					$html .= "<span><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></span>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$player->getHighschool()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$player->getGradYear()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>1st Sport: </span>{$player->getSport()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>2nd Sport: </span>{$player->getSport2()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Position: </span>{$player->getPrimaryPosition()}</p>";
					$html .= "<hr />";
				}
				$html .= "</div><!-- end of search-wrapper --></div><!-- end of body-main -->";
			}
			return $html;
		}

		function getPlayersWhileAdminMobile($data=null){
			if($data != null && count($data) > 0){
				$html = "<hr/><div class='search-wrapper'>";
				foreach($data as $player){
					$html .= "<span><span style='color:#bb0a1e;'>Name: </span><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></span>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Highschool: </span>{$player->getHighschool()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Class of: </span>{$player->getGradYear()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>1st Sport: </span>{$player->getSport()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>2nd Sport: </span>{$player->getSport2()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Position: </span>{$player->getPrimaryPosition()}</p>";
					$html .= "<form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form>";
					$html .= "<hr />";
				}
				$html .= "</div><!-- end of search-wrapper --></div><!-- end of body-main -->";
			}
			return $html;
		}

		function getPlayersAsTableAsAdmin($data=null){//$data=null
            if($data != null && count($data) > 0){
                $html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Action</th><th>Name</th><th>School</th><th>Class of</th><th>1st Sport</th><th>2nd Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
						<tr>
							<td><form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form></td>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getHighschool()}</td>
							<td>{$player->getGradYear()}</td>
							<td>{$player->getSport()}</td>
							<td>{$player->getSport2()}</td>
							<td>{$player->getPrimaryPosition()}</td>
						</tr>\n";
                    }
                }
                $html .= "</table></div>";
            }else{
                $html = "<div id='body-main'><h2 class='errorMsg'>No Players Found</h2></div>";
            }
            return $html;
		}
		
		function getPlayersAsTable($data=null){//$data=null
			//var_dump($data);
			//var_dump($player->getID());
            //$data = $this->getEverythingAsObjects("project", "Project");
            if($data != null && count($data) > 0){
                $html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Name</th><th>School</th><th>Class of</th><th>1st Sport</th><th>2nd Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getHighschool()}</td>
							<td>{$player->getGradYear()}</td>
							<td>{$player->getSport()}</td>
							<td>{$player->getSport2()}</td>
							<td>{$player->getPrimaryPosition()}</td>
						</tr>\n";
						//<th>Email</th>
						//<td><a href='mailto:'{$player->getEmail()}'>{$player->getEmail()}</a></td>
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
                $html = "<div id='body-main'><h2 class='errorMsg'>No Players Found</h2></div>";
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
                        $this->updateField('username', $val, $id);
                        break;
                    case 'password':
                        $this->updateField('pass', $val, $id);
                        break;
                    case 'name':
                        $this->updateField('name', $val, $id);
                        break;
                    case 'gender':
                        $this->updateField('gender', $val, $id);
						break;
					case 'email':
                        $this->updateField('email', $val, $id);
                        break;
                    case 'cellPhone':
                        $this->updateField('cellPhone', $val, $id);
                        break;
                    case 'homePhone':
                        $this->updateField('homePhone', $val, $id);
						break;		
					case 'address':
                    	$this->updateField('address', $val, $id);
                        break;
                    case 'city':
                        $this->updateField('city', $val, $id);
                        break;
                    case 'state':
                        $this->updateField('state', $val, $id);
						break;
					case 'zip':
						$this->updateField('zip', $val, $id);
						break;
					case 'highschool':
						$this->updateField('highschool', $val, $id);
						break;
					case 'weight':
						$this->updateField('weight', $val, $id);
						break;
					case 'height':
						$this->updateField('height', $val, $id);
						break;
					case 'gradYear':
						$this->updateField('gradYear', $val, $id);
						break;
					case 'sport':
						$this->updateField('sport', $val, $id);
						break;
					case 'sport2':
						$this->updateField('sport2', $val, $id);
						break;
					case 'primaryPosition':
						$this->updateField('primaryPosition', $val, $id);
						break;
					case 'secondaryPosition':
						$this->updateField('secondaryPosition', $val, $id);
						break;
					case 'travelTeam':
						$this->updateField('travelTeam', $val, $id);
						break;
					case 'gpa':
						$this->updateField('gpa', $val, $id);
						break;
					case 'sat':
						$this->updateField('sat', $val, $id);
						break;
					case 'act':
						$this->updateField('act', $val, $id);
						break;
					case 'ref1Name':
						$this->updateField('ref1Name', $val, $id);
						break;
					case 'ref1JobTitle':
						$this->updateField('ref1JobTitle', $val, $id);
						break;
					case 'ref1Email':
						$this->updateField('ref1Email', $val, $id);
						break;
					case 'ref1Phone':
						$this->updateField('ref1Phone', $val, $id);
						break;
					case 'ref2Name':
						$this->updateField('ref2Name', $val, $id);
						break;
					case 'ref2JobTitle':
						$this->updateField('ref2JobTitle', $val, $id);
						break;
					case 'ref2Email':
						$this->updateField('ref2Email', $val, $id);
						break;
					case 'ref2Phone':
						$this->updateField('ref2Phone', $val, $id);
						break;
					case 'ref3Name':
						$this->updateField('ref3Name', $val, $id);
						break;
					case 'ref3JobTitle':
						$this->updateField('ref3JobTitle', $val, $id);
						break;
					case 'ref3Email':
						$this->updateField('ref3Email', $val, $id);
						break;
					case 'ref3Phone':
						$this->updateField('ref3Phone', $val, $id);
						break;
					case 'persStatement':
						$this->updateField('persStatement', $val, $id);
						break;
					case 'commitment':
						$this->updateField('commitment', $val, $id);
						break;
					case 'service':
						$this->updateField('service', $val, $id);
						break;
					case 'profileImage':
						$this->updateField('profileImage', $val, $id);
						break;
					case 'showcase1':
						$this->updateField('showcase1', $val, $id);
						break;
					case 'showcase2':
						$this->updateField('showcase2', $val, $id);
						break;
					case 'showcase3':
						$this->updateField('showcase3', $val, $id);
						break;
					case 'college':
						$this->updateField('college', $val, $id);
						break;
					case 'facebook':
						$this->updateField('facebook', $val, $id);
						break;
					case 'twitter':
						$this->updateField('twitter', $val, $id);
						break;
					case 'instagram':
						$this->updateField('instagram', $val, $id);
						break;
					case 'website':
						$this->updateField('website', $val, $id);
						break;
					case 'velocity':
						$this->updateField('velocity', $val, $id);
						break;
					case 'gpareq':
						$this->updateField('gpareq', $val, $id);
						break;
					case 'satactreq':
						$this->updateField('satactreq', $val, $id);
						break;
					case 'characteristics':
						$this->updateField('characteristics', $val, $id);
						break;
					case 'major':
						$this->updateField('major', $val, $id);
						break;
                }
			}
		}
		/** 
		 * checkPassword() - Password Reset part 1 - takes user inputted current password and checks it against the db
		 * returns true if passwords matches, allows creation of new password. For when user already knows their current password
		*/
		function checkPassword($username, $currentPassword){
			$stmt = $this->dbConn->prepare("SELECT pass FROM players WHERE username = ?");
			$stmt->bindParam(1, $username, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
            while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) == 1){
				$pass = $data[0];

				if(password_verify($currentPassword, $pass->pass)){
					return true;
				}
				else{
					//echo $player->getPassword();
					echo "<p style='color:red;margin-top:25px'>Your current password is incorrect</p>";
					return false;
				}
			}
			//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		}
		/*
		*updatePassword() called updateUser to update the users password. Is called after checkPasword();
		*
		*/
		function updatePassword($username, $newPassword){
			$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
			echo $hashed_password;
			try{
                $stmt = $this->dbConn->prepare("UPDATE players SET pass = ? WHERE username = ?");
				$stmt->bindParam(1, $hashed_password, PDO::PARAM_STR);
				$stmt->bindParam(2, $username, PDO::PARAM_STR);
				$stmt->execute();
				return true;
				//echo $stmt;
            }catch(PDOException $e){
				return false;
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
					}
					//true
					return 1;

				}
				//false
				return 0;
		}
		/**
		 * ResetPassword() - Takes in a username and password passed in from a reset email sent to the user. Checks that the user
		 * custom password is correct and hasn't expired, sends back whether the password can be changed or not
		 */
		function checkTempPassExpire($username){
			$data = array();
			$now    = date("Y-m-d H:i:s");
			try{
				$stmt = $this->dbConn->prepare("SELECT reset, resetExpires FROM players WHERE username = ?"); 
				$stmt->bindParam(1, $username, PDO::PARAM_STR);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
			}
			catch(PDOException $e){
				return 0;
			}
			while($databaseUser = $stmt->fetch()){
				$data[] = $databaseUser;
			}
			if((count($data)) == 1){
				$player = $data[0];
				$passwordExpire = $player->getResetExpires();
				//var_dump($now);
				//var_dump($passwordExpire);
				if($now < $passwordExpire){
					return 1;
				}
				else{
					echo "<p style='color:red;margin-top:25px'>Your Temporary Password Has Expired. Please Rest Your Password Again.</p>";
					return 0;
				}
			}
			return 0;
		}
		//checks for duplicate username first
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
				$persontype = 'player';
				$profileImage = 'black.JPG';
				$query = "INSERT INTO players(username, pass, persontype, profileImage) VALUES(:username, :pass, :persontype, :profileImage)"; 
				$stmt = $this->dbConn->prepare($query);
				$stmt->execute(array(":username"=>$username, ":pass"=>$hashed_password, ":persontype"=>$persontype, ":profileImage"=>$profileImage));

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

		function getMyInfo($id){//profile.php - PLAYERS
			$player = $this->getObjectByID($id);
			$html = " ";
			//var_dump($player);
			if ($player != null && $player->getPersonType() == 'player') {
				$html .= "<div id='body-main'>
				<div id='title-wrapper'>
					<h2 id='name'><a href='myinfo.php'><img src='assets/img/edit2.png' id='edit-img'></a> {$player->getName()}</h2>
					<h3 id='hs'>{$player->getHighschool()}</h3>
				</div>
				<hr/>
				<div id='profile-area'>
				<figure>
					<img src='assets/img/userpictures/{$player->getProfileImage()}' alt='player picture' id='player-pic'>
					<form method='post' action='' onsubmit=\"alert('Profile Reported.');\">
						<input type='text' name='playerid' value='{$player->getId()}' id='hide'>
    					<input type='submit' name='report' value='Report this profile...'> 
					</form>
				</figure>
				<div id='info-box-container'>
				<div class='info-box' id='info-box-underline'>
					<h3>Player Info</h3>
						<ul>
							<li><span class='attributes'>Email:</span> {$player->getEmail()}</li>
							<li><span class='attributes'>City:</span> {$player->getCity()}</li>
							<li><span class='attributes'>State:</span> {$player->getState()}</li>
							<li><span class='attributes'>Zip:</span> {$player->getZip()}</li>
							<li><span class='attributes'>Highschool:</span> {$player->getHighschool()}</li>
							<li><span class='attributes'>Graduation Year:</span> {$player->getGradYear()}</li>
							<li><span class='attributes'>GPA:</span> {$player->getGpa()}</li>
							<li><span class='attributes'>SAT:</span> {$player->getSat()}</li>
							<li><span class='attributes'>ACT:</span> {$player->getAct()}</li>
							<li><span class='attributes'>Intended Major:</span> {$player->getMajor()}</li>
						</ul>
					</div><!-- end of .info-box -->
				<div class='info-box'>
					<h3>Sport Info</h3>
						<ul>
							<li><span class='attributes'>1st Sport:</span> {$player->getSport()}</li>
							<li><span class='attributes'>2nd Sport:</span> {$player->getSport2()}</li>
							<li><span class='attributes'>Primary Position:</span> {$player->getPrimaryPosition()}</li>
							<li><span class='attributes''>Secondary Position:</span> {$player->getSecondaryPosition()}</li>
							<li><span class='attributes'>Travel Team:</span> {$player->getTravelTeam()}</li>
							<li><span class='attributes'>Height:</span> {$player->getHeight()}</li>
							<li><span class='attributes'>Weight:</span> {$player->getWeight()}</li>
						</ul>
					</div> <!-- end of .info-box -->
				</div> <!-- end of info-box-container -->
				</div><!-- end of profile-area --> 
				<p id='com-prompt'>When you become committed to a college, please send us an email at <a href='kprestano@athleticprospects.com'>kprestano@athleticprospects.com</a></p>
				<hr/>
				<h3>Videos</h3>
					<div id='videos'>
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='{$player->getShowcase1()}'></iframe>
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='{$player->getShowcase2()}'></iframe>
						<iframe id='ytplayer' type='text/html' width='300' height='250' src='{$player->getShowcase3()}'></iframe>
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
				";
			}
			else if ($player != null && $player->getPersonType() == 'admin') {
				$html .= "<div id='body-main'>
				<h2>Administration Panel</h2>
				<div id='content'>
					<h3>Search for Player or Coach</h3>
				<div id='form-wrapper'>
				<form   id='player-form'
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
						<option value=' ' selected disabled>Select 1st Sport:</option>
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
					<select name='sport2'>
						<option value=' ' selected disabled>Select 2nd Sport:</option>
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
					<input type='submit'
						value='Download Database'
						name = 'download-db'
						class='btnSubmit'
						id=''/>
				</form>
				</div> <!-- end of form-wrapper -->
				</div><!-- end of #content -->
				<div id='center-area'>
					
				</div> 
				";
			}
			return $html;
		}
		function getMyEditableInfo($id) {//myInfo.php
			$player = $this->getObjectByID($id);
			$html = " ";

			//populate the select option dropdowns
			$gender = $player->getGender();
			if($gender == "Male"){
				$male = "selected";
				$female = "";
			}
			elseif($gender == "Female"){
				$female = "selected";
				$male = "";
			}
			//populate state if it's set
			$al= null;$ak= null;$az= null;$ar= null;$ca= null;$co= null;$ct= null;$de= null;$dc= null;$fl= null;
			$ga= null;$hi= null;$ida= null;$il= null;$in= null;$ia= null;$ks= null;$ky= null;$la= null;$me= null;
			$md= null;$ma= null;$mi= null;$mn= null;$ms= null;$mo= null;$mt= null;$ne= null;$nv= null;$nh= null;
			$nj= null;$nm= null;$nc= null;$nd= null;$oh= null;$ok= null;$or= null;$pa= null;$ri= null;$sc= null;
			$sd= null;$tn= null;$tx= null;$ut= null;$vt= null;$va= null;$wa= null;$wv= null;$wi= null;$wy= null;
			$ny= null;
			switch($player->getState()){
				case "New York": 
					$ny = "selected";
					break;
				case "Alabama":
					$al = "selected";
					break;
				case "Alaska": 
					$ak = "selected";
					break;
				case "Arizona":
					$az = "selected";
					break;
				case "Arkansas": 
					$ar = "selected";
					break;
				case "California":
					$ca = "selected";
					break;
				case "Colorado": 
					$co = "selected";
					break;
				case "Connecticut":
					$ct = "selected";
					break;
				case "Deleware": 
					$de = "selected";
					break;
				case "District of Columbia":
					$dc = "selected";
					break;
				case "Florida": 
					$fl = "selected";
					break;
				case "Georgia":
					$ga = "selected";
					break;
				case "Hawaii": 
					$hi = "selected";
					break;
				case "Idaho":
					$ida = "selected";
					break;
				case "Illinois": 
					$il = "selected";
					break;
				case "Indiana":
					$in = "selected";
					break;
				case "Iowa": 
					$ia = "selected";
					break;
				case "Kansas":
					$ks = "selected";
					break;
				case "Kentucky": 
					$ky = "selected";
					break;
				case "Louisiana":
					$la = "selected";
					break;
				case "Maine": 
					$me = "selected";
					break;
				case "Maryland":
					$md = "selected";
					break;
				case "Massachusetts": 
					$ma = "selected";
					break;
				case "Michigan":
					$mi = "selected";
					break;
				case "Minnesota": 
					$mn = "selected";
					break;
				case "Mississippi":
					$ms = "selected";
					break;
				case "Missouri": 
					$mo = "selected";
					break;
				case "Montana":
					$mt = "selected";
					break;
				case "Nebraska": 
					$ne = "selected";
					break;
				case "Nevada":
					$nv = "selected";
					break;
				case "New Hampshire": 
					$nh = "selected";
					break;
				case "New Jersey":
					$nj = "selected";
					break;
				case "New Mexico": 
					$nm = "selected";
					break;
				case "North Carolina":
					$nc = "selected";
					break;
				case "North Dakota": 
					$nd = "selected";
					break;
				case "Ohio":
					$oh = "selected";
					break;
				case "Oklahoma": 
					$ok = "selected";
					break;
				case "Oregon":
					$or = "selected";
					break;
				case "Pennsylvania": 
					$pa = "selected";
					break;
				case "Rhode Island":
					$ri = "selected";
					break;
				case "South Carolina": 
					$sc = "selected";
					break;
				case "South Dakota":
					$sd = "selected";
					break;
				case "Tennessee": 
					$tn = "selected";
					break;
				case "Texas":
					$tx = "selected";
					break;
				case "Utah": 
					$ut = "selected";
					break;
				case "Vermont":
					$vt = "selected";
					break;
				case "Virginia": 
					$va = "selected";
					break;
				case "Washington":
					$wa = "selected";
					break;
				case "West Virginia": 
					$wv = "selected";
					break;
				case "Wisconsin":
					$wi = "selected";
					break;
				case "Wyoming": 
					$wy = "selected";
					break;
			}
			//populate heigh if it's set
			$h40 = null;$h41 = null;$h42 = null;$h43 = null;$h44 = null;$h45 = null;$h46 = null;$h47 = null;$h48 = null;
			$h49 = null;$h410 = null;$h411 = null;$h50 = null;$h51 = null;$h52 = null;$h53 = null;$h54 = null;$h55 = null;
			$h56 = null;$h57 = null;$h58 = null;$h59 = null;$h510 = null;$h511 = null;$h60 = null;$h61 = null;$h62 = null;
			$h63 = null;$h64 = null;$h65 = null;$h66 = null;$h67 = null;$h68 = null;$h69 = null;$h610 = null;$h611 = null;
			$h70 = null;$h71 = null;$h72 = null;$h73 = null;$h74 = null;$h75 = null;$h76 = null;$h77 = null;$h78 = null;
			$h79 = null;$h710 = null;$h711 = null;
			switch($player->getHeight()){
				case "4 Foot 0 Inches": 
					$h40 = "selected";
					break;
				case "4 Foot 1 Inches": 
					$h41 = "selected";
					break;
				case "4 Foot 2 Inches": 
					$h42 = "selected";
					break;
				case "4 Foot 3 Inches": 
					$h43 = "selected";
					break;
				case "4 Foot 4 Inches": 
					$h44 = "selected";
					break;
				case "4 Foot 5 Inches": 
					$h45 = "selected";
					break;
				case "4 Foot 6 Inches": 
					$h46 = "selected";
					break;
				case "4 Foot 7 Inches": 
					$h47 = "selected";
					break;
				case "4 Foot 8 Inches": 
					$h48 = "selected";
					break;
				case "4 Foot 9 Inches": 
					$h49 = "selected";
					break;
				case "4 Foot 10 Inches": 
					$h410 = "selected";
					break;
				case "4 Foot 11 Inches": 
					$h411 = "selected";
					break;
				case "5 Foot 0 Inches": 
					$h50 = "selected";
					break;
				case "5 Foot 1 Inches": 
					$h51 = "selected";
					break;
				case "5 Foot 2 Inches": 
					$h52 = "selected";
					break;
				case "5 Foot 3 Inches": 
					$h53 = "selected";
					break;
				case "5 Foot 4 Inches": 
					$h54 = "selected";
					break;
				case "5 Foot 5 Inches": 
					$h5 = "selected";
					break;
				case "5 Foot 6 Inches": 
					$h56 = "selected";
					break;
				case "5 Foot 7 Inches": 
					$h57 = "selected";
					break;
				case "5 Foot 8 Inches": 
					$h58 = "selected";
					break;
				case "5 Foot 9 Inches": 
					$h59 = "selected";
					break;
				case "5 Foot 10 Inches": 
					$h510 = "selected";
					break;
				case "5 Foot 11 Inches": 
					$h511 = "selected";
					break;
				case "6 Foot 0 Inches": 
					$h60 = "selected";
					break;
				case "6 Foot 1 Inches": 
					$h61 = "selected";
					break;
				case "6 Foot 2 Inches": 
					$h62 = "selected";
					break;
				case "6 Foot 3 Inches": 
					$h63 = "selected";
					break;
				case "6 Foot 4 Inches": 
					$h64 = "selected";
					break;
				case "6 Foot 5 Inches": 
					$h65 = "selected";
					break;
				case "6 Foot 6 Inches": 
					$h66 = "selected";
					break;
				case "6 Foot 7 Inches": 
					$h67 = "selected";
					break;
				case "6 Foot 8 Inches": 
					$h68 = "selected";
					break;
				case "6 Foot 9 Inches": 
					$h69 = "selected";
					break;
				case "6 Foot 10 Inches": 
					$h610 = "selected";
					break;
				case "6 Foot 11 Inches": 
					$h611 = "selected";
					break;
				case "7 Foot 0 Inches": 
					$h70 = "selected";
					break;
				case "7 Foot 1 Inches": 
					$h71 = "selected";
					break;
				case "7 Foot 2 Inches": 
					$h72 = "selected";
					break;
				case "7 Foot 3 Inches": 
					$h73 = "selected";
					break;
				case "7 Foot 4 Inches": 
					$h74 = "selected";
					break;
				case "7 Foot 5 Inches": 
					$h75 = "selected";
					break;
				case "7 Foot 6 Inches": 
					$h76 = "selected";
					break;
				case "7 Foot 7 Inches": 
					$h77 = "selected";
					break;
				case "7 Foot 8 Inches": 
					$h78 = "selected";
					break;
				case "7 Foot 9 Inches": 
					$h79 = "selected";
					break;
				case "7 Foot 10 Inches": 
					$h710 = "selected";
					break;
				case "7 Foot 11 Inches": 
					$h711 = "selected";
					break;
			}
			//populate 1st sport if it's set
			$football=null;$basketball=null;$baseball=null;$softball=null;$hockey=null;$fieldhockey=null;$lacrosse=null;
			$soccer=null;$trackandfield=null;$volleyball=null;$wrestling=null;$tennis=null;$swimming=null;
			$golf=null;$gymnastics=null;$cheerleading=null;$esports=null;
			switch($player->getSport()){
				case "Football": 
					$football = "selected";
					break;
				case "Backetball": 
					$basketball = "selected";
					break;
				case "Softball": 
					$softball = "selected";
					break;
				case "Hockey": 
					$hockey = "selected";
					break;
				case "Fieldhockey": 
					$fieldhockey = "selected";
					break;
				case "Lacrosse": 
					$lacrosse = "selected";
					break;
				case "Soccer": 
					$soccer = "selected";
					break;
				case "Trackandfield": 
					$trackandfield = "selected";
					break;
				case "Volleyball": 
					$volleyball = "selected";
					break;
				case "Wrestling": 
					$wrestling = "selected";
					break;
				case "Tennis": 
					$tennis = "selected";
					break;
				case "Swimming": 
					$swimming = "selected";
					break;
				case "Golf": 
					$golf = "selected";
					break;
				case "Gymnastics": 
					$gymnastics = "selected";
					break;
				case "Cheerleading": 
					$cheerleading = "selected";
					break;
				case "Esports": 
					$esports = "selected";
					break;
			}
			//populate 2nd sport if it's set
			$football2=null;$basketball2=null;$baseball2=null;$softball2=null;$hockey2=null;$fieldhockey2=null;$lacrosse2=null;
			$soccer2=null;$trackandfield2=null;$volleyball2=null;$wrestling2=null;$tennis2=null;$swimming2=null;
			$golf2=null;$gymnastics2=null;$cheerleading2=null;$esports2=null;
			switch($player->getSport()){
				case "Football": 
					$football2 = "selected";
					break;
				case "Backetball": 
					$basketball2 = "selected";
					break;
				case "Softball": 
					$softball2 = "selected";
					break;
				case "Hockey": 
					$hockey2 = "selected";
					break;
				case "Fieldhockey": 
					$fieldhockey2 = "selected";
					break;
				case "Lacrosse": 
					$lacrosse2 = "selected";
					break;
				case "Soccer": 
					$soccer2 = "selected";
					break;
				case "Trackandfield": 
					$trackandfield2 = "selected";
					break;
				case "Volleyball": 
					$volleyball2 = "selected";
					break;
				case "Wrestling": 
					$wrestling2 = "selected";
					break;
				case "Tennis": 
					$tennis2 = "selected";
					break;
				case "Swimming": 
					$swimming2 = "selected";
					break;
				case "Golf": 
					$golf2 = "selected";
					break;
				case "Gymnastics": 
					$gymnastics2 = "selected";
					break;
				case "Cheerleading": 
					$cheerleading2 = "selected";
					break;
				case "Esports": 
					$esports2 = "selected";
					break;
			}
			//profile.php?id={$player->getId()}
			if ($player != null && $player->getPersonType() == 'player') {
				$male=null;$female=null;
				//profile.php?id={$player->getId()}
				$html .= "<div id='body-main'>
					<form id='player-form'
						  method = 'POST'
						  action= 'profile.php?id={$player->getId()}'
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
								   required />
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
								   required />
						</p>
						<p>
						<label class='span'>Gender:* &nbsp; </label> 
							<select name='gender' required>
								<option value=' ' selected disabled>Select Gender:</option>
								<option {$male} value='Male' >Male</option>
								<option {$female} value='Female' >Female</option>
							</select>
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
							<input type='tel'
								   id = 'cellphone'
								   name= 'cellPhone'
								   pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'
								   size = '35'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
								   value='{$player->getCellPhone()}'
								   required />
						</p>
						<p>
						<label class='span'>Home Phone:* &nbsp; </label>
							<input type='tel'
								   id = 'homephone'
								   name= 'homePhone'
								   size = '35'
								   pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'
								   maxlength = '50'
								   placeholder = 'xxx-xxx-xxxx'
								   value='{$player->getHomePhone()}'
								   required />
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
								   required />
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
								   required />
						</p>
						<p>
						<label class='span' for='state'>State:* &nbsp;</label>
							<select name='state' required>
								<option value=' ' selected disabled>Select State:</option>
								<option {$ny} value='New York'>New York</option>
								<option {$al} value='Alabama'>Alabama</option>
								<option {$ak} value='Alaska'>Alaska</option>
								<option {$az} value='Arizona'>Arizona</option>
								<option {$ar} value='Arkansas'>Arkansas</option>
								<option {$ca} value='California'>California</option>
								<option {$co} value='Colorado'>Colorado</option>
								<option {$ct} value='Connecticut'>Connecticut</option>
								<option {$de} value='Delaware'>Delaware</option>
								<option {$dc} value='District of Columbia'>District Of Columbia</option>
								<option {$fl} value='Florida'>Florida</option>
								<option {$ga} value='Georgia'>Georgia</option>
								<option {$hi} value='Hawaii'>Hawaii</option>
								<option {$ida} value='Idaho'>Idaho</option>
								<option {$il} value='Illinois'>Illinois</option>
								<option {$in} value='Indiana'>Indiana</option>
								<option {$ia} value='Iowa'>Iowa</option>
								<option {$ks} value='Kansas'>Kansas</option>
								<option {$ky} value='Kentucky'>Kentucky</option>
								<option {$la} value='Louisiana'>Louisiana</option>
								<option {$me} value='Maine'>Maine</option>
								<option {$md} value='Maryland'>Maryland</option>
								<option {$ma} value='Massachusetts'>Massachusetts</option>
								<option {$mi} value='Michigan'>Michigan</option>
								<option {$mn} value='Minnesota'>Minnesota</option>
								<option {$ms} value='Mississippi'>Mississippi</option>
								<option {$mo} value='Missouri'>Missouri</option>
								<option {$mt} value='Montana'>Montana</option>
								<option {$ne} value='Nebraska'>Nebraska</option>
								<option {$nv} value='Nevada'>Nevada</option>
								<option {$nh} value='New Hampshire'>New Hampshire</option>
								<option {$nj} value='New Jersey'>New Jersey</option>
								<option {$nm} value='New Mexico'>New Mexico</option>
								<option {$nc} value='North Carolina'>North Carolina</option>
								<option {$nd} value='North Dakota'>North Dakota</option>
								<option {$oh} value='Ohio'>Ohio</option>
								<option {$ok} value='Oklahoma'>Oklahoma</option>
								<option {$or} value='Oregon'>Oregon</option>
								<option {$pa} value='Pennsylvania'>Pennsylvania</option>
								<option {$ri} value='Rhode Island'>Rhode Island</option>
								<option {$sc} value='South Carolina'>South Carolina</option>
								<option {$sd} value='South Dakota'>South Dakota</option>
								<option {$tn} value='Tennessee'>Tennessee</option>
								<option {$tx} value='Texas'>Texas</option>
								<option {$ut} value='Utah'>Utah</option>
								<option {$vt} value='Vermont'>Vermont</option>
								<option {$va} value='Virginia'>Virginia</option>
								<option {$wa} value='Washington'>Washington</option>
								<option {$wv} value='West Virginia'>West Virginia</option>
								<option {$wi} value='Wisconsin'>Wisconsin</option>
								<option {$wy} value='Wyoming'>Wyoming</option>			
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
								   value='{$player->getZip()}'
								   required />
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
								   required />
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
								   required />
						</p>
						<p>
						<label class='span'>Height*: &nbsp; </label>
						<select name='height' required>
							<option value='' selected disabled>Select height:</option>
							<option {$h40} value='4 foot 0 inches'>4 foot 0 inches</option>
							<option {$h41} value='4 foot 1 inch'>4 foot 1 inch</option>
							<option {$h42} value='4 foot 2 inches'>4 foot 2 inches</option>
							<option {$h43} value='4 foot 3 inches'>4 foot 3 inches</option>
							<option {$h44} value='4 foot 4 inches'>4 foot 4 inches</option>
							<option {$h45} value='4 foot 5 inches'>4 foot 5 inches</option>
							<option {$h46} value='4 foot 6 inches'>4 foot 6 inches</option>
							<option {$h47} value='4 foot 7 inches'>4 foot 7 inches</option>
							<option {$h48} value='4 foot 8 inches'>4 foot 8 inches</option>
							<option {$h49} value='4 foot 9 inches'>4 foot 9 inches</option>
							<option {$h410} value='4 foot 10 inches'>4 foot 10 inches</option>
							<option {$h411} value='4 foot 11 inches'>4 foot 11 inches</option>
							<option {$h50} value='5 foot 0 inches'>5 foot 0 inches</option>
							<option {$h51} value='5 foot 1 inch'>5 foot 1 inch</option>
							<option {$h52} value='5 foot 2 inches'>5 foot 2 inches</option>
							<option {$h53} value='5 foot 3 inches'>5 foot 3 inches</option>
							<option {$h54} value='5 foot 4 inches'>5 foot 4 inches</option>
							<option {$h55} value='5 foot 5 inches'>5 foot 5 inches</option>
							<option {$h56} value='5 foot 6 inches'>5 foot 6 inches</option>
							<option {$h57} value='5 foot 7 inches'>5 foot 7 inches</option>
							<option {$h58} value='5 foot 8 inches'>5 foot 8 inches</option>
							<option {$h59} value='5 foot 9 inches'>5 foot 9 inches</option>
							<option {$h510} value='5 foot 10 inches'>5 foot 10 inches</option>
							<option {$h511} value='5 foot 11 inches'>5 foot 11 inches</option>
							<option {$h60} value='6 foot 0 inches'>6 foot 0 inches</option>
							<option {$h61} value='6 foot 1 inch'>6 foot 1 inch</option>
							<option {$h62} value='6 foot 2 inches'>6 foot 2 inches</option>
							<option {$h63} value='6 foot 3 inches'>6 foot 3 inches</option>
							<option {$h64} value='6 foot 4 inches'>6 foot 4 inches</option>
							<option {$h65} value='6 foot 5 inches'>6 foot 5 inches</option>
							<option {$h66} value='6 foot 6 inches'>6 foot 6 inches</option>
							<option {$h67} value='6 foot 7 inches'>6 foot 7 inches</option>
							<option {$h68} value='6 foot 8 inches'>6 foot 8 inches</option>
							<option {$h69} value='6 foot 9 inches'>6 foot 9 inches</option>
							<option {$h610} value='6 foot 10 inches'>6 foot 10 inches</option>
							<option {$h611} value='6 foot 11 inches'>6 foot 11 inches</option>
							<option {$h70} value='7 foot 0 inches'>7 foot 0 inches</option>
							<option {$h71} value='7 foot 1 inch'>7 foot 1 inch</option>
							<option {$h72} value='7 foot 2 inches'>7 foot 2 inches</option>
							<option {$h73} value='7 foot 3 inches'>7 foot 3 inches</option>
							<option {$h74} value='7 foot 4 inches'>7 foot 4 inches</option>
							<option {$h75} value='7 foot 5 inches'>7 foot 5 inches</option>
							<option {$h76} value='7 foot 6 inches'>7 foot 6 inches</option>
							<option {$h77} value='7 foot 7 inches'>7 foot 7 inches</option>
							<option {$h78} value='7 foot 8 inches'>7 foot 8 inches</option>
							<option {$h79} value='7 foot 9 inches'>7 foot 9 inches</option>
							<option {$h710} value='7 foot 10 inches'>7 foot 10 inches</option>
							<option {$h711} value='7 foot 11 inches'>7 foot 11 inches</option>
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
								 value='{$player->getGradYear()}'
								 required />
						</p>
						<div>
						<p>
							<label class='span'>Sports*: &nbsp; </label>
							<select name='sport' required>
								<option value=' ' selected disabled>Select 1st Sport:</option>
								<option {$football} value='football'>Football</option>
								<option {$basketball} value='basketball'>Basketball</option>
								<option {$baseball} value='baseball'>Baseball</option>
								<option {$softball} value='softball'>Softball</option>
								<option {$hockey} value='hockey'>Hockey</option>
								<option {$fieldhockey} value='fieldhockey'>Field Hockey</option>
								<option {$lacrosse} value='lacrosse'>Lacrosse</option>
								<option {$soccer} value='soccer'>Soccer</option>
								<option {$trackandfield} value='trackandField'>Track and Field</option>
								<option {$volleyball} value='volleyball'>Volleyball</option>
								<option {$wrestling} value='wrestling'>Wrestling</option>
								<option {$tennis} value='tennis'>Tennis</option>
								<option {$swimming} value='swimming'>Swimming</option>
								<option {$golf} value='golf'>Golf</option>
								<option {$gymnastics} value='gymnastics'>Gymnastics</option>
								<option {$cheerleading} value='cheerleading'>Cheerleading</option>
								<option {$esports} value='esports'>Esports</option>
							</select>
						</p>
						<p>
							<select name='sport2'>
								<option value=' ' selected disabled>Select 2nd Sport(Optional):</option>
								<option {$football2} value='football'>Football</option>
								<option {$basketball2} value='basketball'>Basketball</option>
								<option {$baseball2} value='baseball'>Baseball</option>
								<option {$softball2} value='softball'>Softball</option>
								<option {$hockey2} value='hockey'>Hockey</option>
								<option {$fieldhockey2} value='fieldhockey'>Field Hockey</option>
								<option {$lacrosse2} value='lacrosse'>Lacrosse</option>
								<option {$soccer2} value='soccer'>Soccer</option>
								<option {$trackandfield2} value='trackandField'>Track and Field</option>
								<option {$volleyball2} value='volleyball'>Volleyball</option>
								<option {$wrestling2} value='wrestling'>Wrestling</option>
								<option {$tennis2} value='tennis'>Tennis</option>
								<option {$swimming2} value='swimming'>Swimming</option>
								<option {$golf2} value='golf'>Golf</option>
								<option {$gymnastics2} value='gymnastics'>Gymnastics</option>
								<option {$cheerleading2} value='cheerleading'>Cheerleading</option>
								<option {$esports2} value='esports'>Esports</option>
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
								   value='{$player->getPrimaryPosition()}'
								   required />
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
								   required />
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
								   required />
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
								   required />
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
								    />
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
								    />
						</p>
						<p>
						<label class='span'>Intended Major*: &nbsp; </label>
							<input type='text'
								   id = 'major'
								   name= 'major'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='{$player->getMajor()}'
								    />
						</p>
						<p>
						<label class='span'>Commitment: &nbsp; </label>
							<input type='text'
								   id = 'commitment'
								   name= 'commitment'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='{$player->getCommitment()}'
								    />
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
								<input type='text' name='showcase1' id='showcase1' size = '35' maxlength = '50' value='{$player->getShowcase1()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 2 ): &nbsp; </span>
								<input type='text' name='showcase2' id=showcase2 size = '35' maxlength = '50' value='{$player->getShowcase2()}'>
							</p>
							<p>
								<span class='span'>Upload Video ( Showcase 3 ): &nbsp; </span>
								<input type='text' name='showcase3' id=showcase3 size = '35' maxlength = '50' value='{$player->getShowcase3()}'>
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
									   value='{$player->getRef1Name()}'
									    />
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
									    />
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
									    />
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
									    />
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
									   value='{$player->getRef2Name()}'
									    />
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
									    />
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
									    />
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
									    />
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
									   value='{$player->getRef3Name()}'
									    />
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
									    />
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
									    />
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
									    />
							</p>
							
						</div><!-- end of refs -->
						<div id='refs'>
						<p class='span'>Personal Statement: &nbsp; </p>
						<p>
						  <textarea placeholder='Personal Statement...' rows='4' cols='150' id='textarea' name='persStatement' form='player-form'>{$player->getPersStatement()}</textarea>
					  	</p>  
						  </div>
					</div><!-- end of test-container -->
						<input type='submit'
							   value='Update My Info'
							   name = 'updateUserInfo'
							   class='btn-all-buttons'
							   id='btnSubmit'
							   onClick='checkMyInfo()' />
				</form>
				<a href='passwordreset.php'>Reset my password>>></a>
				</body>
					\n";
				
			}
			else if ($player != null && $player->getPersonType() == 'coach') {
				//profile.php?id={$player->getId()}
				//return checkForm();
				$html .= "<div id='body-main'>
					<form id='player-form'
						  method = 'POST'
						  action= 'profile.php?id={$player->getId()}'
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
								   name= 'cellPhone'
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
								<select name='state'>
									<option value=' ' selected disabled>Select State:</option>
									<option value='new york'>New York</option>
									<option value='alabama'>Alabama</option>
									<option value='alaska'>Alaska</option>
									<option value='arizona'>Arizona</option>
									<option value='arkansas'>Arkansas</option>
									<option value='california'>California</option>
									<option value='colorado'>Colorado</option>
									<option value='connecticut'>Connecticut</option>
									<option value='delaware'>Delaware</option>
									<option value='district of columbia'>District Of Columbia</option>
									<option value='florida'>Florida</option>
									<option value='georgia'>Georgia</option>
									<option value='hawaii'>Hawaii</option>
									<option value='idaho'>Idaho</option>
									<option value='illinois'>Illinois</option>
									<option value='indiana'>Indiana</option>
									<option value='iowa'>Iowa</option>
									<option value='kansas'>Kansas</option>
									<option value='kentucky'>Kentucky</option>
									<option value='louisiana'>Louisiana</option>
									<option value='maine'>Maine</option>
									<option value='maryland'>Maryland</option>
									<option value='massachusetts'>Massachusetts</option>
									<option value='michigan'>Michigan</option>
									<option value='minnesota'>Minnesota</option>
									<option value='mississippi'>Mississippi</option>
									<option value='missouri'>Missouri</option>
									<option value='montana'>Montana</option>
									<option value='nebraska'>Nebraska</option>
									<option value='nevada'>Nevada</option>
									<option value='new hampshire'>New Hampshire</option>
									<option value='new jersey'>New Jersey</option>
									<option value='new mexico'>New Mexico</option>
									<option value='new york'>New York</option>
									<option value='north carolina'>North Carolina</option>
									<option value='north dakota'>North Dakota</option>
									<option value='ohio'>Ohio</option>
									<option value='oklahoma'>Oklahoma</option>
									<option value='oregon'>Oregon</option>
									<option value='pennsylvania'>Pennsylvania</option>
									<option value='rhode island'>Rhode Island</option>
									<option value='south carolina'>South Carolina</option>
									<option value='south dakota'>South Dakota</option>
									<option value='tennessee'>Tennessee</option>
									<option value='texas'>Texas</option>
									<option value='utah'>Utah</option>
									<option value='vermont'>Vermont</option>
									<option value='virginia'>Virginia</option>
									<option value='washington'>Washington</option>
									<option value='west virginia'>West Virginia</option>
									<option value='wisconsin'>Wisconsin</option>
									<option value='wyoming'>Wyoming</option>			
								</select>
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
							   class='updateInfoBtn'
							   id='btnSubmit' 
							   onClick='checkMyInfo()'/>
				</form>
				<a href='passwordreset.php'>Reset my password>>></a>
				<script type='text/javascript' src='assets/javascript/checkMyInfo.js' ></script>
				</body>
					\n";
			}
			return $html;
		}
	} // class
?>

<!-- <p class='servicelabel' for='service'>Choose Service</p> -->
<!-- <select id='service' name='service'>
						  <option value='' disabled selected>Choose Service</option>
						  <option value='free'>Free Player Profile</option>
						  <option value='biweekly'>Bi-weekly recruiting checklist and articles - $100/per year</option>
						  <option value='mentor1yr'>Mentor Program 1 year - $1099</option>
						  <option value='mentor6mo'>Mentor Program 6 months - $650</option>
					  	</select> -->

						  <!-- <li><span class='attributes'>Cell Phone:</span> {$player->getCellPhone()}</li>
							<li><span class='attributes'>Home Phone:</span> {$player->getHomePhone()}</li> -->