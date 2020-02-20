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
	
	
	// Get domain list
	$result = $api->GetList();


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
$result = $api->GetList();

<?php	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />RETRIEVING OF DOMAIN LIST SUCCESSFUL!<br /><br />";

		echo "<table><tr><td><b>Domain</b></td><td><b>Status</b></td><td><b>Creation Date</b></td><td><b>Expiration Date</b></td></tr>";
		foreach($result["data"]["Domains"] as $domain)
		{
			echo "<tr><td>" . $domain["DomainName"] . "</td>";
			echo "<td>" . $domain["Status"] . "</td>";
			echo "<td>" . $domain["Dates"]["Start"] . "</td>";
			echo "<td>" . $domain["Dates"]["Expiration"] . "</td></tr>";
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