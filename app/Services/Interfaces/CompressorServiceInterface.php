<?php

namespace App\Services\Interfaces;

interface CompressorServiceInterface
{

	public function compress( $sourcePath, $destinationPath, $fileName ): bool;

	public function extract( $sourcePath, $destinationPath ): bool;

}