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

        foreach ($data['photos'] as $key => $photo) {
            $data['photos'][$key] = uploadFile($photo, 'blacklist');
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
