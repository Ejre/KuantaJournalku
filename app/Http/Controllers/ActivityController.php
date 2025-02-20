<?php

    namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('dashboard.activity', compact('activities'));
    }

    public function addActivity(Request $request)
    {
        $request->validate([
            'activityName' => 'required|string|max:255',
            'activityDescription' => 'required|string|max:255',
            'activityDate' => 'required|date',
            'activityWaktu_mulai' => 'required|date_format:H:i',
            'activityWaktu_selesai' => 'required|date_format:H:i',
            'activityStatus' => 'required|in:SELESAI,REVISI,PROSES,BELUM DILAKUKAN',
        ]);

        Activity::create([
            'activity' => $request->activityName,
            'description' => $request->activityDescription,
            'date' => $request->activityDate,
            'waktu_mulai' => $request->activityWaktu_mulai,
            'waktu_selesai' => $request->activityWaktu_selesai,
            'status' => $request->activityStatus,
        ]);

        return redirect()->route('dashboard.activity');
    }

    public function editActivity($id)
    {
        $activity = Activity::findOrFail($id);
        return view('dashboard.activity-edit', compact('activity'));
    }

    public function updateActivity(Request $request, $id)
    {
        $request->validate([
            'activityName' => 'required|string|max:255',
            'activityDescription' => 'required|string|max:255',
            'activityDate' => 'required|date',
            'activityWaktu_mulai' => 'required|date_format:H:i',
            'activityWaktu_selesai' => 'required|date_format:H:i',
            'activityStatus' => 'required|in:SELESAI,REVISI,PROSES,BELUM DILAKUKAN',
        ]);

        try{
            DB::beginTransaction();
             $activity = Activity::findOrFail($id);

            $activity->activity = $request->activityName;
            $activity->description =  $request->activityDescription;
            $activity->date =  $request->activityDate;
            $activity->waktu_mulai =  $request->activityWaktu_mulai;
            $activity->waktu_selesai = $request->activityWaktu_selesai;
            $activity->status = $request->activityStatus;
            $activity->update();

            DB::commit();

            return redirect()->route('dashboard.activity.index')->with('success', 'Activity updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with("error", $th->getMessage());
        }
    }


    public function deleteActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('dashboard.activity');
    }
}
