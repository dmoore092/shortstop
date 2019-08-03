<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>

<?php include_once ("classes/Player.PDO.Class.php"); 
      $name = "";
      $position = "";
      $school = "";
      $playerDB = new PlayerDB();?>

<?php include("assets/inc/header.inc.php"); ?>

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
            <option value='Football'>Football</option>
            <option value='Basketball'>Basketball</option>
            <option value='Baseball'>Baseball</option>
            <option value='Softball'>Softball</option>
            <option value='Hockey'>Hockey</option>
            <option value='Fieldhockey'>Field Hockey</option>
            <option value='Lacrosse'>Lacrosse</option>
            <option value='Soccer'>Soccer</option>
            <option value='TrackandField'>Track and Field</option>
            <option value='Volleyball'>Volleyball</option>
            <option value='Wrestling'>Wrestling</option>
            <option value='Tennis'>Tennis</option>
            <option value='Swimming'>Swimming</option>
            <option value='Golf'>Golf</option>
            <option value='Gymnastics'>Gymnastics</option>
            <option value='Cheerleading'>Cheerleading</option>
            <option value='Esports'>Esports</option>
        </select>
        <select name='state'>
        <option value=' ' selected disabled>Select State:</option>
            <option value="New York">New York</option>
	        <option value="Alabama">Alabama</option>
	        <option value="Alaska">Alaska</option>
	        <option value="Arizona">Arizona</option>
	        <option value="Arkansas">Arkansas</option>
	        <option value="California">California</option>
	        <option value="Colorado">Colorado</option>
	        <option value="Connecticut">Connecticut</option>
	        <option value="Delaware">Delaware</option>
	        <option value="District of columbia">District Of Columbia</option>
	        <option value="Florida">Florida</option>
	        <option value="Georgia">Georgia</option>
	        <option value="Hawaii">Hawaii</option>
	        <option value="Idaho">Idaho</option>
	        <option value="Illinois">Illinois</option>
	        <option value="Indiana">Indiana</option>
	        <option value="Iowa">Iowa</option>
	        <option value="Kansas">Kansas</option>
	        <option value="Kentucky">Kentucky</option>
	        <option value="Louisiana">Louisiana</option>
	        <option value="Maine">Maine</option>
	        <option value="Maryland">Maryland</option>
	        <option value="Massachusetts">Massachusetts</option>
	        <option value="Michigan">Michigan</option>
	        <option value="Minnesota">Minnesota</option>
	        <option value="Mississippi">Mississippi</option>
	        <option value="Missouri">Missouri</option>
	        <option value="Montana">Montana</option>
	        <option value="Nebraska">Nebraska</option>
	        <option value="Nevada">Nevada</option>
	        <option value="New Hampshire">New Hampshire</option>
	        <option value="New Jersey">New Jersey</option>
	        <option value="New Mexico">New Mexico</option>
	        <option value="New York">New York</option>
	        <option value="North Carolina">North Carolina</option>
	        <option value="North Dakota">North Dakota</option>
	        <option value="Ohio">Ohio</option>
	        <option value="Oklahoma">Oklahoma</option>
	        <option value="Oregon">Oregon</option>
	        <option value="Pennsylvania">Pennsylvania</option>
	        <option value="Rhode Island">Rhode Island</option>
	        <option value="South Carolina">South Carolina</option>
	        <option value="South Dakota">South Dakota</option>
	        <option value="Tennessee">Tennessee</option>
	        <option value="Texas">Texas</option>
	        <option value="Utah">Utah</option>
	        <option value="Vermont">Vermont</option>
	        <option value="Virginia">Virginia</option>
	        <option value="Washington">Washington</option>
	        <option value="West Virginia">West Virginia</option>
	        <option value="Wisconsin">Wisconsin</option>
	        <option value="Wyoming">Wyoming</option>			
        </select>
        <select name='class'>
            <option value=' ' selected disabled>Class of:</option>
            <option value='2024'>2024</option>
            <option value='2023'>2023</option>
            <option value='2022'>2022</option>
            <option value='2021'>2021</option>
            <option value='2020'>2020</option>
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
			name = 'search-athlete'
			class='btn-all-buttons'
			id='btnSubmit'/>
    </form>
    </div> <!-- end of form-wrapper -->
    </div><!-- end of #content -->
<?php include("assets/inc/searchathlete.php"); ?>
<?php    include("assets/inc/footer.inc.php");?>

