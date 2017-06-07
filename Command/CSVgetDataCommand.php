<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Question\ChoiceQuestion;

/**
 * Hello Command
 * User: ugur
 */
class CSVgetDataCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('CSV:DisplayCommand')
            ->setDescription('This command will show all user from a CSV file.')
            ->setHelp('This command will show all user from a CSV file.');
    }


    private function getCSVData(OutputInterface $output, $CSVPath)
    {
        $output->writeln("good");
        $arrayFromCSV = array_map('str_getcsv', $CSVPath);

        $table = new Table($output);


        $keys = ['Username' => null, 'Lastname' => null, 'email' => null, 'age' => null];
        $table->setHeaders(array_keys($keys));


        $table
            ->setRows($arrayFromCSV);

        $table->render();
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $helper = $this->getHelper('question');

        $choiceQuestion = new ChoiceQuestion(
            'please select your favourite csv list(defaults to users)?', array('users', 'animals'), 0
        );

        $choiceQuestion->setErrorMessage('CSV % list is invaled');

        $choice = $helper->ask($input, $output, $choiceQuestion);

        if ($choice == "users") {
            $this->getCSVData($output, file(__DIR__ . '/../Data/users.csv'));
        }

        if ($choice == "animals") {
            $this->getCSVData($output, file(__DIR__ . '/../Data/animals.csv'));
        }


    }


}