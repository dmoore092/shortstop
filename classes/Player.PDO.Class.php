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
						   $stmt = $this->dbConn->prepare("SELECT DISTINCT id, name, email, sport, persontype FROM players WHERE name LIKE :name and persontype = 'player'"); 
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

		function getPlayersByRole($role){
			try{
                $data = array();
                $stmt = $this->dbConn->prepare("SELECT id, username, name, email, sport, persontype FROM players WHERE persontype = :role"); 
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
					$html .= "<form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE'></form>";
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
                    $html .= "<tr><th>Action</th><th>Name</th><th>School</th><th>Class of</th><th>Sport</th><th>Position</th></tr>";
                    foreach($data as $player){
						$html .= "
						<tr>
							<td><form method='post' action=''><input type='text' name='playerid' value='{$player->getId()}' id='hide'><input type='submit' name='delete' class='btnSubmit' value='DELETE'></form></td>
                            <td><a href='profile.php?id={$player->getId()}'>{$player->getName()}</a></td>
							<td>{$player->getHighschool()}</td>
							<td>{$player->getGradYear()}</td>
							<td>{$player->getSport()}</td>
							<td>{$player->getPrimaryPosition()}</td>
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
		 * returns true if passwords maths, allows creation of new password
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
						//echo "<p style=color:green;>success login</p>";
					}
					//true
					return 1;

				}
				//false
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
				<div id='title-wrapper'>
					<h2 id='name'><a href='myinfo.php'><img src='assets/img/edit2.png' id='edit-img'></a> {$player->getName()}</h2>
					<h3 id='hs'>{$player->getHighschool()}</h3>
				</div>
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
							<li><span class='attributes'>Sport:</span> {$player->getSport()}</li>
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
				</div><!-- end of #content -->
				<div id='center-area'>
					
				</div> 
				";
			}
			return $html;
		}
		function getMyEditableInfo($id) {//myInfo.php
			$player = $this->getObjectByID('players', 'Player', $id);
			$html = " ";
			//var_dump($player);
			//profile.php?id={$player->getId()}
			if ($player != null && $player->getPersonType() == 'player') {
				$html .= "<div id='body-main'>
					<form id='player-form'
						  method = 'POST'
						  action= 'profile.php?id={$player->getId()}'
						  onsubmit = 'return validateForm();' 
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
							<select name='gender'>
								<option value=' ' selected disabled>Select Gender:</option>
								<option value='Male' >Male</option>
								<option value='Female' >Female</option>
							</select>
						</p>
						<p>
						<label class='span'>Cell Phone:* &nbsp; </label>
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
							<select name='state'>
								<option value=' ' selected disabled>Select State:</option>
								<option value='New York'>New York</option>
								<option value='Alabama'>Alabama</option>
								<option value='Alaska'>Alaska</option>
								<option value='Arizona'>Arizona</option>
								<option value='Arkansas'>Arkansas</option>
								<option value='California'>California</option>
								<option value='Colorado'>Colorado</option>
								<option value='Connecticut'>Connecticut</option>
								<option value='Delaware'>Delaware</option>
								<option value='District of Columbia'>District Of Columbia</option>
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
						<p>
						<label class='span'>Height*: &nbsp; </label>
						<select name='height'>
							<option value='' selected disabled>Select height:</option>
							<option value='4 foot 0 inches'>4 foot 0 inches</option>
							<option value='4 foot 1 inch'>4 foot 1 inch</option>
							<option value='4 foot 2 inches'>4 foot 2 inches</option>
							<option value='4 foot 3 inches'>4 foot 3 inches</option>
							<option value='4 foot 4 inches'>4 foot 4 inches</option>
							<option value='4 foot 5 inches'>4 foot 5 inches</option>
							<option value='4 foot 6 inches'>4 foot 6 inches</option>
							<option value='4 foot 7 inches'>4 foot 7 inches</option>
							<option value='4 foot 8 inches'>4 foot 8 inches</option>
							<option value='4 foot 9 inches'>4 foot 9 inches</option>
							<option value='4 foot 10 inches'>4 foot 10 inches</option>
							<option value='4 foot 11 inches'>4 foot 11 inches</option>
							<option value='5 foot 0 inches'>5 foot 0 inches</option>
							<option value='5 foot 1 inch'>5 foot 1 inch</option>
							<option value='5 foot 2 inches'>5 foot 2 inches</option>
							<option value='5 foot 3 inches'>5 foot 3 inches</option>
							<option value='5 foot 4 inches'>5 foot 4 inches</option>
							<option value='5 foot 5 inches'>5 foot 5 inches</option>
							<option value='5 foot 6 inches'>5 foot 6 inches</option>
							<option value='5 foot 7 inches'>5 foot 7 inches</option>
							<option value='5 foot 8 inches'>5 foot 8 inches</option>
							<option value='5 foot 9 inches'>5 foot 9 inches</option>
							<option value='5 foot 10 inches'>5 foot 10 inches</option>
							<option value='5 foot 11 inches'>5 foot 11 inches</option>
							<option value='6 foot 0 inches'>6 foot 0 inches</option>
							<option value='6 foot 1 inch'>6 foot 1 inch</option>
							<option value='6 foot 2 inches'>6 foot 2 inches</option>
							<option value='6 foot 3 inches'>6 foot 3 inches</option>
							<option value='6 foot 4 inches'>6 foot 4 inches</option>
							<option value='6 foot 5 inches'>6 foot 5 inches</option>
							<option value='6 foot 6 inches'>6 foot 6 inches</option>
							<option value='6 foot 7 inches'>6 foot 7 inches</option>
							<option value='6 foot 8 inches'>6 foot 8 inches</option>
							<option value='6 foot 9 inches'>6 foot 9 inches</option>
							<option value='6 foot 10 inches'>6 foot 10 inches</option>
							<option value='6 foot 11 inches'>6 foot 11 inches</option>
							<option value='7 foot 0 inches'>7 foot 0 inches</option>
							<option value='7 foot 1 inch'>7 foot 1 inch</option>
							<option value='7 foot 2 inches'>7 foot 2 inches</option>
							<option value='7 foot 3 inches'>7 foot 3 inches</option>
							<option value='7 foot 4 inches'>7 foot 4 inches</option>
							<option value='7 foot 5 inches'>7 foot 5 inches</option>
							<option value='7 foot 6 inches'>7 foot 6 inches</option>
							<option value='7 foot 7 inches'>7 foot 7 inches</option>
							<option value='7 foot 8 inches'>7 foot 8 inches</option>
							<option value='7 foot 9 inches'>7 foot 9 inches</option>
							<option value='7 foot 10 inches'>7 foot 10 inches</option>
							<option value='7 foot 11 inches'>7 foot 11 inches</option>
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
						<p>
						<label class='span'>Intended Major: &nbsp; </label>
							<input type='text'
								   id = 'major'
								   name= 'major'
								   size = '35'
								   maxlength = '100'
								   placeholder = ' '
								   value='{$player->getMajor()}'
								   onclick='' />
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
				<script type='test/javascript' src='/assets/javascript/checkMyInfo.js' ></script>
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