<?php

	require_once("api.php");

	// Initialize API
	$api = new DomainNameAPI_PHPLibrary();
	
	// Set Domain Name API Username and Password
	$api->setUser("ownername", "ownerpass");
	
	// Enabling caching is recommended
	$api->useCaching(true);
	
	// Enable test mode (For using real platform, set it false)
	$api->useTestMode(true);
	
	$random1 = intval(date("s")) + 19;
	$random2 = $random1 % 19;
	
	// Update nameserver(s) of domain
	$result = $api->ModifyNameserver(
		// DOMAIN NAME
		"domainnameapitest.com", 
		
		// NAME SERVERS
		array(
			"ns" . $random1 . ".domainnameapi.info",
			"ns" . $random2 . ".domainnameapi.info"
		)
	);

	echo "<pre>";
?>
<b>INITIALIZING API:</b>

require_once("api.php");

// Initialize API
$api = new DomainNameAPI_PHPLibrary();

// Set Domain Name API Username and Password
$api->setUser("ownername", "ownerpass");

// Enabling caching is recommended
$api->useCaching(true);

// Enable test mode (For using real platform, set it false)
$api->useTestMode(true);
	
<b>REQUEST:</b>
$result = $api->ModifyNameserver(
	// DOMAIN NAME
	"domainnameapitest.com", 
	
	// NAME SERVERS
	array(
		"ns<?php echo $random1; ?>.domainnameapi.info",
		"ns<?php echo $random2; ?>.domainnameapi.info"
	)
);

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />NAMESERVER(s) UPDATED SUCCESSFULLY!<br /><br />";
	}
	else
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />AN ERROR HAS OCCURED!<br /><br />";
		echo "ERROR:<br />";
		echo "Code: " . $result["error"]["Code"]."<br />";
		echo "Message: " . $result["error"]["Message"]."<br />";
		echo "Details: " . $result["error"]["Details"]."<br />";
	}
	
	echo "</pre>";
	
?>