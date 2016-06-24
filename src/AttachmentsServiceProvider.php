<?php

namespace BigBearTech\Attachments;

use Illuminate\Support\ServiceProvider;

class AttachmentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('attachment', function() {
            return new Attachment;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../migrations/2016_06_23_191235_create_bigbeartech_attachments_table.php' => base_path('database/migrations/2016_06_23_191235_create_bigbeartech_attachments_table.php'),
            __DIR__.'/../config/lern.php' => base_path('config/lern.php'),
        ]);
    }
}
