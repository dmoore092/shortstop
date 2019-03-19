<?php 
    session_start();
    $relpath= ""; $title="Login"; $page="login";
    $imgpath="";
    $linkpath = "";
    $templinkpath = "";
    
    include("classes/Player.PDO.Class.php");
    $_SESSION['logged_in'] = 'false';
    if(isset($_POST["login"])){
        //echo "login called";
        $username = htmlentities(strip_tags(trim($_POST["username"])));//$_POST["username"];
        $password = htmlentities(strip_tags(trim($_POST["password"])));//$_POST["password"];

        $player = new PlayerDB();
        //user will equals (0 || false) || (1 || true)
        $isLoggedIn = $player->login($username, $password);
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        echo "<h1>Logged in</h1>";
        //var_dump($_SESSION['id']);
        //$id = $_SESSION['id'];
        header("Location: http://".$_SERVER["HTTP_HOST"] . "/profile.php?id={$_SESSION['id']}");
    }
?>
<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <form id="player-form"
                  method = "POST"
                  action= ""
                  onsubmit = "" >
                <h2>Reset My Password</h2>
                    <p>
                        <!-- <span class="span">First Name:* &nbsp; </span> -->
                        <input type="text"
                               id = "username"
                               name= "username"
                               size = "25"
                               maxlength = "150"
                               placeholder = "Enter Your Username"
                               value=""
                               onclick="" />
                    </p>
                    <button type="submit" name="reset" class="btn-all-buttons" id="btn-reset">Reset</button>
            </form>
<?php include('assets/inc/footer.inc.php'); ?>

<?php 
    if(isset($_POST['reset'])){
        $username = $playerDB->sanitize($_POST['username']);
        $username = strtolower($username);
        $fieldname = "email";
        // $data = $playerDB->getPlayersByFindAthleteSearch($query);
        $result = $playerDB->getFieldByUsername($fieldname, $username);
        var_dump("email is " . $result);
        // echo $playerDB->getPlayersAsTableasAdmin($data);
        //var_dump($data);
        // echo $playerDB->getPlayersWhileAdminMobile($data);
    }
?>