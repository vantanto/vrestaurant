<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('active', 'desc')
            ->orderBy('id', 'desc');
        
        if ($request->search != null) {
            $events->where('title', 'like', '%'.$request->search.'%');
        }
        if ($request->status != null) {
            $events->where('active', $request->status);
        }
        if ($request->date_start != null) {
            $events->where('date_start', '>=', $request->date_start);
        }
        if ($request->date_end != null) {
            $events->where('date_end', '<=', $request->date_end);
        }

        $events = $events->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create(Request $request)
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image',
            'bg_image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $event = new Event;
            $event->fill($request->only('date_start', 'date_end', 'title', 'description'));
            $event->image = Helper::fileStore($request->image, Event::$ImagePath);
            $event->bg_image = Helper::fileStore($request->bg_image, Event::$ImagePath, 'bg_'.date('YmdHis'));
            $event->active = $request->active ? 1 : 0;
            $event->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Event Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Event Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function detail(Request $request)
    {
        $event = Event::find($request->id);
        if ($event) {
            return response()->json(['status' => 'success', 'msg' => 'Data Found.', 'data' => $event]);
        }
        return response()->json(['status' => 'error', 'msg' => 'No Data Found.'], 404);
    }

    public function edit(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image',
            'bg_image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $event->fill($request->only('date_start', 'date_end', 'title', 'description'));
            $event->image = Helper::fileUpdate($event->image, $request->image, Event::$ImagePath);
            $event->bg_image = Helper::fileUpdate($event->bg_image, $request->bg_image, Event::$ImagePath, 'bg_'.date('YmdHis'));
            $event->active = $request->active ? 1 : 0;
            $event->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Event Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Event Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        Helper::fileDelete($event->image);
        Helper::fileDelete($event->bg_image);
        $event->delete();
        return redirect()->back()->with('success', 'Event Successfully Deleted.');
    }
}
