@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), __('menu.transaction.incoming_letter'), __('menu.general.view')]">
    </x-breadcrumb>

    <x-notaris-card :notaris="$data">
        <div class="mt-2">
            <div class="divider">
                <div class="divider-text">{{ __('menu.general.view') }}</div>
            </div>
            <dl class="row mt-3">

                <dt class="col-sm-3">{{ __('model.notaris.nota_number') }}</dt>
                <dd class="col-sm-9">{{ $data->nota_number }}</dd>

                <dt class="col-sm-3">{{ __('model.notaris.from') }}</dt>
                <dd class="col-sm-9">{{ $data->from }}</dd>

                <dt class="col-sm-3">{{ __('model.notaris.to') }}</dt>
                <dd class="col-sm-9">{{ $data->to }}</dd>

                <dt class="col-sm-3">{{ __('model.notaris.description') }}</dt>
                <dd class="col-sm-9">{{ $data->description }}</dd>

                <dt class="col-sm-3">{{ __('model.notaris.nota_date') }}</dt>
                <dd class="col-sm-9">{{ $data->formatted_nota_date }}</dd>

            </dl>
        </div>
    </x-notaris-card>

@endsection
