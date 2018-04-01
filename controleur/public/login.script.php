<?php

$location = 'index.php';

if( isset($_POST['logout']) ) {
    // Unset all of the session variables.
    $_SESSION = array();
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();

} elseif( isset($_POST['username']) && $_POST['username'] == 'admin' &&
          isset($_POST['password']) && $_POST['password'] == 'admin' &&
          isset($_POST['login']) ) {
    
    
    $_SESSION['login'] = 'admin';
            
    if( isset($_SERVER['HTTP_REFERER']) ) $location = $_SERVER['HTTP_REFERER'];
}

header( 'Location: '. $location );
?>