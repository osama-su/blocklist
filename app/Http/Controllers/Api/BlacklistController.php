<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlacklistRequest;
use App\Http\Requests\UpdateBlacklistRequest;
use App\Models\Blacklist;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blacklists = Blacklist::where('blacklisted_by', auth()->user()->id)->paginate(10);

        return response()->json($blacklists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function all()
    {
        $blacklists = Blacklist::paginate(10);

        return response()->json($blacklists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlacklistRequest $request)
    {
        $data = $request->validated();
        $data['blacklisted_by'] = auth()->user()->id;
        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = uploadFile($request->file('photo_1'), 'blacklist');
        }
        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = uploadFile($request->file('photo_2'), 'blacklist');
        }
        if ($request->hasFile('photo_3')) {
            $data['photo_3'] = uploadFile($request->file('photo_3'), 'blacklist');
        }
        if ($request->hasFile('photo_4')) {
            $data['photo_4'] = uploadFile($request->file('photo_4'), 'blacklist');
        }
        if ($request->hasFile('photo_5')) {
            $data['photo_5'] = uploadFile($request->file('photo_5'), 'blacklist');
        }
        if ($request->hasFile('photo_6')) {
            $data['photo_6'] = uploadFile($request->file('photo_6'), 'blacklist');
        }
        $blacklist = Blacklist::create($data);

        return response()->json($blacklist);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blacklist $blacklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blacklist $blacklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlacklistRequest $request, Blacklist $blacklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blacklist $blacklist)
    {
        //
    }
}
