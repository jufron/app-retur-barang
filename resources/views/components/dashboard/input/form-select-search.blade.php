{{-- <x-dashboard.input.form-select-search
label="Alasan Retur"
name="reasson_retur_id"
:model="$reassonRetur"
:selected="old('reasson_retur_id', $post->category_id ?? null)"
/> --}}

<div class="form-group mb-2 mt-4">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <select class="choices form-select @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" aria-label="Default select example">
    <option selected disabled>Pilih</option>
    @foreach ($model as $name => $id)
      <option value="{{ $id }}" {{ $selected == $id ? 'selected' : '' }}>
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

