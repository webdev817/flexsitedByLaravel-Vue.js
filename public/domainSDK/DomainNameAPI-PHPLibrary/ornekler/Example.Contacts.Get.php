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
	
	
	// Get contact informations of domain
	$result = $api->GetContacts(
		// DOMAIN NAME
		"domainnameapitest.com"
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
$result = $api->GetContacts(
	// DOMAIN NAME
	"domainnameapitest.com"
);

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />CONTACT INFORMATION RETRIEVED SUCCESSFULLY!";
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