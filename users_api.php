<?php


include '../qa-api/include/set_password.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"SETPASSWORD"}, "requesteBody" : {"user_id" : "1", "old_password" : "12345678", "new_password" : "87654321" }}

	// 	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"},"responseBody":{"user_id":"3", "sessioncode":"p0jec98k"}}
    //old password not valid
    //	{"responseHeader":{"serviceId":"111","status":"100"}}

include '../qa-api/include/reset_password.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"RESETPASSWORD"}, "requesteBody" : {"mail" : "test@test.co.il"}}

	// 	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"}}
    //  mail not valid
    //	{"responseHeader":{"serviceId":"111","status":"100"}}

include '../qa-api/include/check-login.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"ISSUESGITHUBE"}, "responseBody" : {"user_mail" : "test@gmail.com", "password" : "12345678" }}

	// 	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"},"responseBody":{"user_id":"3", "name":"Avraham", "sessioncode" : "hmocj3so"}}
    //pass envalid
    //	{"responseHeader":{"serviceId":"111","status":"100"}}
    //email envalid
    //	{"responseHeader":{"serviceId":"111","status":"110"}}

include '../qa-api/include/read-session-code.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"READSESSIONCODE"}, "responseBody" : {"user_id" : "3", "sessioncode" : "p0jec98k" }}

	// 	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"},"responseBody":{"user_mail":"test@test.com", "user_name":"test"}}
    //  not valid
    //	{"responseHeader":{"serviceId":"111","status":"100"}}

include '../qa-api/include/create-user.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"CREAETEUSER"}, "requestBody" : {"user_mail" : "test@gmail.com", "password" : "12345678", "user_name" : "test" }}

	// 	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"},"responseBody":{"user_id":"3", "sessioncode":"p0jec98k"}}
    //email exsist
    //	{"responseHeader":{"serviceId":"111","status":"100"}}

include '../qa-api/include/update-profile.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"UPDATEPROFILE" }, "requestBody" : { "user_id" : "1", "email_id" : "anoop@helloinfinity.com", "about" : "somthing"} }

	// 	Sample Output
	// 	{"responseHeader":{"status":"200","serviceId":"111","message":"Updated!"}}
include '../qa-api/include/get-user.php';//
// { "requestHeader": { "serviceId":"111", "interactionCode":"GETUSERQUESTIONS", "user_id" : "1" }}

// 	Sample Output
//	{"responseHeader":{"serviceId":"111","status":"200"},"responseBody":{"name":"test", "email":"teset@test.com", "points":"120"}}

include '../qa-api/include/log-off.php';//
	// { "requestHeader": { "serviceId":"111", "interactionCode":"LOGOFF" }, "requestBody" : { "id" : "12" } }

	//	Sample Output
	//	{"responseHeader":{"serviceId":"111","status":"200"}}

	$interactionCode = 'CREAETEUSER';

	$arr = array(
		"requestHeader" => array("serviceId" => "111", "interactionCode" => $interactionCode)//, 
		//"requestBody" => array("user_mail" => "test@gmail.com", "password" => "aaa", "user_name" => "jhsd")
	);

switch ($interactionCode) {
	case 'LOGOFF':
		LogOff($json_request);
		break;
	case 'SETPASSWORD':
		SetPassword($json_request);
		break;
	case 'RESETPASSWORD':
		ResetPassword($json_request);
		break;
	case 'CHECKLOGIN':
		ChackLogin($json_request);
		break;
	case 'READSESSIONCODE':
		ReadSessionCode($json_request);
		break;
	case 'CREAETEUSER':
		
			// { "requestHeader": { "serviceId":"111", "interactionCode":"CREAETEUSER"}, "requestBody" : {"user_mail" : "test@gmail.com", "password" : "12345678", "user_name" : "test" }}
		$arr = array(
			"requestHeader" => array("serviceId" => "111", "interactionCode" => "CREAETEUSER"), 
			"requestBody" => array("user_mail" => "test@gmail.com", "password" => "aaa", "user_name" => "jhsd")
		);

		$json_request = json_encode($arr);

		CreateUser($json_request);
		break;
	case 'UPDATEPROFILE':
		updateprofile($json_request);
		break;
	case 'VIEWPROFILE':
		view_profile($json_request);
		break;
	case 'GETUSERDETAILS':
		get_user($json_request);
		break;
	default:
		echo json_encode(array('responseHeader' => array(
			"serviceId" => $serviceId,
			"status" => "405",
			"message" => "Method Not Allowed"
		)));
		break;
}
