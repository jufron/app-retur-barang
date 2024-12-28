@props(['id', 'title', 'size' => null])
{{--
  * you can copy and use this modal component:

  <x-dashboard.modal.moda-borderles
    id="modal-id"
    title="Modal Title"
    size="modal-lg"       // optional
    >
    <div class="modal-body">

    </div>
    <div class="modal-footer">
      <button class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </x-dashboard.modal.moda-borderles>
--}}

<div
  class="modal fade text-left modal-borderless"
  id="{{ $id }}"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel1"
  aria-hidden="true"
  data-bs-backdrop="static"
  >
  <div @class([
      'modal-full'  => $size === 'full',
      'modal-xl'    => $size === 'extra-large',
      'modal-lg'    => $size === 'large',
      'modal-md'    => $size === 'medium',
      'modal-sm'    => $size === 'small',
      'modal-dialog modal-dialog-scrollable modal-dialog-centered'
  ])
  role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $title }}</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        {{ $slot }}
      </div>
  </div>
</div>
