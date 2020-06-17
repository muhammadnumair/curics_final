<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Module;
use App\PackageModule;
class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('id', 'DESC')->get();
        return view("backend.admin.packages.index", ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view("backend.admin.packages.create", ['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'patient_limit' => 'required',
            'doctor_limit' => 'required',
            'price' => 'required',
            'module' => 'required',
        ]);

        $package = new Package();
        $package->package_name = $request->package_name;
        $package->patient_limit = $request->patient_limit;
        $package->doctor_limit = $request->doctor_limit;
        $package->price = $request->price;
        if ($request->has('online_presence')) {
            $package->online_presence = $request->online_presence;
        }else{
            $package->online_presence = 0;
        }
        $package->save();

        foreach($request->module as $module){
            $PackageModule = new PackageModule();
            $PackageModule->package_id = $package->id;
            $PackageModule->module_id = $module;
            $PackageModule->save();
        }

        return redirect()->route('packages')->with(['success' => 'Package Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Module::all();
        $package = Package::where('id', $id)->first();
        return view("backend.admin.packages.edit", ['modules' => $modules, 'package' => $package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required',
            'patient_limit' => 'required',
            'doctor_limit' => 'required',
            'price' => 'required',
            'module' => 'required',
        ]);

        $package = Package::where('id', $id)->first();
        $package->package_name = $request->package_name;
        $package->patient_limit = $request->patient_limit;
        $package->doctor_limit = $request->doctor_limit;
        $package->price = $request->price;
        if ($request->has('online_presence')) {
            $package->online_presence = $request->online_presence;
        }else{
            $package->online_presence = 0;
        }
        $package->save();

        //dd($request->module);
        foreach($package->modules as $p_module){
            if(!in_array($p_module->module_id, $request->module)){
                PackageModule::where('module_id', $p_module->module_id)->where('package_id', $package->id)->delete();
            }
        }

        foreach($request->module as $module){
            $p_m = PackageModule::where('module_id', $module)->where('package_id', $package->id)->first();
            if($p_m == null){
                $PackageModule = new PackageModule();
                $PackageModule->package_id = $package->id;
                $PackageModule->module_id = $module;
                $PackageModule->save();
            }
        }
        return redirect()->route('packages')->with(['success' => 'Package Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::where('id',$id)->first();
        PackageModule::where('package_id', $package->id)->delete();
        Package::where('id',$id)->delete();
        return redirect()->route('packages')->with(['success' => 'Package Deleted Successfully']);
    }
}
