@extends('admin.admin_master')
@section('admin')
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Пост') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('all.blog.post') }}">{{ __('Добавить') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('пост') }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Все посты') }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{ __('Категория') }}</th>
                                        <th>{{ __('Заголовок') }}</th>
                                        <th>{{ __('Изображение') }}</th>
                                        <th>{{ __('Описание') }}</th>
                                        <th>{{ __('Действие') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allPosts as $key => $post)
                                    <tr>        
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $post->category->category_name }}</td>
                                        <td>{{ $post->post_title }}</td>
                                        <td><img src="{{ asset($post->image) }}" style="width: 70px; height: 40px;" alt="{{ $post->name }}"></td>
                                        <td>{!! Str::limit($post->long_description, 50, '...') !!}</td>
                                        <td>
                                            <a href="{{ route('edit.blog.post',$post->id) }}"><span class="mdi mdi-file-edit-outline" style="font-size: 26px; color:green;"></span></a>&nbsp;&nbsp;
                                            <a href="{--{ route('delete.blog.post', $post->id) }--}" id="delete"><span class="mdi mdi-delete-empty-outline" style="font-size: 26px; color:red;"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-success m-3" href="{{ route('add.blog.post') }}">
                            <span class="mdi mdi-seed-plus-outline"></span>
                            &nbsp;{{ __('Добавить') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>                                            
@endsection