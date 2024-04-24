@if(isset($home) && isset($home->co_organized_by))
    @if (isset($home->co_organized_by['image']))
        @foreach ($home->co_organized_by['image'] as $key => $image)
            <div class="admin-co-organized-by-row" style="width: 45%">
                <div class="card border">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {!! Form::label('co_organized_by', 'Co Organized By', ['class' => 'control-label pt-2']) !!}
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
                                        <div id="{{ $home->id }}{{ $key }}holder-co-organized-by-image" class="co-organized-by-image">
                                            @if(!empty($image))
                                                <div class='lfmimage-container {{ $home->id }}{{ $key }}co-organized-by-imagelfmc0'>
                                                    <img src="{{ asset($image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <button type="button" onclick="removeImage('{{ $home->id }}{{ $key }}co-organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                        <i class='bi bi-trash'></i>
                                                    </button>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="{{ $home->id }}{{ $key }}lfm-co-organized-by-image" data-input="{{ $home->id }}{{ $key }}co-organized-by-image" data-preview="{{ $home->id }}{{ $key }}holder-co-organized-by-image" class="btn btn-primary text-white">
                                                    <i class="bi bi-image-fill"></i>Choose
                                                </a>
                                            </span>
                                            <input id="{{ $home->id }}{{ $key }}co-organized-by-image" class="form-control" type="text" name="co_organized_by_image[]" value="{{ isset($image) ? $image : '' }}">
                                        </div> 
                                            {!! $errors->first('co_organized_by_image', '<p class="help-block">:message</p>') !!} 
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('co_organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('co_organized_by_link[]', isset($home->co_organized_by['link']) && isset($home->co_organized_by['link'][$key]) ? $home->co_organized_by['link'][$key] : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('co_organized_by_link', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('co_organized_by_image_alt', 'Co Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('co_organized_by_image_alt[]', isset($home->co_organized_by['image_alt']) && isset($home->co_organized_by['image_alt'][$key]) ? $home->co_organized_by['image_alt'][$key] : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('co_organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <input type="hidden" id="home-id" value="{{ $home->id }}">
        <input type="hidden" id="co-organized-image-count" value="{{ isset($home->co_organized_by) && isset($home->co_organized_by['image']) ? count($home->co_organized_by['image']) : 0 }}">
    @else
        <div class="admin-co-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('co_organized_by', 'Co Organized By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-co-organized-by-image" class="co-organized-by-image">
                                        @if(!empty($home->co_organized_by_image))
                                            <div class='lfmimage-container co-organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->co_organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('co-organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-co-organized-by-image" data-input="co-organized-by-image" data-preview="holder-co-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="co-organized-by-image" class="form-control" type="text" name="co_organized_by_image[]" value="{{ isset($home->co_organized_by_image) ? $home->co_organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('co_organized_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_image_alt', 'Co Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    @if (isset($co_organized_by_row) && $co_organized_by_row != 0)
        <div class="admin-co-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('co_organized_by', 'Co Organized By', ['class' => 'control-label pt-2']) !!}
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
                                    <div id="{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}holder-co-organized-by-image" class="co-organized-by-image">
                                        @if(!empty($home->co_organized_by_image))
                                            <div class='lfmimage-container co-organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->co_organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}co-organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}lfm-co-organized-by-image" data-input="{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}co-organized-by-image" data-preview="{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}holder-co-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="{{ isset($co_organized_by_row) ? $co_organized_by_row : '' }}co-organized-by-image" class="form-control" type="text" name="co_organized_by_image[]" value="{{ isset($home->co_organized_by_image) ? $home->co_organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('co_organized_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_image_alt', 'Co Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="admin-co-organized-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('co_organized_by', 'Co Organized By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-co-organized-by-image" class="co-organized-by-image">
                                        @if(!empty($home->co_organized_by_image))
                                            <div class='lfmimage-container co-organized-by-imagelfmc0'>
                                                <img src="{{ asset($home->co_organized_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('co-organized-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-co-organized-by-image" data-input="co-organized-by-image" data-preview="holder-co-organized-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="co-organized-by-image" class="form-control" type="text" name="co_organized_by_image[]" value="{{ isset($home->co_organized_by_image) ? $home->co_organized_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('co_organized_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('co_organized_by_image_alt', 'Co Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('co_organized_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('co_organized_by_image_alt', '<p class="help-block">:message</p>') !!}
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
        function coOrganizedByImage(co_organized_by_image) {
            $(co_organized_by_image).filemanager('file');
        }

        $(document).ready(() => {
            var co_organized_image_count = $('#co-organized-image-count').val();
            var home_id   = $('#home-id').val();

            for (let i = 0; i <= co_organized_image_count ; i++) { 
                var co_organized_image = "#"+home_id+i+"lfm-co-organized-by-image";
                organizedByImage(co_organized_image);
            }
        })
    </script>
    <script>
        $(document).ready(() => {
            localStorage.removeItem('co_organized_by_row');
            
            $('.admin-add-co-organized-by').on('click', function() {

                var co_organized_by_row = localStorage.getItem('co_organized_by_row');
                    co_organized_by_row++;
                localStorage.setItem('co_organized_by_row', co_organized_by_row);

                $('#co-organized-by-row').val(co_organized_by_row);

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/home/get-co-organized-by') }}",
                    data: {"_token": "{{ csrf_token() }}",
                        co_organized_by_row: co_organized_by_row,
                    },
                    success: function (json) {
                        $('.admin-get-co-organized-by').append(json);
                        var co_organized_image = "#"+co_organized_by_row+"lfm-co-organized-by-image";
                        coOrganizedByImage(co_organized_image);
                    }
                });
            })

            $(document).on('click', '.admin-remove-co-organized-by', function() {
                $(this).closest('.admin-co-organized-by-row').remove();
            })
        });
    </script>
@endpush