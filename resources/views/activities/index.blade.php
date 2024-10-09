@extends('layouts.app')

@section('content')
<h1>Activities for {{ $subject->name }}</h1>
<a href="{{ route('subjects.activities.create', $subject) }}">Add Activity</a>
<ul>
    @foreach($activities as $activity)
        <li>
            {{ $activity->activity_type }} - {{ $activity->grade }} ({{ $activity->date }})
            <a href="{{ route('subjects.activities.edit', [$subject, $activity]) }}">Edit</a>
            <form action="{{ route('subjects.activities.destroy', [$subject, $activity]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
