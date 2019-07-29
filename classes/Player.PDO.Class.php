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
						$stmt = $this->dbConn->prepare("SELECT DISTINCT id, AES_DECRYPT(name, '!trN8xLnaHcA@cKu'), AES_DECRYPT(highscool, '!trN8xLnaHcA@cKu'), AES_DECRYPT(gradYear, '!trN8xLnaHcA@cKu'), AES_DECRYPT(sport, '!trN8xLnaHcA@cKu'), AES_DECRYPT(primaryposition, '!trN8xLnaHcA@cKu') FROM players WHERE name LIKE AES_ENCRYPT(:name, '!trN8xLnaHcA@cKu') and persontype = 'player'"); 
						$stmt->bindParam(":name", $name, PDO::PARAM_STR, 150);    
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_CLASS,"Players");
						while($databaseProjects = $stmt->fetch()){
								$data[] = $databaseProjects;
						}
						return $data;
				}
				catch(PDOException $e){
					//echo $e->getMessage();
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
                $stmt = $this->dbConn->prepare("SELECT id, name, highschool, gradYear, sport, primaryposition FROM players WHERE gender = :gender"); 
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
                //echo $e->getMessage();
                throw new Exception("Problem getting players from database.");
            }
		}

		function getPlayersByRole($role){
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT id, name, highschool, gradYear, sport, primaryposition FROM players WHERE persontype = :role"); 
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
                //echo $e->getMessage();
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
                //echo $e->getMessage();
                throw new Exception("Problem getting players from database.");
            }
		}

		function getPlayersFromSearch($data=null){
            if($data != null && count($data) > 0){
                if(true){
					$html = "<div id='body-main'><div id='table-wrapper'><table>\n";
					$html .= "<tr><th>Name</th><th>Highschool</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
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
						$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$player[4]}</p>";
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
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$player->getSport()}</p>";
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
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Sport: </span>{$player->getSport()}</p>";
					$html .= "<p class='player-attrib'><span style='color:#bb0a1e;'>Position: </span>{$player->getPrimaryPosition()}</p>";
					$html .= "<form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form>";
					$html .= "<hr />";
				}
				$html .= "</div><!-- end of search-wrapper -->";
			}
			return $html;
		}

		function getPlayersAsTableAsAdmin($data=null){//$data=null
            if($data != null && count($data) > 0){
				//<div id='body-main'>
                $html = "<div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Action</th><th>Name</th><th>School</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
						<tr>
							<td><form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE' onclick=\"return confirm('Do you really want to delete this profile?')\"></form></td>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getHighschool()}</td>
							<td>{$player->getGradYear()}</td>
							<td>{$player->getSport()}</td>
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
		
		function getPlayersAsTable($data=null){
            if($data != null && count($data) > 0){
                $html = "<div id='body-main'><div id='table-wrapper'><table>\n";
                if(true){
                    $html .= "<tr><th>Name</th><th>School</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
                        <tr>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getHighschool()}</td>
							<td>{$player->getGradYear()}</td>
							<td>{$player->getSport()}</td>
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
			$stmt = $this->dbConn->prepare("SELECT pass FROM players WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')");
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
		}
		/*
		*updatePassword() called updateUser to update the users password. Is called after checkPasword();
		*
		*/
		function updatePassword($username, $newPassword){
			$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
			//echo $hashed_password;
			try{
                $stmt = $this->dbConn->prepare("UPDATE players SET pass = ? WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')");
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
				$stmt = $this->dbConn->prepare("SELECT AES_DECRYPT(username, '!trN8xLnaHcA@cKu'), pass, id FROM players WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')"); 
				$stmt->bindParam(1, $username, PDO::PARAM_STR);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_CLASS,"Player");
                while($databaseUser = $stmt->fetch()){
					$data[] = $databaseUser;
				}
				if((count($data)) == 1){
					$player = $data[0];
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
		 * checkTempPassExpire() - Takes in a username and password passed in from a reset email sent to the user. Checks that the user
		 * custom password is correct and hasn't expired, sends back whether the password can be changed or not
		 */
		function checkTempPassExpire($username){
			$data = array();
			$now  = date("Y-m-d H:i:s");
			try{
				$stmt = $this->dbConn->prepare("SELECT `reset`, resetExpires FROM players WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')"); 
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
				//var_dump(get_class_methods($player));
				$passwordExpire = $player->getResetExpires();
				if($now < $passwordExpire){
					return 1;
				}
				else{
					echo "<p style='color:red;margin-top:25px'>Your Temporary Password Has Expired. Please Reset Your Password Again.</p>";
					return 0;
				}
			}
			return 0;
		}
		//checks for duplicate username first
		function register($username, $hashed_password, $persontype){
			$data = [];
			$stmt = $this->dbConn->prepare("SELECT AES_DECRYPT(username, '!trN8xLnaHcA@cKu'), pass, id FROM players WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')");
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
				$query = "INSERT INTO players(username, pass, persontype, profileImage) VALUES
												(AES_ENCRYPT(:username, '!trN8xLnaHcA@cKu'), 
												:pass, 
												'player', 
												AES_ENCRYPT('black.JPG', '!trN8xLnaHcA@cKu'));
												"; 
				$stmt = $this->dbConn->prepare($query);
				//var_dump($query);
				$stmt->execute(array(":username"=>$username, ":pass"=>$hashed_password));

				$info = $this->dbConn->prepare("SELECT AES_DECRYPT(username, '!trN8xLnaHcA@cKu'), id, persontype FROM players WHERE username = AES_ENCRYPT(?, '!trN8xLnaHcA@cKu')");
				$info->bindParam(1, $username, PDO::PARAM_STR);
				$info->execute();
				$info->setFetchMode(PDO::FETCH_CLASS,"Player");
				//var_dump($info);
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
	} // class
?>

<?php 
// <!-- <p class='servicelabel' for='service'>Choose Service</p> -->
//<!-- <select id='service' name='service'>
//						  <option value='' disabled selected>Choose Service</option>
//						  <option value='free'>Free Player Profile</option>
//						  <option value='biweekly'>Bi-weekly recruiting checklist and articles - $100/per year</option>
//						  <option value='mentor1yr'>Mentor Program 1 year - $1099</option>
//						  <option value='mentor6mo'>Mentor Program 6 months - $650</option>
//					  	</select> -->
//
//						  <!-- <li><span class='attributes'>Cell Phone:</span> {$player->getCellPhone()}</li>
//							<li><span class='attributes'>Home Phone:</span> {$player->getHomePhone()}</li> -->
//
?>