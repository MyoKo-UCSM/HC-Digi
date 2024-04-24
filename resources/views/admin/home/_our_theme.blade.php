@if(isset($home) && isset($home->our_themes))
    @if (isset($home->our_themes['title']))
        @foreach ($home->our_themes['title'] as $key => $title)
            <div class="admin-our-theme-row">
                <div class="card border">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {!! Form::label('our_theme', 'Conference Theme', ['class' => 'control-label pt-2']) !!}
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="admin-remove-our-theme btn btn-icon btn-danger btn-sm w-50px h-30px">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('title', 'Title', ['class' => 'control-label mb-3']) !!}
                                {!! Form::text('our_theme_title[]', isset($title) ? $title : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('our_theme_title[]', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                {!! Form::label('description', 'Description', ['class' => 'control-label mb-3']) !!}
                                {!! Form::textarea('our_theme_description[]', isset($home->our_themes['description']) && isset($home->our_themes['description'][$key]) ? $home->our_themes['description'][$key] : null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('our_theme_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="admin-our-theme-row">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('our_theme', 'Conference Theme', ['class' => 'control-label pt-2']) !!}
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="admin-remove-our-theme btn btn-icon btn-danger btn-sm w-50px h-30px">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('title', 'Title', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('our_theme_title[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('our_theme_title[]', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('description', 'Description', ['class' => 'control-label mb-3']) !!}
                            {!! Form::textarea('our_theme_description[]', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                            {!! $errors->first('our_theme_description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    @if (isset($our_theme_row) && $our_theme_row != 0)
        <div class="admin-our-theme-row mt-4">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('our_theme', 'Conference Theme', ['class' => 'control-label pt-2']) !!}
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="admin-remove-our-theme btn btn-icon btn-danger btn-sm w-50px h-30px">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('title', 'Title', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('our_theme_title[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('our_theme_title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('description', 'Description', ['class' => 'control-label mb-3']) !!}
                            {!! Form::textarea('our_theme_description[]', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                            {!! $errors->first('our_theme_description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else 
        <div class="admin-our-theme-row">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('our_theme', 'Conference Theme', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('title', 'Title', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('our_theme_title[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('our_theme_title[]', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('description', 'Description', ['class' => 'control-label mb-3']) !!}
                            {!! Form::textarea('our_theme_description[]', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                            {!! $errors->first('our_theme_description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@push('scripts')
    <script>
        $(document).ready(() => {
            localStorage.removeItem('our_theme_row');
            $('.admin-add-our-theme').on('click', function() {
                var our_theme_row = localStorage.getItem('our_theme_row');
                    our_theme_row++;

                localStorage.setItem('our_theme_row', our_theme_row);
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/home/get-our-theme') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        our_theme_row: our_theme_row,
                    },
                    datatype: 'json',
                    success: function(json) {
                        $('.admin-get-our-theme').append(json);
                        tinymce.init(editor);
                    }
                });
            })

            $(document).on('click', '.admin-remove-our-theme', function() {
                $(this).closest('.admin-our-theme-row').remove();
            })
        })
    </script>
@endpush