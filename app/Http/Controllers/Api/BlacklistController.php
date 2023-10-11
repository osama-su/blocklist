<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlacklistRequest;
use App\Http\Requests\UpdateBlacklistRequest;
use App\Models\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blacklists = Blacklist::where('blacklisted_by', auth()->user()->id);
        $blacklists->when(request()->filled('search'), static function ($query) {
            $query->where('name', 'like', "%{request()->get('search')}%")
                ->orWhere('id_number', 'like', "%{request()->get('search')}%")
                ->orWhere('phone_number', 'like', "%{request()->get('search')}%");
        });

        return response()->json([
            'data' => $blacklists->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function all(Request $request)
    {
        $blacklists = Blacklist::query();
        $blacklists->when($request->filled('search'), static function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->get('search')}%")
                    ->orWhere('id_number', 'like', "%{$request->get('search')}%")
                    ->orWhere('phone_number', 'like', "%{$request->get('search')}%");
            });


        return response()->json([
            'data' => $blacklists->get(),
            ]);
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
