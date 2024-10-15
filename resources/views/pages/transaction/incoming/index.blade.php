@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), __('menu.transaction.incoming_letter')]">
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#smallModal">
            Import Excel
        </button>
        <a href="{{ route('transaction.incoming.create') }}" class="btn btn-primary">{{ __('menu.general.create') }}</a>
    </x-breadcrumb>

    @foreach($data as $letter)
        <x-letter-card
            :letter="$letter"
        />
    @endforeach

    {!! $data->appends(['search' => $search])->links() !!}
    @include('pages.transaction.incoming.modal')
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#smallModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data('remote'));
            });
        });
    </script>
@endsection
