<div class="form-floating mb-3">
    <select name="question[question_category_id]" class="form-select" id="question-category_id" required>
        <option selected disabled>Seleccione una categoría</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ isset($question) && $question->question_category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Categoría</label>
</div>

<div class="form-floating mb-3">
    <select name="question[question_calificator_id]" class="form-select" id="question-calificator_id" required>
        <option selected disabled>Seleccione un calificador</option>
        @foreach ($calificators as $calificator)
            <option value="{{ $calificator->id }}" {{ isset($question) && $question->question_calificator_id == $calificator->id ? 'selected' : '' }}>
                {{ $calificator->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Calificador</label>
</div>

<x-form.text-area style="height: 10vh;" label="Pregunta" id="question-content"
    name="question[content]" error-validator="question.content"
    >{{ old('question.content') ?? $question->content ?? '' }}</x-form.text-area>

@foreach ($question->answers ?? [] as $answer)
    <x-form.text-area style="height: 12vh;" label="Opción {{ $loop->iteration }}" id="answer-id-{{ $answer->id }}"
        name="answer[{{ $answer->id }}]" error-validator="answer.{{ $answer->id }}"
        >{{ old('question.answer.'.$answer->id) ?? $answer->content ?? '' }}</x-form.text-area>
@endforeach
    <x-form.text-area style="height: 12vh;" label="Nueva Respuesta" id="answer" data-index="1"
        name="answer[]" error-validator="answer.*"
        >{{ old('question.answer.*') ?? '' }}</x-form.text-area>
