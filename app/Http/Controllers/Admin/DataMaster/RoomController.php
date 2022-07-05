<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::all();
        return view('admin.pages.datamaster.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        //
        $validated = $request->validated();
        $room = Room::create($validated);

        if ($room) {
            return back()->with(
                [
                    'success'   =>  'Ruangan baru berhasil ditambahkan'
                ]
            );
        }
        return back()->with(
            [
                'success'   =>  'Ruangan baru gagal ditambahkan'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
        $validated = $request->validated();
        $room->updateOrFail($validated);

        if ($room->wasChanged()) {
            return back()->with(
                [
                    'success'   =>  'Ruangan baru berhasil diperbarui'
                ]
            );
        }
        return back()->with(
            [
                'success'   =>  'Ruangan baru gagal diperbarui'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        if ($room->deleteOrFail()) {
            return back()->with(
                [
                    'deleted'   =>  'Data ruangan berhasil dihapus'
                ]
            );
        }
        return back()->with(
            [
                'deleted'   =>  'Data gagal berhasil dihapus'
            ]
        );
    }
}
