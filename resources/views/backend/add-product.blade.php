@extends('backend.layout')

@section('head-scripts')

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">

            @include('backend.partials.alert')


            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRODUS NOU
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.product.add') }}">
                                    {{ csrf_field() }}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}"  placeholder="Nume Produs">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="code" value="{{ old('code') }}"  placeholder="Cod">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="category" class="form-control" name="category" value="{{ old('category') }}"  placeholder="Categoria">
                                                <input type="hidden" id="category_id" name="category_id" value="{{ old('category_id') }}">
                                                <div id="select-category">
                                                    <div class="pull-right" id="close">x</div>
                                                    <ul>
                                                    @foreach($categories as $category)
                                                        @if(! $category->main_category_id)
                                                            <li class="slct" data-id="{{ $category->id }}">{{ $category->name }}</li>
                                                            @if(count($category->childrenOf($category->id)) > 0)
                                                                <ul>
                                                                @foreach($category->childrenOf($category->id) as $child)
                                                                    <li class="slct" data-id="{{ $child->id }}">{{ $child->name }}</li>
                                                                     @if(count($child->childrenOf($child->id)) > 0)
                                                                        <ul>
                                                                        @foreach($child->childrenOf($child->id) as $nephew)
                                                                            <li class="slct" data-id="{{ $nephew->id }}">{{ $nephew->name }}</li>
                                                                        @endforeach
                                                                        </ul>
                                                                     @endif
                                                                @endforeach
                                                                </ul>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  name="slug" value="{{ old('slug') }}"  placeholder="Slug (link)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Descriere</label>
                                            <div id="editor-container" style="height: 150px;"></div>
                                            <input type="hidden" name="description" id="description" value="{{ old('description') }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Materiale</label>
                                            <div id="materials-container" style="height: 150px;"></div>
                                            <input type="hidden" name="materials" id="materials" value="{{ old('materials') }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="active" id="basic_checkbox_1" checked>
                                            <label for="basic_checkbox_1">Produs activ</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-bottom: 0px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="salveaza">Adauga Produs</button>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

@endsection

@section('footer-scripts')

    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        $(document).ready(function() {

            var quill = new Quill('#editor-container', {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        ['code-block']
                    ]
                },
                theme: 'snow'  // or 'bubble'
            });

            quill.root.innerHTML = $("#description").val();

            var quill2 = new Quill('#materials-container', {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        ['code-block']
                    ]
                },
                theme: 'snow'  // or 'bubble'
            });

            quill2.root.innerHTML = $("#materials").val();

            $("#salveaza").click(function() {

                var detalii = quill.root.innerHTML;
                $("#description").val(detalii);

                var materiale = quill2.root.innerHTML;
                $("#materials").val(materiale);

            });

            //categorii
            $("#category").focus(function() {
                $("#select-category").show();
            });
            $("#close").click(function() {
                $("#select-category").hide();
            });
            $(".slct").click(function () {
                var id = $(this).data("id");
                $('#category_id').val(id);
                var name = $(this).text();
                $('#category').val(name);
                $("#select-category").hide();
            });

        });
    </script>




@endsection