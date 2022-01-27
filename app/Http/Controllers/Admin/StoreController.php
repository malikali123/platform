<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    public function index(){
        $data = Tenant::all();
        return view('pages.stores.index',compact('data'));
    }

    public function active($id){
        try{
            $store = Tenant::findOrFail($id);

            $store->update([
                'is_active' => true
            ]);

            return redirect()->route('store.index')->with([
                'success' => 'success message'
            ]);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return back();
        }
    }

    public function enactive($id){
        try{
            $store = Tenant::findOrFail($id);

            $store->update([
                'is_active' => false
            ]);

            return redirect()->route('store.index')->with([
                'success' => 'success message'
            ]);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return back();
        }
    }
}
