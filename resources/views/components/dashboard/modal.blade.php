{{-- ? modal logout --}}
<div
  class="modal fade text-left modal-borderless"
  id="{{ $id }}"
  tabindex="-1"
  role="dialog"
  aria-labelledby="{{ $id }}Label1"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title white">{{ $modalTitle }}</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
          aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      {{ $slot }}
    </div>
  </div>
</div>
