<?php

namespace App\Services;

use App\Services\Interfaces\CompressorServiceInterface;
use Illuminate\Support\Facades\App;

class CompressionService 
{

	public function getCompressor()
	{
		return App::make( CompressorServiceInterface::class );
	}

	public function compress( $sourcePath, $destinationPath, $fileName ): bool
	{
		return $this->getCompressor()->compress( $sourcePath, $destinationPath, $fileName );
	}

	public function extract( $sourcePath, $destinationPath ): bool 
	{
		return $this->getCompressor()->extract( $sourcePath, $destinationPath );
	}
}