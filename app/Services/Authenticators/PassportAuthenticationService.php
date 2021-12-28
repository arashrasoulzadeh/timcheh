<?php

namespace App\Services\Authenticators;

use App\Models\User;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassportAuthenticationService implements AuthenticationServiceInterface
{

	public function register( $data )
	{
		$user = User::create( $data );
		return $user;
	} 

	public function login( $data )
	{
		$user = User::whereEmail( $data[ 'email' ] )->wherePassword( $data[ 'password' ] )->first();
		if ( !isset( $user ) )
		{
			return false;
		}
		Auth::login( $user );
		return true;
	}

	public function check( $data ):bool 
	{
		return $this->login( $data );
	}

	public function refresh( $data )
	{
		return 'sample-refreshed-token';
	}

}