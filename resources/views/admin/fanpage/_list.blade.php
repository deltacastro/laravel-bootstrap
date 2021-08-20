@forelse ($fanpages as $fanpage)
    <div class="list-option shadow my-3 bg-white d-flex flex-wrap justify-content-between align-items-center">
        <p class="h5 p-3 mb-0 text-gray-800"><span class="fw-bold">{{ $fanpage->state->name }}</span> - <span class="fw-bold">{{ $fanpage->name }}</span></p>
        <div class="d-flex flex-wrap align-items-center">
            <a class="m-2 fs-3" target="_blank" href="{{ $fanpage->url }}"><i class="bi bi-box-arrow-right"></i></a>
            <a
                href="#"
                class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar me-2"
                data-url="{{ route('admin.fanpage.edit', [$fanpage->id]) }}"
                data-target="#fanpage-offcanvas"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasFanpage">Editar</a>

            {{-- <a href="#" class="btn btn-red fw-bold">Eliminar</a> --}}
            <a href="#"
                class="btn border border-2 shadow-sm border-red fw-bold text-gray-800 me-2"
                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $fanpage->id }}').submit();"
            >
                Eliminar
            </a>
            <form id="delete-form-{{ $fanpage->id }}"
                action="{{ route('admin.fanpage.delete', [$fanpage->id]) }}"
                method="POST"
                style="display: none;"
            >
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@empty

@endforelse

