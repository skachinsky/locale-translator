<?php
namespace Skachinsky\LocaleTranslator;

use Illuminate\Support\ServiceProvider;
class LocaleTranslatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations/translates.stub' => database_path(
                    sprintf('migrations/%s_create_translates_table.php', date('Y_m_d_His'))
                ),
            ], 'migrations');
        }
    }
}