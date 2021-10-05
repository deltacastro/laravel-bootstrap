{{-- <div class="d-flex flex-column flex-shrink-0 py-3 text-gray-800 bg-gray-100 shadow" style="width: 280px;">

</div> --}}

<div class="d-none d-md-flex flex-column text-gray-800 bg-gray-100 shadow" style="width: 280px;">
    @include('layouts.sidebar.menu')
</div>
<div class="offcanvas offcanvas-start text-gray-800 bg-gray-100 shadow h-100" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <button type="button" class="btn-close text-reset bg-gray-300" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        @include('layouts.sidebar.menu')
    </div>
</div>
