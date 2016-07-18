<?php

namespace BigBearTech\Attachments\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentModel extends Model
{
    protected $table = 'bigbeartech_attachments';
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'exif' => 'array',
    ];

    public function __construct()
    {
        $this->table = config('attachments.table');
    }
}
