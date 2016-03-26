<?php

use Illuminate\Support\Facades\Schema;

if (!function_exists('getTables')) {
    /**
     * get OnData spec.
     *
     * @param  array  $data
     * @return array
     */
    function getTables(array $data)
    {
        $onData = [];
        $foreignKeys = [];
        $result = [];
        $tmp = '';
        $i = 0;
        $j = 0;
        foreach ($data as $key => $value) {

            if ($key == 'tbl' . $i) {
                $tmp = $value;
                if (in_array($value, $foreignKeys)) {
                    throw new \Exception($value . " Relation Already selected");
                }
                array_push($foreignKeys, $value);
                $i++;

            } elseif ($key == 'on' . $j) {
                if (!in_array($value, Schema::getColumnListing($tmp))) {
                    throw new \Exception($value . " Does not exist in " . $tmp);
                }
                array_push($onData, $value);
                $j++;
            }
        }

        $result[] = $onData;

        $result[] = $foreignKeys;

        return $result;
    }
}

if (!function_exists('dataScaffold')) {
    /**
     * get Scaffolding Data and fetch between migration and views
     *
     * @param Array $data
     * @param String $spec
     *
     * @return $request Array
     */
    function dataScaffold(array $data, $spec)
    {
        if ($spec == 'migration') {
            $i = 0;
        } else {
            $i = 1;
        }
        $request = [];
        foreach ($data as $key => $value) {
            if ($i == 1) {
                $i = 0;
            } elseif ($i == 0) {
                if ($key == 'tbl0' or $key == 'on0') {break;} else {
                    if (str_contains($value, " ")) {
                        $value = str_slug($value, '_');
                    }
                    array_push($request, $value);
                    $i = 1;
                }
            }
        }

        return $request;
    }
}

if (!function_exists("clearRoutes")) {
    /**
     * clear route file
     *
     * @param String $remove
     */
    function clearRoutes($remove)
    {
        $path = app_path() . '/Http/routes.php';

        $lines = file($path, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $line) {
            if (strstr($line, $remove)) {
                unset($lines[$key]);
            }
        }

        $data = implode("\n", array_values($lines));

        return file_put_contents($path, $data);
    }
}
