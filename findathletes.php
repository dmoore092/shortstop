<?php
    error_reporting(0);
    $relpath= ""; $title="Male Athletes"; $page="mfathletes";
    session_start();
    include_once ("classes/Player.PDO.Class.php");
    include("assets/inc/header.inc.php");
    $name = "";
    $position = "";
    $school = "";
    
    $playerDB = new PlayerDB();
    
?>
<div id="body-main">
    <h2>Search for Players</h2>
    <div id="content">
        <h3>Select 1 or more..</h3>
    <div id="form-wrapper">
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
            <option value="" selected disabled>Select Sport:</option>
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
            <option value="new york">New York</option>
	        <option value="alabama">Alabama</option>
	        <option value="alaska">Alaska</option>
	        <option value="arizona">Arizona</option>
	        <option value="arkansas">Arkansas</option>
	        <option value="california">California</option>
	        <option value="colorado">Colorado</option>
	        <option value="connecticut">Connecticut</option>
	        <option value="delaware">Delaware</option>
	        <option value="district of columbia">District Of Columbia</option>
	        <option value="florida">Florida</option>
	        <option value="georgia">Georgia</option>
	        <option value="hawaii">Hawaii</option>
	        <option value="idaho">Idaho</option>
	        <option value="illinois">Illinois</option>
	        <option value="indiana">Indiana</option>
	        <option value="iowa">Iowa</option>
	        <option value="kansas">Kansas</option>
	        <option value="kentucky">Kentucky</option>
	        <option value="louisiana">Louisiana</option>
	        <option value="maine">Maine</option>
	        <option value="maryland">Maryland</option>
	        <option value="massachusetts">Massachusetts</option>
	        <option value="michigan">Michigan</option>
	        <option value="minnesota">Minnesota</option>
	        <option value="mississippi">Mississippi</option>
	        <option value="missouri">Missouri</option>
	        <option value="montana">Montana</option>
	        <option value="nebraska">Nebraska</option>
	        <option value="nevada">Nevada</option>
	        <option value="new hampshire">New Hampshire</option>
	        <option value="new jersey">New Jersey</option>
	        <option value="new mexico">New Mexico</option>
	        <option value="new york">New York</option>
	        <option value="north carolina">North Carolina</option>
	        <option value="north dakota">North Dakota</option>
	        <option value="ohio">Ohio</option>
	        <option value="oklahoma">Oklahoma</option>
	        <option value="oregon">Oregon</option>
	        <option value="pennsylvania">Pennsylvania</option>
	        <option value="rhode island">Rhode Island</option>
	        <option value="south carolina">South Carolina</option>
	        <option value="south dakota">South Dakota</option>
	        <option value="tennessee">Tennessee</option>
	        <option value="texas">Texas</option>
	        <option value="utah">Utah</option>
	        <option value="vermont">Vermont</option>
	        <option value="virginia">Virginia</option>
	        <option value="washington">Washington</option>
	        <option value="west virginia">West Virginia</option>
	        <option value="wisconsin">Wisconsin</option>
	        <option value="wyoming">Wyoming</option>			
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
			name = 'search1'
			class='btn-all-buttons'
			id='btnSubmit'/>
    </form>
    </div> <!-- end of form-wrapper -->
    </div><!-- end of #content -->
    <div id="center-area">
   
    </div>

<?php

if(isset($_POST['search1'])){
    //echo "search triggered";
    if(isset($_POST['search1'])){
        $name       = $playerDB->sanitize($_POST['name']);
        $sport      = $_POST['sport'];
        $state      = $_POST['state'];
        $class      = $_POST['class'];
        $position   = $playerDB->sanitize($_POST['position']);
        $school     = $playerDB->sanitize($_POST['school']);
        $gpa        = $_POST['gpa'];
        
        $arr = array();
        if($name != "") $arr[] = "name LIKE '%{$name}%'";
        if($sport != "") $arr[] = "sport = '{$sport}'";
        if($state != "") $arr[] = "state = '{$state}'";
        if($class != "") $arr[] = "gradyear = '{$class}'";
        if($position != "") $arr[] = "primaryposition LIKE '%{$position}%'";
        if($school != "") $arr[] = "highschool LIKE '%{$school}%'";
        if($gpa != "") $arr[] = "gpa >= '{$gpa}'";

        if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
            $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM players WHERE persontype = 'player';";
        }
        else{
            $query = "SELECT id, name, sport, email, persontype FROM players WHERE ";
            $query .= implode(" AND ", $arr);
            $query .= " AND persontype = 'player';";
        }
        //$data = $playerDB->searchPlayers($srch);
        $data = $playerDB->getPlayersByFindAthleteSearch($query);
        //header("Location: results.php?".http_build_query($data));
        echo $playerDB->getPlayersAsTable($data);
        //var_dump($data);
        echo $playerDB->getPlayers($data);
   }
 };
    include("assets/inc/footer.inc.php");

?>