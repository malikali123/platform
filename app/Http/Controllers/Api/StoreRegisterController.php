<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreRegisterController extends Controller
{
    public function store(StoreRegisterRequest $request){
        try{
            DB::beginTransaction();
            $tenant = Tenant::create([
                'name' => $request->name,
                'database' => $request->domain,
                'domain' => $request->domain,
                'email' => $request->email,
            ]);

            $tenant->update([
                'database' => 'store_'.$tenant->id
            ]);
            DB::commit();
            return response()->json([
                'tenant' => $tenant
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ],500);
        }
    }
}
