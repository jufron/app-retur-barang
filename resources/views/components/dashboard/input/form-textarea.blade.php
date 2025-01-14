{{--
  Form textarea component for dashboard layouts
  
  * @param string $name - The name/id attribute for the textarea
  * @param string $label - The label text to display above textarea
  * @param string|null $placeholder - Optional placeholder text
  * @param string $slot - The default content/value of the textarea
  
  Example:
  <x-dashboard.input.form-textarea 
    name="description"
    label="Product Description"
    placeholder="Enter description...">
    {{ old('description', $product->description) }}
  </x-dashboard.input.form-textarea>
--}}

@props(['name', 'label', 'placeholder' => null])

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