@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ __('Добавить пост') }}</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('add.blog.post') }}">{{ __('Добавить') }}&nbsp;/</a></li>
                    <li class="breadcumb-item active">&nbsp;{{ __('пост') }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="tab-panel pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title text-center mb-0">{{ __('Добавление поста') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('store.blog.post') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="form-group mb-3 row">
                                                <label class="form-label"><b>{{ __('Категория блога') }}</b></label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <select name="blog_category_id" class="form-select" id="example-select">
                                                        <option selected>{{ __('Выберите категорию') }}</option>
                                                        @foreach($blog_category as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label class="form-label"><b>{{ __('Заголовок поста') }}</b></label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <input class="form-control" name="post_title" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mb-3 row">
                                                <label class="form-label"><b>{{ __('Текст поста') }}</b></label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <textarea name="long_description" id="description" style="display: none;"></textarea>
                                                    <div id="quill-editor" style="height: 200px;">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group mb-3 row">
                                                <label class="form-label"><b>{{ __('Изображение поста') }}</b></label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <input class="form-control" type="file" name="image" id="image">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="form-label"></label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <img class="rounded-circle avatar-xxl img-thumbnail float-start" id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="mdi mdi-file-edit-outline"></span>&nbsp;{{ __('Создать') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').onsubmit = function() {
            var description = document.querySelector('#description');
            description.value = quill.root.innerHTML;
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection