<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <div class="card-title">
                <h5 class="text-nowrap mb-0 fw-bold">{{ $notaris->nota_number }}</h5>
                <small class="text-black">
                    <span
                    class="text-secondary">{{ __('model.notaris.from') }}:</span> {{ $notaris->from  }} |
                    <span
                        class="text-secondary">{{ __('model.notaris.to') }}:</span> {{ $notaris->to }}
                </small>
            </div>
            <div class="card-title d-flex flex-row">
                <div class="d-inline-block mx-2 text-end text-black">
                    <small class="d-block text-secondary">{{ __('model.notaris.nota_date') }}</small>
                    {{ $notaris->formatted_nota_date }}
                </div>
                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-{{ $notaris->id }}"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>

                        <div class="dropdown-menu dropdown-menu-end"
                             aria-labelledby="dropdown-{{ $notaris->id }}">
                            @if(!\Illuminate\Support\Facades\Route::is('*.show'))
                                <a class="dropdown-item"
                                   href="{{ route('notaris.show', $notaris) }}">{{ __('menu.general.view') }}</a>
                            @endif
                            <a class="dropdown-item"
                               href="{{ route('notaris.edit', $notaris) }}">{{ __('menu.general.edit') }}</a>
                            <form action="{{ route('notaris.destroy', $notaris) }}" class="d-inline"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <span
                                    class="dropdown-item cursor-pointer btn-delete">{{ __('menu.general.delete') }}</span>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <hr>
        <p>{{ $notaris->description }}</p>
        <div class="d-flex justify-content-between flex-column flex-sm-row">
        </div>
        {{ $slot }}
    </div>
</div>
