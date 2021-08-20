<div>
    @error($errorValidator)
        @php
            $errorClass = 'is-invalid';
        @endphp
    @enderror
    <div class="form-floating mb-3">
        <textarea {{ $attributes->merge(['id' => $id, 'class' => "form-control $errorClass", 'type' => 'text', 'placeholder' => $label]) }}>{{ $slot }}</textarea>
        <label for="{{ $id }}" class="w-100" style="height: unset !important;">{{ $label }}</label>
        @error($errorValidator)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
