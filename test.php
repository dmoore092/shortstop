<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog | Athletic Prospects</title>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/blog.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icon library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/javascript/jqueryui-1.12.1/jquery-ui.css" />
        <script type="text/javascript" src="assets/javascript/jqueryui-1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="assets/javascript/jPaginate/src/jQuery.paginate.js"></script>
        <script src="assets/javascript/inputmask/dist/jquery.inputmask.js"></script>
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dale Moore">
        <meta name="description" content="We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process."/>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
<header>
                    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <div><a href="javascript:void(0);" class="navicon" onclick="openNav()">Menu</a></div>
                <script>
                    function openNav(){
                        var nav = document.querySelector('.nav');
                        if(nav.style.display === "block"){
                            nav.style.display = 'none';
                        }
                        else{
                            nav.style.display = 'block';
                        }
                    }
                </script>
            <div id="big-login">
                <div class="social-media">
                    <span id="followUS">Follow US </span>
                    <a href="http://www.facebook.com/Athletic-Prospects-191313784947225" target="_blank" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com/A_Prospects" target="_blank" class="fa fa-twitter"></a>
                    <a href="http://www.instagram.com/athleticprospects" target="_blank" class="fa fa-instagram"></a>
                    <!-- <a href="mailto:kprestano@athleticprospects.com" class="fa fa-envelope"></a> -->
                </div>
                <ul>
                    <li id='big-login-button'><a class='link' href='logout.php'>Logout</a></li>                   <!-- <li id="big-login-button"><a href="login.php">Login</a></li>-->
                </ul>
            </div><!-- #big-login end
           --><div id="search">
                <div id="search-container">
                    <form action='results.php' method='POST' id="search-form"> 
                        <input id="textbox" type="text" size="50" placeholder= "First or Last Name" name="search">
                        <input id="button" class="searchbtn" type="submit" name="search-btn" value="Search">
                    </form>
                </div>
            </div>
                <div class="nav">
                    <ul>
                        <!-- <li id="mobile-login"><a href="login.php">Login</a></li> -->
                        <li id='mobile-login'><a class='link' href='logout.php'>Logout</a></li>                        <li id="current"><a href="index.php">Home</a></li>
                        <li><a href="profile.php?id=1">My Profile</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="findathletes.php">Find Athletes</a></li>
                                               <li><a href="register.php">Register</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="/assets/img/siteLogo.png" alt="logo" id="logo-img"></div>
        </header>
        <div id="body-main">   
            <h1>Blog @ Athletic Prospects</h1>
            <hr />
            <div class="blog">
         		<div class="post">
					 <p>
						 <form action='blog.php' >
							 <button name='delete-post' value='16'>Delete Post</button>
						</form>
						<h3>First Real Post Test</h3>
						<h6>By Keith Prestano</h6>
						<h6>2019-09-04 15:35:40</h6>
						<img src='assets/img/blogpictures/black.JPG' alt='blog picture' id='blog-pic'>
						<p id='post'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi posuere porta aliquam. Nunc egestas id nunc eu volutpat. Morbi fringilla venenatis nunc a cursus. Aliquam quis finibus erat. In non finibus felis. Etiam semper tristique nulla, a luctus tellus vehicula vitae. Morbi at ornare eros. Nam ornare, enim vel congue bibendum, libero odio euismod ligula, id suscipit nibh augue ac augue. In ante elit, ornare ac pulvinar eu, ultricies a orci. Maecenas scelerisque mattis fringilla. Sed facilisis sed lorem quis volutpat. Maecenas lacinia quam eu maximus pretium. Phasellus enim nulla, pharetra ut blandit imperdiet, interdum eu nulla. Fusce tellus dui, gravida vitae urna eu, imperdiet laoreet purus.<br />
							<br />
							Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis et purus mi. Curabitur vehicula tempus accumsan. Donec eget enim vehicula, cursus risus eget, vehicula leo. Mauris dignissim ultrices ante quis ornare. Quisque nec quam ante. Quisque fermentum at mauris id sollicitudin. Praesent nec imperdiet risus. Donec eu augue odio. In vel diam quis odio euismod malesuada. Proin sed odio pellentesque, porttitor eros quis, porttitor lectus. Fusce aliquam est sed est blandit semper. Sed dignissim, neque at placerat blandit, lorem lectus lacinia metus, tristique tristique quam quam sit amet velit.<br />
							<br />
							Quisque dignissim tempor massa, ac viverra urna luctus ut. Nulla vitae nulla sed nibh tempus varius id nec magna. Etiam faucibus volutpat massa, eget suscipit libero luctus iaculis. Aliquam ac bibendum ante, ac pharetra felis. Cras elementum ex malesuada sem gravida, in viverra felis volutpat. Duis eu sem nibh. Aliquam sed dapibus mauris. Sed placerat, felis ut bibendum blandit, sapien enim semper dui, id tristique tortor est ac diam. Fusce gravida risus eget tellus tincidunt posuere. Maecenas lacinia ligula a metus vehicula, a semper lectus posuere. Quisque felis elit, lacinia nec iaculis sit amet, dignissim eget turpis.<br />
							<br />
							Aliquam scelerisque maximus nunc nec aliquam. Praesent vitae ex lorem. Cras consequat nisi non massa sodales tincidunt id in mauris. Nullam pharetra, turpis vitae volutpat efficitur, nunc libero facilisis enim, in aliquet enim ex quis velit. Cras posuere viverra nulla vulputate vulputate. Curabitur sit amet aliquam libero, sed consectetur nunc. Ut tristique feugiat nibh a consectetur. Etiam at sapien dignissim, sodales tellus non, posuere est. Sed volutpat neque massa, ac vulputate enim bibendum vitae. Aliquam risus sem, porta eu turpis et, condimentum blandit nulla. Pellentesque at metus non est feugiat posuere. Cras at placerat sapien. Curabitur luctus lectus a urna blandit dignissim. Etiam auctor, ante sed facilisis ullamcorper, diam quam tincidunt lacus, eget vestibulum ipsum mauris sed ligula. Curabitur ac leo pretium, volutpat nulla sit amet, suscipit quam.<br />
							<br />
							Sed rutrum at nulla vitae porta. Praesent et lacus mollis, fermentum lorem id, venenatis risus. Donec risus dui, varius nec lobortis at, condimentum hendrerit ante. Suspendisse et ex mi. Ut vitae tempor sapien. In velit est, tristique at accumsan a, ullamcorper sit amet ex. Praesent imperdiet maximus urna, vitae rutrum risus tempor sed. Sed augue lacus, condimentum in dolor sed, fermentum facilisis neque. Maecenas a dictum nunc. Sed cursus ligula ante, id efficitur risus dignissim sit amet. Quisque vulputate nunc eget lobortis feugiat. Donec sed orci at ipsum cursus mattis ut sed arcu. 
						</p>
							<p>Tags: Sports, education</p>
							<hr></p>
				</div> <!-- end of post -->
				<div class="post">
					<p>
						<form action='blog.php' >
							<button name='delete-post' value='15'>Delete Post</button>
						</form>
						<h3>Post 5</h3>
						<h6>By Keith Prestano</h6>
						<h6>2019-09-04 15:32:48</h6>
						<img src='assets/img/blogpictures/20190204-RosaParks_EN-US3305378721_1920x1080.jpg' alt='blog picture' id='blog-pic'>
						<p id='post'>Post 5</p>
						<div class='clear'></div>
						<div>
							<p>Tags: sports</p>
						<hr>
					</p>
				</div><!-- end of post -->
				<div class="post">
					<p>
						<form action='blog.php' >
							<button name='delete-post' value='14'>Delete Post</button>
						</form>
						<h3>post 3</h3>
						<h6>By Keith Prestano</h6>
						<h6>2019-09-04 15:31:26</h6>
						<p id='post'>Post 3</p>
						<div class='clear'></div>
						<p id='frame-container'>
							<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
						</p><div><p>Tags: sports</p>
						<hr>
					</p>
				</div><!-- end of post -->
				<div class="post">
					<p>
						<form action='blog.php' >
							<button name='delete-post' value='13'>Delete Post</button>
						</form><h3>post 3</h3>
						<h6>By Keith Prestano</h6>
						<h6>2019-09-04 15:30:42</h6>
						<p id='post'>Post 3</p>
						<div class='clear'></div>
						<p id='frame-container'>
							<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
							</p>
								<p>Tags: sports</p>
								<hr>
							</p>
				</div><!-- end of post -->
						<div class="post">
							<p>
								<form action='blog.php' >
									<button name='delete-post' value='12'>Delete Post</button>
								</form>
								<h3>post 3</h3>
								<h6>By Keith Prestano</h6>
								<h6>2019-09-04 15:29:11</h6>
								<p id='post'>Post 3</p>
								<div class='clear'></div>
								<p id='frame-container'>
									<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
								</p>
								<p>Tags: sports</p>
								<hr>
							</p>
						</div><!-- end of post -->
							<div class="post">
								<p><form action='blog.php' >
									<button name='delete-post' value='11'>Delete Post</button>
								</form><h3>post 3</h3>
								<h6>By Keith Prestano</h6>
								<h6>2019-09-04 15:27:17</h6>
								<p id='post'>Post 3</p>
								<div class='clear'></div>
								<p id='frame-container'>
									<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
								</p>
									<p>Tags: sports</p>
									<hr>
								</p>
							</div><!-- end of post -->
							<div class="post">
								<p>
									<form action='blog.php' >
										<button name='delete-post' value='10'>Delete Post</button>
									</form>
									<h3>post 3</h3>
									<h6>By Keith Prestano</h6>
									<h6>2019-09-04 15:27:13</h6>
									<p id='post'>Post 3</p>
									<div class='clear'></div>
									<p id='frame-container'>
										<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
									</p>
										<p>Tags: sports</p>
										<hr>
								</p>
							</div><!-- end of post -->
							<div class="post">
								<p>
									<form action='blog.php' >
										<button name='delete-post' value='9'>Delete Post</button>
									</form
									><h3>Post 2</h3>
									<h6>By Keith Prestano</h6>
									<h6>2019-09-04 15:03:22</h6>
									<img src='assets/img/blogpictures/20190202-HoaryMarmot_EN-US3130702758_1920x1080.jpg' alt='blog picture' id='blog-pic'>
									<p id='post'>lkjlkjlkjkl</p>
									<div class='clear'></div>
									<p id='frame-container'>
										<iframe id='ytplayer' allowfullscreen type='text/html' src='https://www.youtube.com/embed/Ql2THDlBD9g'></iframe>
									</p>
										<p>Tags: sports</p>
										<hr>
								</p>
							</div><!-- end of post -->
							<div class="post">
								<p>
									<form action='blog.php' >
										<button name='delete-post' value='8'>Delete Post</button>
									</form>
									<h3>post 1</h3>
									<h6>By Keith Prestano</h6>
									<h6>2019-09-04 11:28:54</h6>
									<img src='assets/img/blogpictures/20190201-MigrationDance_EN-US2906909257_1920x1080.jpg' alt='blog picture' id='blog-pic'>
									<p id='post'>Post 1</p>
									<div class='clear'></div>
									<div>
										<p>Tags: sports</p>
										<hr>
								</p>
							</div> <!-- end of post -->
						</div> <!-- end of .pagination -->
        <script>
            $(document).ready(function(){
               //alert('ready');
               $('.blog').paginate({
                   items_per_page  : 2,
                   border: true,
                   border_color: '#fff',
                   background_color: '#bb0a1e',
                   rotate: true,
                });
            });
        </script> 

        <hr />
        <footer>
            <div id="foot-wrapper">
                <span id="follow">Follow Us!</span>
                <div class="social-media" id="sm-footer">
                    <a href="http://www.facebook.com/Athletic-Prospects-191313784947225" target="_blank" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com/A_Prospects" target="_blank" class="fa fa-twitter"></a>
                    <a href="http://www.instagram.com/athleticprospects" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:kprestano@athleticprospects.com" class="fa fa-envelope"></a>
                </div> <!-- end of social-media -->
            </div> <!-- end of foot-wrapper -->
            <div>
                <p id="copyright">&copy; 2018-2019 Athletic Prospects</p>
            </div>
        </footer>
        </div><!-- end of body-main -->
    </body>   
</html>
<script>
    function deletePost(){
        if(confirm("Really Delete Post?", event.preventDefault()));
    }
</script>