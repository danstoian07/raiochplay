@extends('backend.layout')

@section('head-scripts')

    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="/backend/plugins/dropzone/dropzone.css" rel="stylesheet">

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
                                EDITARE PRODUS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.save.product', ['id' => $product->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  name="name" value="{{ $product->name }}" placeholder="Nume Produs">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="code" value="{{ $product->code }}" placeholder="Cod">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="category" class="form-control" name="category" value="{{ $product->category->name }}" placeholder="Categoria">
                                                <input type="hidden" id="category_id" name="category_id" value="{{ $product->category_id }}">
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
                                                <input type="text" class="form-control"  name="slug" value="{{ $product->slug }}" placeholder="Slug (link)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="panel-heading m-b--10" role="tab" id="headingTwo_1">
                                                <h4 class="panel-title">
                                                    <a class="" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1">
                                                        Descriere si materiale
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Descriere</label>
                                                            <div id="editor-container" style="height: 150px;"></div>
                                                            <input type="hidden" name="description" id="description" value="{{ $product->description }}">
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <div class="form-group">
                                                            <label>Materiale</label>
                                                            <div id="materials-container" style="height: 150px;"></div>
                                                            <input type="hidden" name="materials" id="materials" value="{{ $product->materials }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="active" id="basic_checkbox_1" @if($product->active) checked @endif>
                                            <label for="basic_checkbox_1">Produs activ</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-bottom: 0px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="salveaza">Salveaza</button>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADAUGARE IMAGINI (800 x 450)
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.product.upload') }}" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop sau Click pentru upload.</h3>
                                </div>
                            </form>
                            <div class="">
                                <br>
                                <a href="{{ route('admin.product.gallery', ['id' => $product->id]) }}" class="btn btn-primary">Mergi la Galerie</a>
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
    <script src="/backend/plugins/dropzone/dropzone.js"></script>

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


    <script>
        Dropzone.options.myDropzone = {
            paramName: 'file',
            maxFilesize: 5, // MB
            maxFiles: 20,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>




@endsection