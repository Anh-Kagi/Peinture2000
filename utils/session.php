<?php
class SessionManager
{
	private static $COOKIE_NAME = 'peinture_2000_fr_session';
	private static $DOMAIN = 'localhost'; // à changer lors du déploiement
	private static $LIMIT = 0;
	private static $PATH = '/';
	private static $IS_HTTPS = true;
	
	static function sessionStart()
	{
		// Set the cookie name
		session_name(self::$COOKIE_NAME);

		// Set session cookie options
		session_set_cookie_params(self::$LIMIT, self::$PATH, self::$DOMAIN, self::$IS_HTTPS, true);
		session_start();

		// Make sure the session hasn't expired, and destroy it if it has
		if(self::validateSession())
		{
			// Check to see if the session is new or a hijacking attempt
			if(self::preventHijacking())
			{
				// Reset session data and regenerate id
				$_SESSION = array();
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				self::regenerateSession();
			// Give a 5% chance of the session id changing on any request
			}elseif(rand(1, 100) <= 5){
				self::regenerateSession();
			}
		}else{
			$_SESSION = array();
			session_destroy();
			session_start();
		}
	}
	
	static function regenerateSession()
	{
		// If this session is obsolete it means there already is a new id
		if(isset($_SESSION['OBSOLETE']) || @$_SESSION['OBSOLETE'] == true)
			return;

		// Set current session to expire in 10 seconds
		$_SESSION['OBSOLETE'] = true;
		$_SESSION['EXPIRES'] = time() + 10;
		

		// Create new session without destroying the old one
		if(session_regenerate_id(false)){
			unset($_SESSION['OBSOLETE']);
			unset($_SESSION['EXPIRES']);
		}
	}
	
	static function sessionStop()
	{
		$_SESSION = [];
		// Set current session to expire in 10 seconds
		$_SESSION['OBSOLETE'] = true;
		$_SESSION['EXPIRES'] = time() + 10;

		session_write_close();
		set_cookie(self::$COOKIE_NAME);
	}

	static protected function preventHijacking()
	{
		if(!isset($_SESSION['IPaddress']) || $_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'])
			return true;

		if(!isset($_SESSION['userAgent']) || $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'])
			return true;
		
		return false;
	}
	
	static protected function validateSession()
	{
		if(isset($_SESSION['EXPIRES']) && $_SESSION['EXPIRES'] < time())
			return false;

		return true;
	}
	
}

SessionManager::sessionStart();
?>