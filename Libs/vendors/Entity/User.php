<?php
namespace Libs;

session_start();

class User
{
	public function getvaribute($var)
	{
		return isset($_SESSION[$var]) ? $_SESSION[$var] : null;
	}

	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
		return $flash;
	}

	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] == true;
	}

	public function setvaribute($var, $value)
	{
		$_SESSION[$var] = $value;
	}

	public function setAuthenticated($authenticated = true)
	{
		if(!is_bool($authenticated))
		{
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated doit être un boolean');
		}
		$_SESSION['auth'] = $authenticated;
	}

	public function setFlash($value)
	{
		$_SESSION['flash'] = $value;
	}
}