<?php

use App\Services\Compressors\ZipCompressorService;

return [
	'service'	=>	env( 'COMPRESSOR_SERVICE', ZipCompressorService::class )
];