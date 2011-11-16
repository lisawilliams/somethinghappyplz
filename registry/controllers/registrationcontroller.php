<?php

/**
 * Registration controller
 * Manages user registration etc. 
 */
class Registrationcontroller{
	
	/**
	 * Our registry object
	 */
	private $registry;
	
	/**
	 * Standard registration fields
	 */
	private $fields = array( 'user' => 'username', 'password' => 'password', 'password_confirm' => 'password confirmation', 'email' => 'email address');
	
	/**
	 * Any errors in the registration
	 */
	private $registrationErrors = array();
	
	/**
	 * Array of error label classes - allows us to make a field a different color, to indicate there were errors
	 */
	private $registrationErrorLabels = array();
	
	/**
	 * The values the user has submitted when registering
	 */
	private $submittedValues = array();
	
	/**
	 * The santized versions of the values the user has submitted - these are database ready
	 */
	private $sanitizedValues = array();
	
	/*
	 * Should our users automatically be "active" or should they require email verification?
	 */   
	private $activeValue = 1; 
	
	
	private function checkRegistration() 
		{
			$allClear = true;
	 		// blank fields
	 		foreach( $this->fields as $field => $name )
	 			{
	 				if( !isset( $_POST[ 'register_' . $field ] ) || 
	 				$_POST[ 'register_' . $field ] == '' )
	 				
	 				{	
	 					$allClear = false;
	 					$this->registrationErrors[] = 'O HAI, YOU MUST ENTER A ' . $name;
	 					$this->registrationErrorLabels[ 'register_' . $field . '_ label'] = 'error';
	 				}		 
	 			}
	 		// passwords match ?
	 		if( $_POST[ 'register_password' ] != $_POST[ 'register_password_confirm' ] )
	 		
	 			{
	 				$allClear = false;
	 				$this->registrationErrors[] = 'OH NOES. THOSE PASSWURDS NO MATCH.  THEY CLASH TERRIBLE.';		
	 				$this->registrationErrorLabels[ 'register_password_confirm_label'] = 'error';
	 			}
	 		// password length
	 		if( strlen($_POST['register_password'] ) < 6 ) 
	 			{
	 				$allClear = false;
	 				$this->registrationErrors[] 'Passwurd less than 6 letters.  DO NOT WANT.';
	 				$this->registrationErrorLabels['register_password_label'] = 'error';
	 				$this->registrationErrorLabels['register_password_confirm_label'] = 'error';
	 			}
	 		// email headers
	 		if( strpos( ( urldecode( $_POST[ 'register_email' ] ) ), "\r" ) === true  || strpos( ( urldecode( $_POST['register_email' ] ) ), "\n" ) === true )
	 			{
	 				$allClear = false;
	 				$this->registrationErrors[] = 'UR EMAIL IS INVALID.';
	 				$this->registrationErrorLabels['register_email_label'] = 'error';
	 			}
	 		// email valid 
	 		if( ! preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})^", $_POST[ 'register_email' ] ) )
	 		{
			$allClear = false;
			$this->registrationErrors[] = 'You must enter a valid email address';
			$this->registrationErrorLabels['register_email_label'] = 'error';
			}
			
			// terms accepted
			if( !isset( $_POST['register_terms'] ) || $_POST['register_terms'] != 1 )
			{
			$allClear = false;
			$this->registrationErrors[] = "OUR termz and condishuns, u will accept dem.";
			$this->registrationErrorLabels['register_terms_label'] = 'error';
			}
							
	 	
	 