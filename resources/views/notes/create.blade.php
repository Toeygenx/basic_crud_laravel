@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-dark-emphasis m-0 mb-1">Create Note</h2>
                    <p class="text-muted m-0">Add a new note to your collection</p>
                </div>
            </div>

            {{-- success message --}}

            @session('success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Note created successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession

            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control @error("title") is-invalid @enderror"
                                value="{{ old('title') }}"                                
                                placeholder="Enter a descriptive title"
                                autofocus>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span> 
                                @enderror
    					</div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea
                                id="content"
                                name="content"
                                class="form-control @error("content") is-invalid @enderror"
                                rows="8"
                                placeholder="Write your note content here...">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback">{{ $message }}</span> 
                                @enderror
                        </div>

					    <div class="d-flex gap-2">
						    <button class="btn btn-info" type="submit">
							    Create Note
						    </button>
					    </div>
				    </form>
			    </div>
		    </div>
	    </div>
    </div>
</div>
@endsection