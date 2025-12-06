@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">{{ __('Добавить категорию') }}</button>
                </div>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('all.blog.category') }}">{{ __('Добавление') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('категорий') }}</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Все категории блога') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Имя категории') }}</th>
                                        <th>{{ __('Тег категории') }}</th>
                                        <th>{{ __('Редактирование') }}</th>
                                        <th>{{ __('Удаление') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogCategory as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_slug }}</td>
                                            <td><a href="{{ route('edit.blog.category',$category->id)}}" class="btn btn-success btn-sm">{{ __('Редактировать') }}</a></td>
                                            <td><a href="{{ route('delete.blog.category',$category->id) }}" class="btn btn-danger btn-sm">{{ __('Удалить') }}</a></td>
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
    <!-- Start modal window -->
    <div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="standard-modalLabel">{{ __('Заголовок категории') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('store.blog.category') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 col-md-12 col-lg-12 col-xl-12">
                            <label for="input_one" class="form-label">{{ __('Категория блога') }}</label>
                            <input type="text" name="category_name" class="form-control" id="input_one">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Добавить') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection