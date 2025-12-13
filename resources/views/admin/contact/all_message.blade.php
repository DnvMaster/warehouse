@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Контакты') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('contact.all.message') }}">{{ __('Все') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('сообщения') }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Все сообщения') }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Имя') }}</th>
                                        <th>{{ __('Эл.почта') }}</th>
                                        <th>{{ __('Сообщение') }}</th>
                                        <th>{{ __('Действие') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $key => $message)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ Str::limit($message->message, 70, '...') }}</td>
                                            <td><a href="{{ route('delete.contact.message', $message->id) }}" class="btn btn-danger btn-sm" id="delete">{{ __('Удалить') }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                   
@endsection