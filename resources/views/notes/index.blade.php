@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Notes</h1>
                    <a href="{{ route('notes.create') }}" class="btn btn-primary">Create Note</a>
                </div>
                @include('partials.success-message')
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notes as $note)
                            <tr>
                                <td>{{ $note->id }}</td>
                                <td>{{ $note->title }}</td>
                                <td>{{ $note->content }}</td>
                                <td>
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('notes.show', $note->id) }}" class="btn btn-success">View</a>
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{ $note->title }} ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No notes found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $notes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection