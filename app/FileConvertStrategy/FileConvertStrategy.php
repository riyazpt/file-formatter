<?php

namespace App\FileConvertStrategy;

use Illuminate\Support\Facades\Storage;
use App\Helper\Helper;

class FileConvertStrategy
{
    private  $inputFilePath;

    public function __construct($inputFilePath)
    {
        $this->inputFilePath = $inputFilePath;
    }
    /**
     * File conversion strategy
     */
    public function fileConvertStrategy($fileType)
    {
        switch ($fileType) {
            case "Json":
                return $this->convertToJson();
            case "Xml":
                return  $this->convertToXml();
            default:
                return $this->convertToJson();
        }
    }


    /**
     * function for converting csv to json file
     *
     * @return void
     */
    private function convertToJson()
    {
        $csv = file_get_contents($this->inputFilePath);
        $array = array_map('str_getcsv', explode(PHP_EOL, $csv));
        $headers = $array[0];
        $json = [];

        foreach ($array as $key => $rowData) {
            if ($key === 0) continue;
            foreach ($rowData as $columnIndex => $columnVal) {
                $label = $headers[$columnIndex];
                $json[$key][$label] = $columnVal;
            }
        }
        $convertedJsonFile = json_encode($json);
        $originalFilename = basename($this->inputFilePath, ".csv");
        $filePath = 'json/' . $originalFilename . '.json';
        Storage::disk('local')->put($filePath, $convertedJsonFile);
        return true;
    }
    /**
     * function for converting Xml to json file
     *
     * @return void
     */
    private function convertToXml()
    {
        $rows = array_map('str_getcsv', file($this->inputFilePath));
        $header = array_shift($rows);
        $data = array();
        foreach ($rows as $row) {
            $data[] = array_combine($header, $row);
        }
        $originalFilename = basename($this->inputFilePath, ".csv");
        $filePath = 'xml/' . $originalFilename;
        //ie: www/sacoor-test/app/storage/xml/filename.xml
        $helperObj = new Helper();
        Storage::disk('local')->put($filePath, $helperObj->xmlFormatter($data));
        return true;
    }
}
