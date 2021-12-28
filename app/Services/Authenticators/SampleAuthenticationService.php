<?php

namespace App\Services\Authenticators;

use App\Services\Interfaces\AuthenticationServiceInterface;

class SampleAuthenticationService implements AuthenticationServiceInterface
{

	public function register( $data )
	{
		if ( $data == [ 'email' => 'admin@admin.com', 'password' => 1234 ] ) 
			return 'sample-token';
		return false;
	} 

	public function login( $data )
	{
		if ( $data == [ 'email' => 'admin@admin.com', 'password' => 1234 ] )
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