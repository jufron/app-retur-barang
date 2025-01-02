{{-- <x-dashboard.input.form-select
label="Alasan Retur"
name="reasson_retur_id"
:model="$reassonRetur"
:selected="old('reasson_retur_id', $post->category_id ?? null)"
/> --}}

<div class="my-3">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <select class="form-select @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" aria-label="Default select example">
    <option selected disabled>Pilih</option>
    @foreach ($model as $name => $id)
      <option
        value="{{ $id }}" {{ $selected == $id ? 'selected' : '' }}
        >
        {{ $name }}
      </option>
    @endforeach
  </select>
  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
