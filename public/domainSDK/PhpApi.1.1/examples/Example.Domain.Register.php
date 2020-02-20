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
	
	// Register Domain
	$result = $api->RegisterWithContactInfo(

		// Domain name
		"randomtestdomain" . $random . ".com", 
		
		// Years
		1, 
		
		// Contact informations
		array(
			// Administrative contact
			"Administrative" => array(
				"FirstName" => "Fatih",
				"LastName" => "Ucler",
				"Company" => "Kocaeli Yazilim",
				"EMail" => "domain@kocaelitasarim.com",
				"AddressLine1" => "Kemalpasa Mah.",
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "8502203434",
				"FaxCountryCode" => "90",
				"Phone" => "8502202525",
				"PhoneCountryCode" => "90",
				"Type" => "Contact",
				"ZipCode" => "41000",
				"Status" => ""
			),
			
			// Billing contact
			"Billing" => array(
				"FirstName" => "Fatih",
				"LastName" => "Ucler",
				"Company" => "Kocaeli Yazilim",
				"EMail" => "domain@kocaelitasarim.com",
				"AddressLine1" => "Kemalpasa Mah.",
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "8502203434",
				"FaxCountryCode" => "90",
				"Phone" => "8502202525",
				"PhoneCountryCode" => "90",
				"Type" => "Contact",
				"ZipCode" => "41000",
				"Status" => ""
			),
			
			// Technical contact
			"Technical" => array(
				"FirstName" => "Fatih",
				"LastName" => "Ucler",
				"Company" => "Kocaeli Yazilim",
				"EMail" => "domain@kocaelitasarim.com",
				"AddressLine1" => "Kemalpasa Mah.",
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "8502203434",
				"FaxCountryCode" => "90",
				"Phone" => "8502202525",
				"PhoneCountryCode" => "90",
				"Type" => "Contact",
				"ZipCode" => "41000",
				"Status" => ""
			),
			
			// Registrant contact
			"Registrant" => array(
				"FirstName" => "Fatih",
				"LastName" => "Ucler",
				"Company" => "Kocaeli Yazilim",
				"EMail" => "domain@kocaelitasarim.com",
				"AddressLine1" => "Kemalpasa Mah.",
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "8502203434",
				"FaxCountryCode" => "90",
				"Phone" => "8502202525",
				"PhoneCountryCode" => "90",
				"Type" => "Contact",
				"ZipCode" => "41000",
				"Status" => ""
			),
			
		),
		
		// Nameservers
		array("ns1.543yazilim.info", "ns2.543yazilim.info"),
	
		// Theft protection lock enabled
		true,
	
		// Privacy Protection enabled
		false
		
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
$result = $api->RegisterWithContactInfo(

	// Domain name
	"randomtestdomain<?php echo $random; ?>.com", 
	
	// Years
	1, 
	
	// Contact informations
	array(
		// Administrative contact
		"Administrative" => array(
			"FirstName" => "Fatih",
			"LastName" => "Ucler",
			"Company" => "Kocaeli Yazilim",
			"EMail" => "domain@kocaelitasarim.com",
			"AddressLine1" => "Kemalpasa Mah.",
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "8502203434",
			"FaxCountryCode" => "90",
			"Phone" => "8502202525",
			"PhoneCountryCode" => "90",
			"Type" => "Contact",
			"ZipCode" => "41000",
			"Status" => ""
		),
		
		// Billing contact
		"Billing" => array(
			"FirstName" => "Fatih",
			"LastName" => "Ucler",
			"Company" => "Kocaeli Yazilim",
			"EMail" => "domain@kocaelitasarim.com",
			"AddressLine1" => "Kemalpasa Mah.",
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "8502203434",
			"FaxCountryCode" => "90",
			"Phone" => "8502202525",
			"PhoneCountryCode" => "90",
			"Type" => "Contact",
			"ZipCode" => "41000",
			"Status" => ""
		),
		
		// Technical contact
		"Technical" => array(
			"FirstName" => "Fatih",
			"LastName" => "Ucler",
			"Company" => "Kocaeli Yazilim",
			"EMail" => "domain@kocaelitasarim.com",
			"AddressLine1" => "Kemalpasa Mah.",
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "8502203434",
			"FaxCountryCode" => "90",
			"Phone" => "8502202525",
			"PhoneCountryCode" => "90",
			"Type" => "Contact",
			"ZipCode" => "41000",
			"Status" => ""
		),
		
		// Registrant contact
		"Registrant" => array(
			"FirstName" => "Fatih",
			"LastName" => "Ucler",
			"Company" => "Kocaeli Yazilim",
			"EMail" => "domain@kocaelitasarim.com",
			"AddressLine1" => "Kemalpasa Mah.",
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "8502203434",
			"FaxCountryCode" => "90",
			"Phone" => "8502202525",
			"PhoneCountryCode" => "90",
			"Type" => "Contact",
			"ZipCode" => "41000",
			"Status" => ""
		),
		
	),
	
	// Nameservers
	array("ns1.543yazilim.info", "ns2.543yazilim.info"),

	// Theft protection lock enabled
	true,

	// Privacy Protection enabled
	false
	
);

<?php
	
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />DOMAIN REGISTER SUCCESSFUL!";
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