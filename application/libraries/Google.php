<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Google extends Google_Client {
	function __construct() {
		parent::__construct(); 
		$this->setAuthConfigFile(APPPATH . 'client_secret.json');
		$this->setRedirectUri('http://localhost/auth_bipaloka/auth');
		$this->setScopes(array(
                    "https://www.googleapis.com/auth/contacts",
"https://www.googleapis.com/auth/contacts.readonly",
"https://www.googleapis.com/auth/profile.agerange.read",
"https://www.googleapis.com/auth/profile.emails.read",
"https://www.googleapis.com/auth/profile.language.read",
"https://www.googleapis.com/auth/user.addresses.read",
"https://www.googleapis.com/auth/user.birthday.read",
"https://www.googleapis.com/auth/user.emails.read",
"https://www.googleapis.com/auth/user.phonenumbers.read",
"https://www.googleapis.com/auth/userinfo.email",
"https://www.googleapis.com/auth/userinfo.profile"
		
		)); 
	}
}