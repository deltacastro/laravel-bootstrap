<div>
    @error($errorValidator)
        @php
            $errorClass = 'is-invalid';
        @endphp
    @enderror
    <div class="form-floating mb-3 fw-bold">

        <input {{ $attributes->merge(['id' => $id, 'class' => "fw-bold form-control $errorClass", 'type' => 'text', 'placeholder' => $label]) }}>
        <label for="{{ $id }}">{{ $label }}</label>
        @error($errorValidator)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
