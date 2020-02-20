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
	
	
	// Check domain(s)
	$result = $api->CheckAvailability(
	
		// Second level domain as string array
		array(
			"domainnameapitest",
			"domaintest"
		),
		
		// TLD as string array
		array(
			"com",
			"net"
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
$result = $api->CheckAvailability(

	// Second level domain as string array
	array(
		"domainnameapitest",
		"domaintest"
	),
	
	// TLD as string array
	array(
		"com",
		"net"
	)

);

<?php

	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br /><table><tr><td><b>Domain</b></td><td><b>Status</b></td></tr>";
		foreach($result["data"] as $domain)
		{
			echo "<tr><td>" . $domain["DomainName"].".".$domain["TLD"] . "</td>";
			echo "<td>" . $domain["Status"] . "</td></tr>";
		}
		echo "</table><br /><br />";

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