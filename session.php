<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}

if ( isset($_SESSION['logged']) ) {
	$logged = $_SESSION['logged'];
}
else { ?>
	<script>
	sessionStorage.setItem('userID','');
	</script>	
<?php }

// if ( isset($_SESSION['logName']) )
// 	$logName = $_SESSION['logName'];
// else 
// 	$logName = '';
?>