@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $note->title }}</h1>
                <p>{{ $note->content }}</p>
                <a href="{{ route('notes.index') }}" class="btn btn-primary">Back to notes</a>
                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit Note</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Note</button>
                </form>
            </div>
        </div>
    </div>
@endsection