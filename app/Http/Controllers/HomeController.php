<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Utils;
use Larinfo;
use App\User;



class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $laravel = app();
        $curent_version = $laravel::VERSION;
     
        $larinfo = Larinfo::getInfo(); // For all info
        //return "Your Laravel version is " . $laravel::VERSION;
        /* You can also browse to and open file 
          vendor\laravel\framework\src\Illuminate\Foundation\Application.php
         */
        
        // return view('home', compact('curent_version','larinfo'));
          return redirect ('/');
        
    }

     public function dash() {

        $laravel = app();
        $curent_version = $laravel::VERSION;
     
        $larinfo = Larinfo::getInfo(); // For all info
        //return "Your Laravel version is " . $laravel::VERSION;
        /* You can also browse to and open file 
          vendor\laravel\framework\src\Illuminate\Foundation\Application.php
         */

        $users = User::where('agent', '0')->where('admin', '0')->get();
        
        // return view('admin.manageUsers', compact('curent_version','larinfo', 'users'));
 
        return redirect('agents');

    }

     public function espace() {

        $laravel = app();
        $curent_version = $laravel::VERSION;
     
        $larinfo = Larinfo::getInfo(); // For all info
        //return "Your Laravel version is " . $laravel::VERSION;
        /* You can also browse to and open file 
          vendor\laravel\framework\src\Illuminate\Foundation\Application.php
         */
        
        return view('entreprise', compact('curent_version','larinfo'));
        
    }

    public function infos(){
        $larinfo = Larinfo::getInfo(); // For all info
        $hostIpinfo = Larinfo::getHostIpinfo(); // For host info
        $clientIpinfo = Larinfo::getClientIpinfo(); // For client info only
        $serverInfoSoftware = Larinfo::getServerInfoSoftware(); // For server software info only
        $serverInfoHardware = Larinfo::getServerInfoHardware(); // For hardware info only
        $uptime = Larinfo::getUptime(); // For uptime info only
        $serverInfo = Larinfo::getServerInfo(); // For server info only
        $databaseInfo = Larinfo::getDatabaseInfo(); // For database info only

        echo $hostIpinfo['country'];
    }

}
