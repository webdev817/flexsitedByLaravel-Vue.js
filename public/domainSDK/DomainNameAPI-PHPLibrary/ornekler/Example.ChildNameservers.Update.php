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
	
	$random1 = date("s");
	$random2 = $random1 * 2;
	
	// Update childnameserver of domain
	$result = $api->ModifyChildNameServer(
		// DOMAIN NAME	
		"domainnameapitest.com",
		
		// Name of child nameserver
		"kocaeliyazilim.domainnameapitest.com", 
		
		// IP addresses of child nameserver
		array(
			"91.90.91." . $random1, 
			"92.90.91." . $random2
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
$result = $api->ModifyChildNameServer(
	// DOMAIN NAME	
	"domainnameapitest.com",
	
	// Name of child nameserver
	"kocaeliyazilim.domainnameapitest.com", 
	
	// IP addresses of child nameserver
	array(
		"91.90.91.<? echo $random1; ?>", 
		"92.90.91.<? echo $random2; ?>"
	)
);

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />CHILDNAMESERVER UPDATED SUCCESSFULLY!";
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