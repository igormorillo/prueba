<?php

namespace App\Command;

use App\Helper\CommandHelper;
use Goutte\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class scrapeCommand extends Command
{
    protected static $defaultName = 'prueba:scrape';
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var SymfonyStyle
     */
    private $io;
    /**
     * @var CommandHelper
     */
    private $helper;
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * scrapeCommand constructor.
     */
    public function __construct(CommandHelper $helper, ParameterBagInterface $parameterBag, string $name = null)
    {
        parent::__construct($name);
        $this->name = $name;
        $this->helper = $helper;
        $this->parameterBag = $parameterBag;
    }

    protected function configure()
    {
        $this
            ->setDescription('Scrape website')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);

        // Create a Goutte Client instance.
        /** @var Client $client */
        $client = new Client(HttpClient::create(['timeout' => 60]));

        // we get the page
        /** @var Crawler $crawler */
        $crawler = $client->request('GET', 'https://videx.comesconnected.com');

        // we get each package
        $packages = $crawler->filter('.package')->each(function ($node) {
            return $node;
        });

        $results = [];
        // we get all info for each package and set it into the array
        foreach ($packages as $id => $package) {
            $option = $package->filter('.header > h3');
            $results[$id]['option title'] = ($option->count() > 0) ? $option->text() : '';

            $description = $package->filter('.package-name');
            $results[$id]['description'] = ($description->count() > 0) ? $description->text() : '';

            $price = $package->filter('.package-price > .price-big');
            $results[$id]['price'] = ($price->count() > 0) ? $this->helper::getNumberpart($price->text()) : '';

            $discount = $package->filter('.package-price > p');
            $results[$id]['discount'] = ($discount->count() > 0) ? $this->helper::getNumberpart($discount->text()) : '';
        }

        usort($results, function ($a, $b) {
            return $a['price'] < $b['price'];
        });
        echo json_encode($results);
        return 0;
    }

}
