<?php
namespace Juliangorge\Mail\Service\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class MailTransportFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Juliangorge\Mail\Service\MailTransport($container->get('config'));
    }
}