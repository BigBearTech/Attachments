<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBigbeartechAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigbeartech_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('title')->nullable();
            $table->text('caption')->nullable();
            $table->string('alt_text')->nullable();
            $table->text('description')->nullable();
            $table->string('path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('original_name')->nullable();
            $table->string('original_extension', 50)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->text('exif')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('title');
            $table->index('path');
            $table->index('file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bigbeartech_attachments');
    }
}
