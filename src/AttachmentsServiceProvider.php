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
        $this->mergeConfigFrom(__DIR__.'/../config/attachments.php', 'attachments');

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
            __DIR__.'/../config/attachments.php' => base_path('config/attachments.php'),
        ]);

        include __DIR__.'/routes.php';
        $this->app->make('BigBearTech\Attachments\AttachmentsController');
    }
}
