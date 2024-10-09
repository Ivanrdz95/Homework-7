@extends('layouts.app')

@section('content')
<h1>Subjects</h1>
<a href="{{ route('subjects.create') }}">Add Subject</a>
<ul>
    @foreach($subjects as $subject)
        <li>
            <a href="{{ route('subjects.show', $subject) }}">{{ $subject->name }}</a>
            <a href="{{ route('subjects.edit', $subject) }}">Edit</a>
            <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
