<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderShipped;
use App\Jobs\testjob;
use App\AgendaImage;
use App\Agenda;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($data=NULL)
    {
     // $this->data=$data;
    }

    
    public function index()
    {

       return view('home');
    }
}
