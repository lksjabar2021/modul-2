<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VMService;
use App\Models\WebHostingService;

class Dashboard extends Controller
{
    //
    function index() {
      $vm       = new VMService();
      $hosting  = new WebHostingService();

      $getVMNumbers         = $vm->count();
      $getHostingNumbers    = $hosting->count();
      
      return view('dashboard', [
          'vm_numbers' => $getVMNumbers,
          'hosting_numbers' => $getHostingNumbers,
      ]);
    }
}
