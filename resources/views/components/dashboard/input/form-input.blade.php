{{--
    How to use:
    <x-dashboard.input.form-input
        name="email"
        label="Email Address"
        type="email"
        placeholder="Enter your email"
        value="example@email.com"
    />
--}}

<label class="mb-2 mt-4" for="{{$name}}">{{ $label }}</label>
<input 
  @isset($type)
    type="{{ $type }}"
  @else
    type="text"
  @endisset
  class="form-control @error($name) is-invalid @enderror"
  id="{{$name}}"
  @isset($placeholder)
    placeholder="{{ $placeholder }}"
  @endisset
  @isset($value)
    value="{{ $value }}"
  @endisset
  name="{{ $name }}"
>
@error($name)
<div class="invalid-feedback">
  <i class="bx bx-radio-circle"></i>
  {{ $message }}
</div>
@enderror
