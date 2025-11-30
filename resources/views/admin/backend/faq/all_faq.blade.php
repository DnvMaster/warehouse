@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Частые вопросы') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('all.faqs') }}">{{ __('Все вопросы') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('настройки') }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Все вопросы') }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Заголовок') }}</th>
                                        <th>{{ __('Описание') }}</th>
                                        <th>{{ __('Действие') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allfaqs as $key => $allfaq)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $allfaq->title }}</td>
                                            <td>{{ Str::limit($allfaq->description, 50, '...') }}</td>
                                            <td>
                                                <a href="{{ route('edit.faqs', $allfaq->id) }}" class="btn btn-success btn-sm">{{ __('Редактировать') }}</a>  
                                                <a href="{{ route('delete.faqs',$allfaq->id) }}" class="btn btn-danger btn-sm" id="delete">{{ __('Удалить') }}</a>    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-success m-3" href="{{ route('add.faqs') }}">
                            <span class="mdi mdi-seed-plus-outline"></span>
                            &nbsp;{{ __('Добавить') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>                                            
@endsection