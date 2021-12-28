<?php

namespace App\Services\Authenticators;

use App\Services\Interfaces\AuthenticationServiceInterface;
use ZipArchive;

class SampleAuthenticationService implements AuthenticationServiceInterface
{

	public function register( $data )
	{
		if ( $data == [ 'username' => 'admin', 'password' => 1234 ] ) 
			return 'sample-token';
		return false;
	} 

	public function login( $data )
	{
		if ( $data == [ 'username' => 'admin', 'password' => 1234 ] )
			return 'sample-token';
		return false;
	}

	public function check( $data ):bool 
	{
		return true;
	}

	public function refresh( $data )
	{
		if ( $data == 'sample-token' )
			return 'sample-refreshed-token';
		return false;
	}

}