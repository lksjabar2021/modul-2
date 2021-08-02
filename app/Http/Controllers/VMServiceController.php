<?php

namespace App\Http\Controllers;

use App\Models\VMService;
use Illuminate\Http\Request;

class VMServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vm = new VMService();
        $getVM = $vm::all();

        return view('vm-service.index', ['vm' => $getVM]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vm-service.create');
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
          'hostname' => 'required',
          'ip_address' => 'required|ip',
          'ram' => 'required',
          'vcpu' => 'required',
          'ssd' => 'required',
        ]);


        $vm = new VMService();

        $vm->hostname   = $request->hostname;
        $vm->ip_address = $request->ip_address;  
        $vm->ram        = $request->ram;
        $vm->vcpu       = $request->vcpu;
        $vm->ssd        = $request->ssd;

        // save ...
        $vm->save();

        //return redirect()
        //    ->route('vm', ['success_message' => 'Succesfully create a new VM']);

        return redirect('/vm')->with('status', 'Succesfully create a new VM');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VMService  $vMService
     * @return \Illuminate\Http\Response
     */
    public function show(VMService $vMService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VMService  $vMService
     * @return \Illuminate\Http\Response
     */
    public function edit(VMService $vMService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VMService  $vMService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VMService $vMService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VMService  $vMService
     * @return \Illuminate\Http\Response
     */
    public function destroy(VMService $vMService, $id)
    {
        //
        $vm = VMService::find($id);
        $vm->delete();

        return redirect('/vm')->with('status', 'Succesfully delete a VM');
    }
}
