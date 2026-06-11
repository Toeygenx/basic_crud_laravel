@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="mb-0 text-white" style="text-shadow: 0 0 20px rgba(16, 185, 129, 0.3);">My Notes</h1>
                    <a href="{{ route('notes.create') }}" class="btn-glass btn-primary-neon d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Create Note
                    </a>
                </div>
                @include('partials.success-message')
                
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($notes as $note)
                        <div class="col">
                            <div class="glass-card h-100 d-flex flex-column p-4 position-relative group">
                                <h3 class="h5 mb-3 text-white fw-semibold">{{ $note->title }}</h3>
                                <p class="text-secondary mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
                                    {{ $note->content }}
                                </p>
                                
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--glass-border) !important;">
                                    <span class="text-secondary small">{{ $note->created_at ? $note->created_at->diffForHumans() : 'Just now' }}</span>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('notes.show', $note->id) }}" class="btn-glass btn-secondary-glass py-1 px-3" style="font-size: 0.85rem;">View</a>
                                        <a href="{{ route('notes.edit', $note->id) }}" class="btn-glass btn-secondary-glass py-1 px-3" style="font-size: 0.85rem;">Edit</a>
                                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-glass btn-danger-neon py-1 px-2" onclick="return confirm('Are you sure you want to delete {{ $note->title }} ?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.813 1H3.188l-.83 10.368A1 1 0 0 0 3.35 15h9.3a1 1 0 0 0 .991-1.132L12.813 3.5Zm-8.49 2.51a.5.5 0 0 1 .49-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8Zm1.5.5v7h1v-7h-1Zm3 0v7h1v-7h-1Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="glass-card p-5 text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--glass-border)" class="mb-3" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4 4h8v1H4V4zm0 3h8v1H4V7zm0 3h8v1H4v-1z"/>
                                </svg>
                                <h4 class="text-secondary mb-2">No notes found</h4>
                                <p class="text-muted mb-4">Start capturing your thoughts by creating your first note.</p>
                                <a href="{{ route('notes.create') }}" class="btn-glass btn-primary-neon px-4">Create First Note</a>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="position-fixed bottom-0 start-50 translate-middle-x mb-4" style="z-index: 1040;">
                    <div class="glass-card px-4 py-2 shadow-lg" style="border-radius: 50px; background: rgba(10, 10, 12, 0.7);">
                        <div class="m-0" style="--bs-pagination-margin-bottom: 0;">
                            {{ $notes->links() }}
                        </div>
                    </div>
                </div>
                
                {{-- Spacer to prevent content from hiding behind the fixed pagination --}}
                <div style="height: 100px;"></div>
            </div>
        </div>
    </div>
@endsection