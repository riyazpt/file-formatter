<?php

namespace App\Http\Controllers\Test;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;

class FileContentSearchController extends Controller
{

    public function index(Request $request)
    {
        $filename = 'products.json';
        $path = storage_path() . "/app/json/" . $filename; // ie: www/sacoor-test/app/storage/json/filename.json

        if (!file_exists($path))
            return response()->json(['status' => false, 'message' => 'File not Exists', 'data' => null], 409);

        $resources = json_decode(file_get_contents($path), true);
        $pvpKey = $request->input('pvp');
        $nameKey = $request->input('name');
        $pvp = array();
        $name = array();

        foreach ($resources as $resource) {
            if (isset($resource['pvp']) && $resource['pvp'] == $pvpKey) {

                $pvp[] = $resource;
            }
            if (isset($resource['name']) && $resource['name'] == $nameKey) {

                $name[] = $resource;
            }
        }
        $result = array_merge($pvp, $name);
        $helperObj = new Helper();
        $helperObj->xmlFormatter($result);
        return response($helperObj->xmlFormatter($result), 200)->header('Content-Type', 'text/xml');
    }
}
