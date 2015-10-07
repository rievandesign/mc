<?php 
$env = "dev";
if(array_key_exists("env", $_GET)) {
	$env = $_GET["env"];
}

$jarpath = realpath("../../saml/SAMLAuth/SignedSAMLBuilder.jar");
if($env == "dev") {
	$xmlpath = realpath("../../saml/SAMLAuth/docs/SAMLDOM-dev.xml");
	$keypath = realpath("../../saml/SAMLAuth/docs/dev/keystore.jks");
	$certpath = realpath("../../saml/SAMLAuth/docs/dev/publickey.cer");
	$posturl = "https://imp.healthcare.gov/marketplace/brokerService";
	$name = "DATA1EXPO1462";
}
else {
	$xmlpath = realpath("../../saml/SAMLAuth/docs/SAMLDOM-prod.xml");
	$keypath = realpath("../../saml/SAMLAuth/docs/prod/productionkeystore.jks");
	$certpath = realpath("../../saml/SAMLAuth/docs/prod/e9b6e74853b73e49.crt");
	$posturl = "https://www.healthcare.gov/marketplace/brokerService";
	$name = "alex.modglin";
}
exec('java -jar '.$jarpath.'  '.$xmlpath.' '.$keypath.' '.$certpath.' "FFE User ID" "'.$name.'"', $code);
?>

<html>
</head>
<body>
<form method="POST" action="<?php echo $posturl; ?>" name="samlcodeform">
<br>
<b>Posting To Broker Service
<br>
<textarea name="SAMLResponse" cols="150" rows="25" />
<?php echo implode("", $code); ?>
</textarea><br>
<input type="submit" value="Submit" name="submit"/>
</form>
</body>
</html>