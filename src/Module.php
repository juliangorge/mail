<?php
namespace Juliangorge\Mail;

use Laminas\Mvc\MvcEvent;

class Module 
{

	public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

}