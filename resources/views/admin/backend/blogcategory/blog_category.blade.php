@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">

        <!-- Start button modal window -->
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">{{ __('Все категории блога') }}</button>
        </div>
        <!-- End button modal window -->

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Блог / Категории') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('all.blog.category') }}">{{ __('Категории') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Блог') }}</li>
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
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Имя категории') }}</th>
                                        <th>{{ __('Тег категории') }}</th>
                                        <th>{{ __('Действие') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogCategory as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_slug }}</td>
                                            <td>
                                                <a href="{--{ route('edit.category',$category->id) }--}"><span class="mdi mdi-file-edit-outline" style="font-size: 26px; color:green;"></span></a>&nbsp;&nbsp;
                                                <a href="{--{ route('delete.category', $category->id) }--}" id="delete"><span class="mdi mdi-delete-empty-outline" style="font-size: 26px; color:red;"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-success m-3" href="{{ route('add.review') }}">
                            <span class="mdi mdi-seed-plus-outline"></span>
                            &nbsp;{{ __('Добавить') }}
                        </a>
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
                    <h5>{{ __('Категории блога') }}</h5>
                    <p>{{ __('Категории блога') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="buttom" class="btn bth-light" data-bs-dismiss="modal">{{ __('Закрыть') }}</button>
                    <button type="button" class="btn btn-primary">{{ __('Сохранить') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal window -->
@endsection