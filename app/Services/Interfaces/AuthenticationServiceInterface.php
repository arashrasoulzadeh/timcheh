<?php
namespace App\Services\Interfaces;

interface AuthenticationServiceInterface
{

	public function register( $data );
	public function login( $data );
	public function check( $data ): bool;
	public function refresh( $data );

}