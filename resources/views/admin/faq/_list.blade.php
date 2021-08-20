@forelse ($questions as $question)
    <div class="shadow border col-12 mb-3 p-3 bg-white">
        <div class="d-flex col-12 justify-content-between align-items-baseline">
            <h5 class="fw-bold">{{ $question->content }}</h5>
            <div class="bg-light p-3">
                <a
                    href="#"
                    class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                    data-url="{{ route('admin.faq.edit', [$question->id]) }}"
                    data-target="#faq-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasFaq">Editar</a>

                {{-- <a href="#" class="btn btn-red fw-bold">Eliminar</a> --}}
                <a href="#"
                    class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $question->id }}').submit();"
                >
                    Eliminar
                </a>
                <form id="delete-form-{{ $question->id }}"
                    action="{{ route('admin.faq.delete', [$question->id]) }}"
                    method="POST"
                    style="display: none;"
                >
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @foreach ($question->answers as $answer)
            <div class="list-option border border-3 my-3">
                <p class="p-3 mb-0" style="white-space: pre-wrap;" id="faq-text-{{ $answer->id }}">{{ $answer->content }}</p>
            </div>
        @endforeach
    </div>
@empty

@endforelse
