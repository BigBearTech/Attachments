<?php

namespace BigBearTech\Attachments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

class GlideController extends Controller
{
    public function index(Request $request, $path)
    {
    	// Setup Glide server
		$server = ServerFactory::create([
		    'response' => new LaravelResponseFactory(),
		    'source' => storage_path(),
		    'cache' => storage_path('media/cache'),
		]);

		// But, a better approach is to use information from the request
		$server->outputImage($path, $request->all());
    }
}
