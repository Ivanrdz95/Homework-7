<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Subject;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Subject $subject)
    {
        $activities = $subject->activities;
        return view('activities.index', compact('subject', 'activities'));
    }

    public function create(Subject $subject)
    {
        return view('activities.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'activity_type' => 'required|string|max:255',
            'grade' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $subject->activities()->create($request->all());
        return redirect()->route('subjects.activities.index', $subject)->with('success', 'Activity created successfully.');
    }

    public function edit(Subject $subject, Activity $activity)
    {
        return view('activities.edit', compact('subject', 'activity'));
    }

    public function update(Request $request, Subject $subject, Activity $activity)
    {
        $request->validate([
            'activity_type' => 'required|string|max:255',
            'grade' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $activity->update($request->all());
        return redirect()->route('subjects.activities.index', $subject)->with('success', 'Activity updated successfully.');
    }

    public function destroy(Subject $subject, Activity $activity)
    {
        $activity->delete();
        return redirect()->route('subjects.activities.index', $subject)->with('success', 'Activity deleted successfully.');
    }
}

