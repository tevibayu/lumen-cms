<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Settings\Settings;
use Swift_SmtpTransport;
use Swift_Mailer;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    public function __construct()
    {
        $settings = Settings::pluck('value', 'name');

        if (count($settings)) {
        	foreach ($settings as $name => $value) {
	            config([$name => $value]);
	        }

	        /* Settings Email (Swiftmailer) */
            // extract config
            extract(app('config')->get('mail'));

            // create new mailer with new settings
            $transport = new Swift_SmtpTransport($host, $port);
            // set encryption
            if (isset($encryption)) { 
                $transport->setEncryption($encryption);
            }
            // set username and password
            if (isset($username)) {
                $transport->setUsername($username);
                $transport->setPassword($password);
            }
            // set new swift mailer
            Mail::setSwiftMailer(new Swift_Mailer($transport));

        	// set from name and address
            if (is_array($from) && isset($from['address'])) {
                Mail::alwaysFrom($from['address'], $from['name']);
            }
        }
    }
}
