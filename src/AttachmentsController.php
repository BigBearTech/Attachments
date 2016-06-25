<?php

namespace BigBearTech\Attachments;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AttachmentsController extends Controller
{

    /**
     *  Store the media in the table & upload file
     *
     *  @return
     */
    public function store(Request $request, Attachment $attachment)
    {
        $file = $request->file('file');

		$fileUploaded = $attachment->upload($file);

		return response()->json(['success' => true, 'file' => $fileUploaded]);
    }
}
