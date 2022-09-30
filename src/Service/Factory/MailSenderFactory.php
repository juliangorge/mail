<?php
namespace Juliangorge\Mail\Service\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class MailSenderFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Juliangorge\Mail\Service\MailSender($container->get('config'));
    }
}