@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="d-flex align-items-center mb-5 gap-3">
                <a href="{{ route('notes.index') }}" class="btn-glass btn-secondary-glass d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; padding: 0; border-radius: 50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-white m-0" style="text-shadow: 0 0 20px rgba(16, 185, 129, 0.3);">Create Note</h2>
                    <p class="text-secondary m-0">Capture your new brilliant idea</p>
                </div>
            </div>

            @include('partials.success-message')

            <div class="glass-card p-4 p-md-5">
                <form action="{{ route('notes.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="form-label ps-1">Note Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control form-control-lg @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"                                
                            placeholder="E.g., Project Ideas 2026"
                            autofocus>
                            @error('title')
                                <span class="invalid-feedback ps-1 mt-2">{{ $message }}</span> 
                            @enderror
                    </div>

                    <div class="mb-5">
                        <label for="content" class="form-label ps-1">Content</label>
                        <textarea
                            id="content"
                            name="content"
                            class="form-control @error('content') is-invalid @enderror"
                            rows="8"
                            placeholder="Write your note content here...">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback ps-1 mt-2">{{ $message }}</span> 
                            @enderror
                    </div>

                    <div class="d-flex gap-3 justify-content-end pt-4 border-top" style="border-color: var(--glass-border) !important;">
                        <a href="{{ route('notes.index') }}" class="btn-glass btn-secondary-glass">Cancel</a>
                        <button class="btn-glass btn-primary-neon px-4" type="submit">
                            Save Note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection