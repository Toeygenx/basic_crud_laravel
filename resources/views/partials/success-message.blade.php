@session('success')
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div class="toast show align-items-center text-white border-0 glass-card" style="border-left: 4px solid var(--accent-neon) !important; border-radius: 8px;" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--accent-neon)" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <strong class="fw-medium">{{ session('success') }}</strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onclick="this.closest('.toast').classList.remove('show')"></button>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            const toastEl = document.querySelector('.toast.show');
            if(toastEl) {
                toastEl.classList.remove('show');
            }
        }, 4000);
    </script>
@endsession