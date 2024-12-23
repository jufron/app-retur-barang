{{--
  How to use this component:
  <x-dashboard.input.form-input-file
    name="file_name"
    label="File Label"
    placeholder="Choose file"
  />
--}}

<div class="mb-3 mt-4">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <input
    class="form-control"
    type="file"
    id="{{ $name }}"
    name="{{ $name }}"
    @isset($placeholder)
      placeholder="{{ $placeholder }}"
    @endisset
  >
  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
