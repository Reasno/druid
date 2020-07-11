<?php


namespace Reasno\Druid;


use GuzzleHttp\Client;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Guzzle\HandlerStackFactory;
use Level23\Druid\DruidClient;
use Psr\Container\ContainerInterface;

class DruidClientFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $factory = $container->get(HandlerStackFactory::class);
        $stack = $factory->create();

        $client = make(Client::class, [
            'config' => [
                'handler' => $stack,
            ],
        ]);

        $config = $container->get(ConfigInterface::class);
        $config = $config->get('druid');
        $client = new DruidClient($config, $client);
        $client->setLogger($config->get(StdoutLoggerInterface::class));
        return $client;
    }
}