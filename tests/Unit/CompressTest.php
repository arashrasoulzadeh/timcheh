<?php

namespace Tests\Unit;

use App\Services\CompressionService;
use App\Services\Interfaces\CompressionServiceInterface;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CompressTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_compress()
    {
        $service = new CompressionService();;
        $source  = public_path( 'samplefile.txt' );
        $dest    = public_path( 'test.zip' );
        $result  = $service->compress( $source, $dest, 'samplefile.txt' );

        $this->assertTrue( $result );
    }

    public function test_extract()
    {
        $service = new CompressionService();;
        $dest    = public_path( 'sampledir' );
        $source  = public_path( 'test.zip' );
        $result  = $service->extract( $source, $dest );

        $this->assertTrue( $result );
    }

}
