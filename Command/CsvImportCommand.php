<?php


namespace Command;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use League\Csv\Reader;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CsvImportCommand extends Command
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('csv:import')
            ->setDescription('Imports a  CSV File')
            ->setHelp('This command will add data from a csv file to the db.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('importing to db');

        $reader = Reader::createFromPath('%kernel.root_dir%/../src/AppBundle/Data/userdata.csv');
        $results = $reader->fetchAssoc();


        foreach ($results as $row) {
            $user = (new User())
                ->setUsername($row['username'])
                ->setLastName($row['lastname'])
                ->setEmail($row['email'])
                ->setAge($row['age']);

            $this->em->persist($user);

        }
        $this->em->flush();

        $io->success('success');

    }

}