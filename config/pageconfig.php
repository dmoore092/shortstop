<?php
	$environment = getenv("APPLICATION_ENV");
	
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$PAGE = "main"; 
			$TITLE = "Home";
			break;
		case "/login.php":
			$PAGE = "login"; 
			$TITLE = "Login";
			break;
		case "/profile.php":
			$PAGE="profile"; 
			$TITLE = "Profile";
			break;
		case "/findathletes.php":
			$PAGE = "mfathletes"; 
			$TITLE = "Search Athletes";
			break;
		case "/about.php":
			$PAGE = "about"; 
            $TITLE = "About Us";
			break;
		case "/changepassword.php":
			$PAGE = "login"; 
			$TITLE = "Select A New Password";
			break;
		case "/logout.php":
			$PAGE = "logout"; 
			$TITLE = "Logout";
			break;
		case "/myinfo.php":
			$PAGE = "myinfo"; 
			$TITLE = "My Info";
			break;
		case "/blog.php":
			$PAGE="blog"; 
			$TITLE = "Blog";
			break;
		case "/passwordreset.php":
			$PAGE="passwordreset"; 
			$TITLE = "Reset My Password";
			break;
		case "/recover.php":
			$PAGE="login"; 
			$TITLE = "Recover My Password";
			break;
		case "/results.php":
			$PAGE="mfathletes"; 
			$TITLE = "Search Results";
			break;
		case "/register.php":
			$PAGE="login"; 
			$TITLE = "Register";
			break;
		case "/test.php":
			$PAGE="profile"; 
			$TITLE = "TEST";
			break;
		// default:
		// 	$CURRENT_PAGE = "Index";
		// 	$PAGE_TITLE = "Welcome to my homepage!";
	}
?>