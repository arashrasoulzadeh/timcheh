<?php

namespace App\Services\Compressors;

use App\Services\Interfaces\CompressorServiceInterface;
use ZipArchive;

class ZipCompressorService implements CompressorServiceInterface
{

	public function compress( $sourcePath, $destinationPath, $fileName ): bool
	{
		$zip = new ZipArchive();
		if ( $zip->open( $destinationPath, ZipArchive::CREATE ) !== TRUE ) {
    		return false;
		}	
		$zip->addFile( $sourcePath, $fileName );
		$zip->close();
		return file_exists( $destinationPath );
	}

	public function extract( $sourcePath, $destinationPath ): bool
	{
		$zip = new ZipArchive; 
    	$zip->open( $sourcePath ); 
    	$zip->extractTo( $destinationPath ); 
    	$zip->close(); 
		return file_exists( $destinationPath );;
	}

}