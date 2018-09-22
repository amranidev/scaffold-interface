<?php

namespace Amranidev\ScaffoldInterface\Listeners;

use Amranidev\ScaffoldInterface\Events\DeleteCrud;

class DeleteCrudFiles
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     *
     * @return void
     */
    public function handle(DeleteCrud $event)
    {
        unlink($event->scaffold->migration);
        unlink($event->scaffold->model);
        unlink($event->scaffold->controller);
        unlink($event->scaffold->views . '/index.blade.php');
        unlink($event->scaffold->views . '/create.blade.php');
        unlink($event->scaffold->views . '/show.blade.php');
        unlink($event->scaffold->views . '/edit.blade.php');
        rmdir($event->scaffold->views);
        // clear Routes Resources.
        $this->clearRoutes(lcfirst(str_singular($event->scaffold->tablename)));
    }

    /**
     * Clear routes.
     *
     * @param string $remove
     *
     * @return mixed
     */
    private function clearRoutes($remove)
    {
        $path = config('amranidev.config.routes');
        $lines = file($path, FILE_IGNORE_NEW_LINES);

        foreach (array_filter($lines, function ($line) use ($remove) {
            return strstr($line, $remove);
        }) as $key => $line) {
            unset($lines[$key]);
        }

        return file_put_contents($path, implode("\n", array_values($lines)));
    }
}
