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
	$result = $api->SaveContacts(
	
		// DOMAIN NAME
		"domainnameapitest.com", 
	
		// CONTACTS
		array(
		
			// Administrative contact
			"Administrative" => array(
				"FirstName" => "Fatih",
				"LastName" => utf8_encode("Üçler"),
				"Company" => utf8_encode("Kocaeli Yazılım"),
				"EMail" => "destek@kocaelitasarim.com",
				"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "2629880141",
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
				"LastName" => utf8_encode("Üçler"),
				"Company" => utf8_encode("Kocaeli Yazılım"),
				"EMail" => "destek@kocaelitasarim.com",
				"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "2629880141",
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
				"LastName" => utf8_encode("Üçler"),
				"Company" => utf8_encode("Kocaeli Yazılım"),
				"EMail" => "destek@kocaelitasarim.com",
				"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "2629880141",
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
				"LastName" => utf8_encode("Üçler"),
				"Company" => utf8_encode("Kocaeli Yazılım"),
				"EMail" => "destek@kocaelitasarim.com",
				"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
				"State" => "Izmit",
				"City" => "Kocaeli",
				"Country" => "TR",
				"Fax" => "2629880141",
				"FaxCountryCode" => "90",
				"Phone" => "8502202525",
				"PhoneCountryCode" => "90",
				"Type" => "Contact",
				"ZipCode" => "41000",
				"Status" => ""
			),
			
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
$result = $api->SaveContacts(

	// DOMAIN NAME
	"domainnameapitest.com", 

	// CONTACTS
	array(
	
		// Administrative contact
		"Administrative" => array(
			"FirstName" => "Fatih",
			"LastName" => utf8_encode("Ucler"),
			"Company" => utf8_encode("Kocaeli Yazılım"),
			"EMail" => "destek@kocaelitasarim.com",
			"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "2629880141",
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
			"LastName" => utf8_encode("Ucler"),
			"Company" => utf8_encode("Kocaeli Yazılım"),
			"EMail" => "destek@kocaelitasarim.com",
			"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "2629880141",
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
			"LastName" => utf8_encode("Ucler"),
			"Company" => utf8_encode("Kocaeli Yazılım"),
			"EMail" => "destek@kocaelitasarim.com",
			"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "2629880141",
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
			"LastName" => utf8_encode("Ucler"),
			"Company" => utf8_encode("Kocaeli Yazılım"),
			"EMail" => "destek@kocaelitasarim.com",
			"AddressLine1" => utf8_encode("Kemalpaşa Mah. Kemaliye Cad. Nizamettin Çetin İşhanı"),
			"State" => "Izmit",
			"City" => "Kocaeli",
			"Country" => "TR",
			"Fax" => "2629880141",
			"FaxCountryCode" => "90",
			"Phone" => "8502202525",
			"PhoneCountryCode" => "90",
			"Type" => "Contact",
			"ZipCode" => "41000",
			"Status" => ""
		),
		
	)
);

<?php
	if($result["result"] == "OK")
	{
		echo "<b>RESPONSE:</b><br />";
		print_r($result);

		echo "<br />CONTACT INFORMATION UPDATED SUCCESSFULLY!";
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