<?php
/**
 * Created by PhpStorm.
 * User: salih
 * Date: 29.01.2019
 * Time: 15:54
 */

namespace App\Command;

use App\Entity\Provider;
use App\Service\AdapterFactory;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CurrencyComparisonCommand extends Command
{
    protected static $defaultName = 'app:currency-comparison';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Comparise a currency.')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to comparise a rates...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ContainerInterface $container */
        $container = $this->getApplication()->getKernel()->getContainer();

        $em = $container->get('doctrine.orm.default_entity_manager');

        /**
         * @var Provider[] $providers
         */
        $providers = $em->getRepository(Provider::class)->findAll();

        foreach ($providers as $provider) {
            $adapterClass = AdapterFactory::create($provider);
            $exchangeRate = $adapterClass->process();
            $em->persist($exchangeRate);
        }
        $em->flush();
    }
}