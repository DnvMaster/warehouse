@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Все клиенты') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('all.team') }}">{{ __('Просмотр') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('клиента') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Все клиенты') }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Имя') }}</th>
                                        <th>{{ __('Должность') }}</th>
                                        <th>{{ __('Фото') }}</th>
                                        <th>{{ __('Действие') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $key => $team)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->position }}</td>
                                            <td><img src="{{ asset($team->image) }}" style="width: 70px; height: 40px;" alt="{{ $team->name }}"></td>
                                            <td>
                                                <a href="{{ route('edit.team',$team->id) }}"><span class="mdi mdi-file-edit-outline" style="font-size: 26px; color:green;"></span></a>&nbsp;&nbsp;
                                                <a href="{{ route('delete.team', $team->id) }}" id="delete"><span class="mdi mdi-delete-empty-outline" style="font-size: 26px; color:red;"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-success m-3" href="{{ route('add.team') }}">
                            <span class="mdi mdi-seed-plus-outline"></span>
                            &nbsp;{{ __('Добавить') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>                                            
@endsection