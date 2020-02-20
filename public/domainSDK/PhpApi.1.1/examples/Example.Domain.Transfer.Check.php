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
	
	
	// Check transfer of domain
	$result = $api->CheckTransfer(
		// DOMAIN NAME	
		"testtransfercheck.com",
		
		// Name of child nameserver
		"INI1:LylbwXb"
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
	$result = $api->CheckTransfer(
		// DOMAIN NAME	
		"testtransfercheck.com",
		
		// Name of child nameserver
		"INI1:LylbwXb"
	);

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />CHECK TRANSFER OPERATION SUCCESSFULLY!";
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