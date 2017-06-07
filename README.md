# symfony_CSV-DisplayCommand

#Locations created files

All `CSV` files are located in the `DATA` folder. In the folder `Commands` you can find the command class `CSVgetDataCommand.php`
 
#explanation command

## CSVgetDataCommand
The `CSVgetDataCommand.php` Command allows you to display the data of 2 CSV files located in in the Data folder.
I have Used the Symfony console [Table Helper](http://symfony.com/doc/current/components/console/helpers/table.html) to make output of the data more clear.
 Next to that I used the [Question Helper](http://symfony.com/doc/current/components/console/helpers/questionhelper.html) to let the user select a csv file.

This command can be used by typing the following into the console:
`php console CSV:DisplayCommand`

