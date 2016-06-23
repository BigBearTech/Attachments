<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

/**
*
*/
class Media
{
	private function createStorageMedia()
	{
		$now = Carbon::now();
		Storage::disk('media')->makeDirectory($now->year . DIRECTORY_SEPARATOR . $now->month);
	}

	public function upload($file, $db=true)
	{
		// Get the vars
		$now = Carbon::now();
		$getRealPath = $file->getRealPath();
		$getClientOriginalName = $file->getClientOriginalName();
		$getClientOriginalExtension = $file->getClientOriginalExtension();
		$getSize = $file->getSize();
		$getMimeType = $file->getMimeType();
		$fileName = \pathinfo($getClientOriginalName, PATHINFO_FILENAME) . '-' . str_random(5) . '.jpg';
		$fileNameWithoutExtension = \pathinfo($getClientOriginalName, PATHINFO_FILENAME);
		$path = storage_path('media' . DIRECTORY_SEPARATOR . $now->year . DIRECTORY_SEPARATOR . $now->month . DIRECTORY_SEPARATOR . $fileName);

		// Check if it's a valid file
		if(!$file->isValid())
		{
			return false;
		}

		// Make sure the media directory is in the storage
		$this->createStorageMedia();

		// Resize the image
		Image::make($file)->orientate()->encode('jpg', 80)->resize(960, 960, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);

        // Get the image exif
        $exif = Image::make($file)->exif();

        // Save image to db
        if($db)
        {
        	$attachment = new Attachment;
        	$attachment->user_id = auth()->user()->id;
        	$attachment->path = 'media' . DIRECTORY_SEPARATOR . $now->year . DIRECTORY_SEPARATOR . $now->month . DIRECTORY_SEPARATOR . $fileName;
        	$attachment->title = $fileNameWithoutExtension;
        	$attachment->file_name = $fileName;
        	$attachment->original_name = $getClientOriginalName;
        	$attachment->original_extension = $getClientOriginalExtension;
        	$attachment->size = $getSize;
        	$attachment->mime_type = $getMimeType;
        	$attachment->exif = $exif;
        	$attachment->save();

        	return $attachment;
        }

        return true;
	}
}
