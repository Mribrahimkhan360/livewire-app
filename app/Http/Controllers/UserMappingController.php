<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMappingRequest;
use App\Models\User;
use App\Models\UserMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mappings = UserMapping::all();
        return view('userMapping.index',[
            'mappings' => $mappings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // find distributor all
        $userDistributors = User::role('distributor')->get();

        // find customer all
        $userCustomers = User::role('customer')->get();

        return view('userMapping.create',[
            'userDistributors'  => $userDistributors,
            'userCustomers'     => $userCustomers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param UserMappingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(UserMappingRequest $request)
    {
        try {
            UserMapping::create([
                'distributor_id'    => $request->distributor_id,
                'customer_id'       => $request->customer_id,
            ]);

            return redirect()->back()->with('success','Data mapping successfully!');

        }catch (\Exception $e)
        {
            return back()->with('error','This customer is already assigned!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMapping $userMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMapping $userMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserMapping $userMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMapping $userMapping)
    {
        //
    }
}
