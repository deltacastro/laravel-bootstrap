<div>
    @error($errorValidator)
        @php
            $errorClass = 'is-invalid';
        @endphp
    @enderror
    <div class="form-floating mb-3">

        <input {{ $attributes->merge(['id' => $id, 'class' => "form-control $errorClass", 'type' => 'text', 'placeholder' => $label]) }}>
        <label for="{{ $id }}">{{ $label }}</label>
        @error($errorValidator)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
