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
	
	$random = date("His");
	
	// Add childnameserver to domain
	$result = $api->AddChildNameServer(
		// DOMAIN NAME	
		"domainnameapitest.com",
		
		// Name of child nameserver
		"kocaeliyazilim" . $random . ".domainnameapitest.com", 
		
		// IP addresses of child nameserver
		array(
			"91.90.91.100", 
			"92.90.91.101",
			"93.91.90.102",
			"93.91.90.103"
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
$result = $api->AddChildNameServer(
	// DOMAIN NAME	
	"domainnameapitest.com",
	
	// Name of child nameserver
	"kocaeliyazilim<?php echo $random; ?>.domainnameapitest.com", 
	
	// IP addresses of child nameserver
	array(
		"91.90.91.100", 
		"92.90.91.101",
		"93.91.90.102",
		"93.91.90.103"
	)
);

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />CHILDNAMESERVER ADDED SUCCESSFULLY!";
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