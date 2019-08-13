<?php
session_start();

require_once('settings.php');


?>
<html>
<head>
<style type="text/css">

#login-button {
	display: block;
	text-align: center;
	margin: 50px 0;
}
#signout-button {
    display: block;
    text-align: center;
    margin: 50px 0;
}

</style>
</head>

<body>
<?php
if (isset($_POST['message'])) {
    echo $_POST['message'];
} else {
    echo "Please Sign in<br>";
}

if (!isset($_SESSION['user_name']) || !isset($_SESSION['logged_in']) ) {
    print_r($_SESSION);
    ?>
    <a id="login-button" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>">Login with Google</a>
<?php
} else {
    print_r($_SESSION);
    foreach ($_SESSION as $sess) {
        echo "<br>" . $sess;
    }
    echo "Logged In!";
}

?>
<a id="signout-button" href="signout.php">Sign Out</a>
</body>
</html>