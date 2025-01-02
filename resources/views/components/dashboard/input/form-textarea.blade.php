<div class="my-3">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <textarea
    class="form-control @error($name) is-invalid @enderror"
    id="{{ $name }}"
    rows="3"
    name="{{ $name }}"
    @isset($placeholder)
    placeholder="{{ $placeholder }}"
    @endisset
    >{{ $slot }}</textarea>
</div>
