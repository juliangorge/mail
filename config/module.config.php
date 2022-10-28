<?php

declare(strict_types=1);

namespace Juliangorge\Mail;

return [
	'mail_host'			=> '',
	'mail_debug'		=> '',
	'mail_username'		=> '',
	'mail_password'		=> '',
	'mail_smtpsecure'	=> 'tls',
	'mail_port'			=> 587,
	'mail_charset'		=> 'UTF-8',
	'mail_from'			=> 'test@juliangorge.com.ar',
	'mail_name'			=> 'Test',
	
    'service_manager' => [
        'factories' => [
            \Juliangorge\Mail\Service\MailSender::class => \Juliangorge\Mail\Service\Factory\MailSenderFactory::class,
            \Juliangorge\Mail\Service\MailTransport::class => \Juliangorge\Mail\Service\Factory\MailTransportFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            Plugin\MailPlugin::class => Plugin\Factory\MailPluginFactory::class,
        ],
        'aliases' => [
            'mail' => Plugin\MailPlugin::class
        ]
    ],
];
