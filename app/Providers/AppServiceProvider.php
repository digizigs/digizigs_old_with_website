<?php

namespace App\Providers;

use App\Models\Setting;
use BeyondCode\Mailbox\Facades\Mailbox;
use BeyondCode\Mailbox\InboundEmail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //For database varchar length settings
        Schema::defaultStringLength(191);


        //For App setting details
        if (Schema::hasTable('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }

        $database = env('DB_DATABASE', '1.0');

        /*if($database <> 'digizigss'){
            return view('admin.setting.app_setup');
        }*/

        //app('log')->debug('App Service provider boot function triggred');

        Mailbox::from('info@digizigs.com', function (InboundEmail $email) {
            app('log')->debug('App Service provider boot function triggred');
        });



        
        //Mailbox::catchAll(function () {
            //app('log')->debug('MAilbox-Catch all');
        //});
        
        //Mailbox::to('info@digizigs.com', function (InboundEmail $email) {
            //app('log')->debug('MAilbox-To');
        //});
        
        Mailbox::from('postmaster@digizigs.com', function (InboundEmail $email) {
            
            //app('log')->debug($email->text());
            //app('log')->debug($email->message());
            //$msg = Message::parse($email->message());
            //app('log')->debug($email->to());
            //foreach ($email->attachments() as $attachment) {
                //$filename = $attachment->getFilename();
                //app('log')->debug('Attachment filename => ' &  $filename);
            //}
            $parser = new MailMimeParser();
            $message = $parser->parse($email->message());
            $txtStream = $message->getTextStream();
            $htmlStream = $message->getHtmlStream();
            $message = Message::from($email);
            $contentType = $message->getHeaderValue('Content-Type');
            //app('log')->debug($contentType);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('path.public', function() {
            return base_path('public_html');
        });*/

        //To run sketchboard on only development mode
        /*if ($this->app->environment() !== 'production') {
            if (class_exists('\davestewart\sketchpad\SketchpadServiceProvider')) {
                $this->app->register(\davestewart\sketchpad\SketchpadServiceProvider::class);
            }
        }*/


    }
}
