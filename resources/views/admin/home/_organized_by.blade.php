@if(isset($home) && isset($home->organized_by))
    @if (isset($home->organized_by['image']))
        @foreach ($home->organized_by['image'] as $key => $image)
            <div class="admin-organized-by-row" style="width: 45%">
                <div class="card border">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {!! Form::label('organized_by', 'Organized By', ['class' => 'control-label pt-2']) !!}
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="admin-remove-co-organized-by btn btn-icon btn-danger btn-sm w-50px h-30px">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="{{ $home->id }}{{ $key }}holder-organized-by-image" class="organized-by-image">
                                            @if(!empty($image))
                                                <div class='lfmimage-container {{ $home->id }}{{ $key }}organized-by-imagelfmc0'>
                                                    <img src="{{ asset($image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <button type="button" onclick="removeImage('{{ $home->id }}{{ $key }}organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                        <i class='bi bi-trash'></i>
                                                    </button>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="{{ $home->id }}{{ $key }}lfm-organized-by-image" data-input="{{ $home->id }}{{ $key }}organized-by-image" data-preview="{{ $home->id }}{{ $key }}holder-organized-by-image" class="btn btn-primary text-white">
                                                    <i class="bi bi-image-fill"></i>Choose
                                                </a>
                                            </span>
                                            <input id="{{ $home->id }}{{ $key }}organized-by-image" class="form-control" type="text" name="organized_by_image[]" value="{{ isset($image) ? $image : '' }}">
                                        </div> 
                                            {!! $errors->first('organized_by_image', '<p class="help-block">:message</p>') !!} 
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('organized_by_link[]', isset($home->organized_by['link']) && isset($home->organized_by['link'][$key]) ? $home->organized_by['link'][$key] : '' , ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('organized_by_link', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('organized_by_image_alt', 'Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('organized_by_image_alt[]', isset($home->organized_by['image_alt']) && isset($home->organized_by['image_alt'][$key]) ? $home->organized_by['image_alt'][$key] : '' , ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <input type="hidden" id="home-id" value="{{ $home->id }}">
        <input type="hidden" id="organized-image-count" value="{{ isset($home->organized_by) && isset($home->organized_by['image']) ? count($home->organized_by['image']) : 0 }}">
    @else
        <div class="admin-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('organized_by', 'Organized By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-organized-by-image" class="organized-by-image">
                                        @if(!empty($home->organized_by_image))
                                            <div class='lfmimage-container organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-organized-by-image" data-input="organized-by-image" data-preview="holder-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="organized-by-image" class="form-control" type="text" name="organized_by_image[]" value="{{ isset($home->organized_by_image) ? $home->organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('organized_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_image_alt', 'Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
   @if (isset($organized_by_row) && $organized_by_row != 0)
        <div class="admin-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('organized_by', 'Organized By', ['class' => 'control-label pt-2']) !!}
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="admin-remove-co-organized-by btn btn-icon btn-danger btn-sm w-50px h-30px">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="{{ isset($organized_by_row) ? $organized_by_row : '' }}holder-organized-by-image" class="organized-by-image">
                                        @if(!empty($home->organized_by_image))
                                            <div class='lfmimage-container organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('{{ isset($organized_by_row) ? $organized_by_row : '' }}organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="{{ isset($organized_by_row) ? $organized_by_row : '' }}lfm-organized-by-image" data-input="{{ isset($organized_by_row) ? $organized_by_row : '' }}organized-by-image" data-preview="{{ isset($organized_by_row) ? $organized_by_row : '' }}holder-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="{{ isset($organized_by_row) ? $organized_by_row : '' }}organized-by-image" class="form-control" type="text" name="organized_by_image[]" value="{{ isset($home->organized_by_image) ? $home->organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('organized_by', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_image_alt', 'Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="admin-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('organized_by', 'Organized By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-organized-by-image" class="organized-by-image">
                                        @if(!empty($home->organized_by_image))
                                            <div class='lfmimage-container organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-organized-by-image" data-input="organized-by-image" data-preview="holder-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="organized-by-image" class="form-control" type="text" name="organized_by_image[]" value="{{ isset($home->organized_by_image) ? $home->organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('organized_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('organized_by_image_alt', 'Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@push('scripts')
    <script>
        function organizedByImage(organized_by_image) {
            $(organized_by_image).filemanager('file');
        }

        $(document).ready(() => {
            var organized_image_count = $('#organized-image-count').val();
            var home_id               = $('#home-id').val();

            for (let i = 0; i <= organized_image_count ; i++) { 
                var organized_image = "#"+home_id+i+"lfm-organized-by-image";
                organizedByImage(organized_image);
            }
            
        })
    </script>
    <script>
        $(document).ready(() => {
            localStorage.removeItem('organized_by_row');
            
            $('.admin-add-organized-by').on('click', function() {

                var organized_by_row = localStorage.getItem('organized_by_row');
                    organized_by_row++;
                localStorage.setItem('organized_by_row', organized_by_row);

                $('#organized-by-row').val(organized_by_row);

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/home/get-organized-by') }}",
                    data: {"_token": "{{ csrf_token() }}",
                        organized_by_row: organized_by_row,
                    },
                    success: function (json) {
                        $('.admin-get-organized-by').append(json);
                        var organized_image = "#"+organized_by_row+"lfm-organized-by-image";
                        organizedByImage(organized_image);
                    }
                });
            })

            $(document).on('click', '.admin-remove-co-organized-by', function() {
                $(this).closest('.admin-organized-by-row').remove();
            })
        });
    </script>
@endpush