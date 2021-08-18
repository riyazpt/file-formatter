<?php

namespace App\Console\Commands;

use App\FileConvertStrategy\FileConvertStrategy;
use Illuminate\Console\Command;


class CsvToJsonXmlConvertor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:convert {inputFilePath : The path of the file you wish to convert}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert CSV file to Json Or Xml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(' Start.... .');
        // Get command arguments.
        $filePath = $this->argument('inputFilePath');
        $this->info('Reading File...');
        //Type  '0' for Json and 1 for xml on console
        $fileType = $this->choice(
            'Please type 0 or 1 to convert file',
            ['Json', 'Xml'],
        );
        $this->line("you have selected {$fileType} format");
        new FileConvertStrategy($filePath);
        $this->info('Finished.!');
    }
}
