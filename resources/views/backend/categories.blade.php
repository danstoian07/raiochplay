@extends('backend.layout')

@section('head-scripts')

    <link href="/backend/plugins/nestable/jquery-nestable.css" rel="stylesheet">

@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')


            <div class="row clearfix">
                <!-- Task Info -->
                @if(isset($selected_category))
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="header">
                                <h2>EDITARE CATEGORIE</h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">help</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right bg-amber">
                                            <li><a href="javascript:void(0);">Formularul este destinat editarii de categorii &nbsp;&nbsp; <b>x</b></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <form action="{{ route('admin.edit.category', ['id' => $selected_category->id]) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name" value="{{ $selected_category->name }}" placeholder="Nume Categorie">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="slug" value="{{ $selected_category->slug }}" placeholder="Slug (link)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="keywords" value="{{ $selected_category->keywords }}" placeholder="Cuvinte cheie (separate de virgula)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="3" class="form-control no-resize" name="description" placeholder="Descriere...">{{ $selected_category->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Poza:</label>
                                                @if(isset($selected_category->picture))
                                                <img src="/categories/pictures/{{ $selected_category->picture }}" class="img-responsive thumbnail">
                                                @endif
                                                <div class="file-upload">
                                                    <label for="upload" class="file-upload__label">Incarca alta poza (1400 x 362)</label>
                                                    <input id="upload" class="file-upload__input" type="file" name="picture">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="active" id="basic_checkbox_1" @if($selected_category->active) checked @endif>
                                                <label for="basic_checkbox_1">Categorie activa</label>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <button type="submit" class="btn btn-primary waves-effect">Salveaza</button>
                                                <div class="btn-group pull-right">
                                                    <button type="button" class="btn bg-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        Sterge <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu bg-pink ">
                                                        <li><a href="{{ route('admin.delete.category', ['id' => $selected_category->id]) }}" class="btn bg-pink waves-effect">Da, vreau sa sterg!</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="header">
                            <h2>CATEGORIE NOUA</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.add.category') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nume Categorie">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Slug (link)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="keywords" value="{{ old('keywords') }}" placeholder="Cuvinte cheie (separate de virgula)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" name="description" placeholder="Descriere...">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="file-upload">
                                                <label for="upload" class="file-upload__label">Incarca poza (1400 x 362)</label>
                                                <input id="upload" class="file-upload__input" type="file" name="picture">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="active" id="basic_checkbox_1" checked>
                                            <label for="basic_checkbox_1">Categorie activa</label>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <button type="submit" class="btn btn-primary waves-effect">Adauga Categoria</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                <!-- #END# Task Info -->

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ORDONARE CATEGORII
                            </h2>
                            <a href="{{ route('admin.categories') }}" type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float pull-right">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="body">
                            <div class="clearfix m-b-20">
                                <br>
                                <div class="dd nestable-with-handle">
                                    <ol class="dd-list">
                                        @foreach($categories as $category)
                                        @if(! $category->main_category_id)
                                        <li class="dd-item dd3-item" data-id="{{ $category->id }}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">
                                                <a href="{{ route('admin.show.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                @if(! $category->active) <span class="badge bg-pink pull right">inactiva</span> @endif
                                            </div>
                                            @if(count($category->childrenOf($category->id)) > 0)
                                                <ol class="dd-list">
                                                @foreach($category->childrenOf($category->id) as $child)
                                                    <li class="dd-item dd3-item" data-id="{{ $child->id }}">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">
                                                            <a href="{{ route('admin.show.category', ['id' => $child->id]) }}">{{ $child->name }}</a>
                                                            @if(! $child->active) <span class="badge bg-pink pull right">inactiva</span> @endif
                                                        </div>
                                                        @if(count($category->childrenOf($child->id)) > 0)
                                                            <ol class="dd-list">
                                                                @foreach($child->childrenOf($child->id) as $nephew)
                                                                    <li class="dd-item dd3-item" data-id="{{ $nephew->id }}">
                                                                        <div class="dd-handle dd3-handle"></div>
                                                                        <div class="dd3-content">
                                                                            <a href="{{ route('admin.show.category', ['id' => $nephew->id]) }}">{{ $nephew->name }}</a>
                                                                            @if(! $nephew->active) <span class="badge bg-pink pull right">inactiva</span> @endif
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                </ol>
                                            @endif
                                        </li>
                                        @endif
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.order.categories') }}">
                                {{ csrf_field() }}
                                <textarea name="json" cols="30" rows="2" class="form-control no-resize" readonly="" style="display: none;"></textarea>
                                <button type="submit" id="submit-changes" class="btn btn-primary waves-effect" style="display: none;">Salveaza Ordinea</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('footer-scripts')


    <script src="/backend/plugins/nestable/jquery.nestable.js"></script>
    <script src="/backend/js/sortable-nestable.js"></script>



@endsection