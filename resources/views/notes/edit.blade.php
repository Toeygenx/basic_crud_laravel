@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Note</h1>
                <form action="{{ route('notes.update', $note->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $note->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control">{{ $note->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Note</button>
                </form>
            </div>
        </div>
    </div>
@endsection
