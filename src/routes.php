<?php

Route::group(['middleware' => config('attachments.middleware'), 'namespace' => 'BigBearTech\Attachments'], function() {
    Route::post(config('attachments.post_attachment_route'), 'AttachmentsController@store');

    if(config('attachments.glide.on')) {
        Route::get(config('attachments.glide.route') . '{all}', 'GlideController@index')->where('all', '.*')->name('bigbeartech_image');
    }
});
