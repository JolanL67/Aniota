<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DataScrapCommand extends Command
{
    protected static $defaultName = 'data:scrap';

    protected function configure()
    {
        $this
        ->setDescription('Command scraping manga/anime data from jiken.moe API we want to save')
        ->addArgument('dataType', InputArgument::REQUIRED, 'type of data we want to scrap ( manga or anime)')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // I get the argument dataType
        $dataType = strtolower($input->getArgument('dataType'));
        dd($dataType);
        // I check that $dataType contains "anime" or "manga" otherwise I display an error message and return one
        if ($dataType != 'anime' && $dataType != 'manga' ) {
            $io->error('Your argument need to be "manga" or "anime"');

            return 1;
        }
    }
}
