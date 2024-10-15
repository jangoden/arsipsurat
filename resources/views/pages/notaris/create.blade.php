@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.notaris'), __('menu.notaris'), __('menu.general.create')]">
    </x-breadcrumb>

    <div class="card mb-4">
        <form action="{{ route('notaris.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                {{-- <input type="hidden" name="type" value="incoming"> --}}
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="nota_number" :label="__('model.notaris.nota_number')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="nota_date" :label="__('model.notaris.nota_date')" type="date"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="from" :label="__('model.notaris.from')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="to" :label="__('model.notaris.to')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <x-input-textarea-form name="description" :label="__('model.letter.description')"/>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>
@endsection
