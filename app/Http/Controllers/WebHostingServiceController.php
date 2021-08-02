<?php

namespace App\Http\Controllers;

use App\Models\WebHostingService;
use Illuminate\Http\Request;

class WebHostingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get web hosting data
        $hosting    = new WebHostingService();
        $getHosting = $hosting::all();
 
        return view('web-hosting.index', [
            'hosting' => $getHosting,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('web-hosting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
          'domain_name' => 'required',
          'ip_address' => 'required|ip',
          'ram' => 'required',
          'vcpu' => 'required',
          'ssd' => 'required',
        ]);

        $hosting = new WebHostingService();

        $hosting->domain_name   = $request->domain_name;
        $hosting->ip_address    = $request->ip_address;
        $hosting->ram           = $request->ram;
        $hosting->vcpu          = $request->vcpu;
        $hosting->ssd           = $request->ssd;

        $hosting->save();


        return redirect('/hosting')->with('status', 'Succesfully create a new Web Hosting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebHostingService  $webHostingService
     * @return \Illuminate\Http\Response
     */
    public function show(WebHostingService $webHostingService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebHostingService  $webHostingService
     * @return \Illuminate\Http\Response
     */
    public function edit(WebHostingService $webHostingService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebHostingService  $webHostingService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebHostingService $webHostingService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebHostingService  $webHostingService
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebHostingService $webHostingService, $id)
    {
        //
        $hosting = WebHostingService::find($id);
        $hosting->delete();

        return redirect('/hosting')->with('status', 'Succesfully delete a Web Hosting');
    }
}
