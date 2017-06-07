#!/usr/bin/env php
<?php


require_once "vendor/autoload.php";


// Create the Application
$application = new Symfony\Component\Console\Application;

$application->add(new Command\CSVgetDataCommand);

//Run it
$application->run();
