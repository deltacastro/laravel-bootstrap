<div class="toast-container position-fixed top-0 end-0 col-12">
    @if ($errors->any())
        <div class="toast hide border-0 shadow mb-4 mt-2 me-1" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-red text-white">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto fw-bold fs-4">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-red">
                @foreach ($errors->all() as $error)
                    <p class="fw-bold fs-6">{{ $error }}</p>
                @endforeach
            </div>
        </div>
            {{-- <div class="toast hide align-items-center text-white bg-red border-0 shadow mb-4 mt-2" data-bs-delay="10000" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        @foreach ($errors->all() as $error)
                            <p class="fw-bold fs-6">{{ $error }}</p>
                        @endforeach
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div> --}}
    @endif
    @if(session()->has('success'))
        <div class="toast hide align-items-center text-white bg-green border-0 shadow mb-4 mt-2" data-bs-delay="10000" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <span class="fw-bold fs-5">{{ session()->get('success') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
</div>

@push('javascript')
    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            // Creates an array of toasts (it only initializes them)
            return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
        toastList.forEach(toast => toast.show()); // This show them

        console.log(toastList); // Testing to see if it works
    </script>
@endpush
