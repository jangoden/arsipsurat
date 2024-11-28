@extends('layout.main')

@section('content')
    <x-breadcrumb :values="[__('menu.notaris'), __('menu.notaris')]">
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#smallModal">
            Import Excel
        </button>
        <a href="{{ route('notaris.create') }}" class="btn btn-primary">{{ __('menu.general.create') }}</a>

    </x-breadcrumb>

    <div class="card mb-5">
        <div class="card-header">
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('menu.general.no') }}
                            @if ($sort == 'id' && $order == 'asc')
                                <a
                                    href="{{ route('notaris.index', ['sort' => 'id', 'order' => 'desc', 'search' => $search]) }}">
                                    <i class='bx bx-up-arrow-alt text-warning'></i>ASC
                                </a>
                            @elseif ($sort == 'id' && $order == 'desc')
                                <a
                                    href="{{ route('notaris.index', ['sort' => 'id  ', 'order' => 'asc', 'search' => $search]) }}">
                                    <i class='bx bx-down-arrow-alt text-warning'></i>DESC
                                </a>
                            @endif
                        </th>
                        <th>
                            {{ __('model.notaris.nota_number')}}
                        </th>
                        <th>{{ __('model.notaris.nota_date') }}</th>
                        <th>{{ __('model.notaris.description') }}</th>
                        <th>{{ __('model.notaris.from') }}</th>
                        <th>{{ __('model.notaris.to') }}</th>
                        <th>{{ __('menu.general.action') }}</th>
                    </tr>
                </thead>
                @if ($data)
                    @php
                        $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                    @endphp
                    <tbody>
                        @foreach ($data as $notaris)
                            <tr>
                                <td>
                                    {{ $notaris->id }}
                                </td>
                                <td class="text-wrap">
                                    <strong>{{ $notaris->nota_number }}</strong>
                                </td>
                                <td class="text-wrap">
                                    {{ $notaris->formatted_nota_date }}
                                </td>
                                <td class="text-wrap">
                                    {{ Str::limit($notaris->description, 50, '...') }}
                                </td>
                                <td class="text-wrap">{{ $notaris->from }}</td>
                                <td class="text-wrap">{{ $notaris->to }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('notaris.show', $notaris) }}">{{ __('menu.general.view') }}</a>
                                            <a class="dropdown-item" href="{{ route('notaris.edit', $notaris) }}">
                                                {{ __('menu.general.edit') }}
                                            </a>
                                            <form action="{{ route('notaris.destroy', $notaris) }}" class="d-inline"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <span
                                                    class="dropdown-item cursor-pointer btn-delete">{{ __('menu.general.delete') }}</span>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center">
                                {{ __('menu.general.empty') }}
                            </td>
                        </tr>
                    </tbody>
                @endif
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>{{ __('menu.general.no') }}</th>
                        <th>{{ __('model.notaris.nota_number') }}</th>
                        <th>{{ __('model.notaris.nota_date') }}</th>
                        <th>{{ __('model.notaris.description') }}</th>
                        <th>{{ __('model.notaris.from') }}</th>
                        <th>{{ __('model.notaris.to') }}</th>
                        <th>{{ __('menu.general.action') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {!! $data->appends(['search' => $search, 'order' => $order, 'sort' => $sort])->links() !!}
    @include('pages.notaris.modal')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#smallModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data('remote'));
            });
        });
    </script>
@endpush
