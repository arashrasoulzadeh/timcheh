<?php
namespace Tests\Unit;

use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public static $token = '';
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $registration = $authService->register( [ 'username' => 'admin', 'password' => '1234' ] );
        $this->assertTrue( $registration !== false );
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register_duplicate()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $registration = $authService->register( [ 'username' => 'duplicate', 'password' => '1234' ] );
        $this->assertFalse( $registration !== false );
        self::$token = $registration;
    }

    public function test_login_wrong()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'username' => 'admin', 'password' => 'incorrect' ] );
        $this->assertFalse( $login );
    }

    public function test_login()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'username' => 'admin', 'password' => '1234' ] );
        $this->assertTrue( $login !== false );
        self::$token = $login;
    }

    public function test_check()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'username' => 'admin', 'password' => '1234' ] );
        $this->assertTrue( $login === self::$token );
    }

    public function test_refresh_fail()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $refresh = $authService->refresh( 'wrong_token' );
        $this->assertFalse( $refresh === self::$token );
    }

    public function test_refresh()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $refresh = $authService->refresh( self::$token );
        $this->assertTrue( $refresh === 'sample-refreshed-token' );
    }


}
