<?php

namespace Amranidev\ScaffoldInterface\Controllers;

use AppController;

/**
 * class ScaffoldInterfaceController.
 *
 * NOTE: this class is still in development Stage.
 *
 * @author Houssain Amrani.
 */
class ScaffoldInterfaceController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scaffold-interface::scaffold');
    }
}
