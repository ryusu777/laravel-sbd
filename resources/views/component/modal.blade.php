@isset($btn_danger)
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $modal_id }}">
        {{ $button_label }}
    </button>
@else
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $modal_id }}">
        {{ $button_label }}
    </button>
@endisset

<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="{{ $modal_id . 'label' }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modal_id . 'label' }}">{{ $modal_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @yield('modal.body')
            </div>
        </div>
    </div>
</div>