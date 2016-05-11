<?php

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
