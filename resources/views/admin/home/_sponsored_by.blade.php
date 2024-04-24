@if(isset($home) && isset($home->sponsored_by))
    @if (isset($home->sponsored_by['image']))
        @foreach ($home->sponsored_by['image'] as $key => $image)
            <div class="admin-sponsored-by-row" style="width: 45%">
                <div class="card border">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {!! Form::label('sponsored_by', 'Sponsored By', ['class' => 'control-label pt-2']) !!}
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="admin-remove-sponsored-by btn btn-icon btn-danger btn-sm w-50px h-30px">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="{{ $home->id }}{{ $key }}holder-sponsored-by-image" class="sponsored-by-image">
                                            @if(!empty($image))
                                                <div class='lfmimage-container {{ $home->id }}{{ $key }}sponsored-by-imagelfmc0'>
                                                    <img src="{{ asset($image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <button type="button" onclick="removeImage('{{ $home->id }}{{ $key }}sponsored-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                        <i class='bi bi-trash'></i>
                                                    </button>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="{{ $home->id }}{{ $key }}lfm-sponsored-by-image" data-input="{{ $home->id }}{{ $key }}sponsored-by-image" data-preview="{{ $home->id }}{{ $key }}holder-sponsored-by-image" class="btn btn-primary text-white">
                                                    <i class="bi bi-image-fill"></i>Choose
                                                </a>
                                            </span>
                                            <input id="{{ $home->id }}{{ $key }}sponsored-by-image" class="form-control" type="text" name="sponsored_by_image[]" value="{{ isset($image) ? $image : '' }}">
                                        </div> 
                                            {!! $errors->first('sponsored_by_image', '<p class="help-block">:message</p>') !!} 
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('sponsored_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('sponsored_by_link[]', isset($home->sponsored_by['link']) && isset($home->sponsored_by['link'][$key]) ? $home->sponsored_by['link'][$key] : '', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('sponsored_by_link', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {!! Form::label('sponsored_by_image_alt', 'Sponsored By Image Alt', ['class' => 'control-label mb-3']) !!}
                                        {!! Form::text('sponsored_by_image_alt[]', isset($home->sponsored_by['image']) && isset($home->sponsored_by['image'][$key]) ? $home->sponsored_by['image'][$key] : '', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('sponsored_by_image_alt', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <input type="hidden" id="home-id" value="{{ $home->id }}">
        <input type="hidden" id="sponsored-image-count" value="{{ isset($home->sponsored_by) && isset($home->sponsored_by['image']) ? count($home->sponsored_by['image']) : 0 }}">
    @else
        <div class="admin-sponsored-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('sponsored_by', 'Sponsored By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-sponsored-by-image" class="sponsored-by-image">
                                        @if(!empty($home->sponsored_by_image))
                                            <div class='lfmimage-container sponsored-by-imagelfmc0'>
                                                <img src="{{ asset($home->sponsored_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('sponsored-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-sponsored-by-image" data-input="sponsored-by-image" data-preview="holder-sponsored-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="sponsored-by-image" class="form-control" type="text" name="sponsored_by_image[]" value="{{ isset($home->sponsored_by_image) ? $home->sponsored_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('sponsored_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('sponsored_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('sponsored_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('sponsored_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('sponsored_by_image_alt', 'Sponsored By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('sponsored_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('sponsored_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    @if (isset($sponsored_by_row) && $sponsored_by_row != 0)
        <div class="admin-sponsored-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('sponsored_by', 'Sponsored By', ['class' => 'control-label pt-2']) !!}
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="admin-remove-sponsored-by btn btn-icon btn-danger btn-sm w-50px h-30px">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}holder-sponsored-by-image" class="sponsored-by-image">
                                        @if(!empty($home->sponsored_by_image))
                                            <div class='{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}lfmimage-container sponsored-by-imagelfmc0'>
                                                <img src="{{ asset($home->sponsored_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}sponsored-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}lfm-sponsored-by-image" data-input="{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}sponsored-by-image" data-preview="{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}holder-sponsored-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="{{ isset($sponsored_by_row) ? $sponsored_by_row : '' }}sponsored-by-image" class="form-control" type="text" name="sponsored_by_image[]" value="{{ isset($home->sponsored_by_image) ? $home->sponsored_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('sponsored_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('sponsored_by_link', 'Link', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('sponsored_by_link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('sponsored_by_link', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('sponsored_by_image_alt', 'Sponsored By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('sponsored_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('sponsored_by_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="admin-sponsored-by-row" style="width: 45%">
            <div class="card border">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('sponsored_by', 'Sponsored By', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-sponsored-by-image" class="sponsored-by-image">
                                        @if(!empty($home->sponsored_by_image))
                                            <div class='lfmimage-container sponsored-by-imagelfmc0'>
                                                <img src="{{ asset($home->sponsored_by_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <button type="button" onclick="removeImage('sponsored-by-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-sponsored-by-image" data-input="sponsored-by-image" data-preview="holder-sponsored-by-image" class="btn btn-primary text-white">
                                                <i class="bi bi-image-fill"></i>Choose
                                            </a>
                                        </span>
                                        <input id="sponsored-by-image" class="form-control" type="text" name="sponsored_by_image[]" value="{{ isset($home->sponsored_by_image) ? $home->sponsored_by_image : '' }}">
                                    </div> 
                                        {!! $errors->first('sponsored_by_image', '<p class="help-block">:message</p>') !!} 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('sponsored_by_image_alt', 'Co Organized By Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('sponsored_by_image_alt[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('sponsored_by_image_alt', '<p class="help-block">:message</p>') !!}
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
        function sponsoredByImage(sponsored_by_image) {
            $(sponsored_by_image).filemanager('file');
        }

        $(document).ready(() => {
            var sponsored_image_count = $('#sponsored-image-count').val();
            var home_id   = $('#home-id').val();

            for (let i = 0; i <= sponsored_image_count ; i++) { 
                var sponsored_by_image = "#"+home_id+i+"lfm-sponsored-by-image";
                organizedByImage(sponsored_by_image);
            }
        })
    </script>
    <script>
        $(document).ready(() => {
            localStorage.removeItem('sponsored_by_row');
            
            $('.admin-add-sponsored-by').on('click', function() {

                var sponsored_by_row = localStorage.getItem('sponsored_by_row');
                    sponsored_by_row++;
                localStorage.setItem('sponsored_by_row', sponsored_by_row);

                $('#sponsored-by-row').val(sponsored_by_row);

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/home/get-sponsored-by') }}",
                    data: {"_token": "{{ csrf_token() }}",
                        sponsored_by_row: sponsored_by_row,
                    },
                    success: function (json) {
                        $('.admin-get-sponsored-by').append(json);
                        var sponsored_image = "#"+sponsored_by_row+"lfm-sponsored-by-image";
                        sponsoredByImage(sponsored_image);
                    }
                });
            })

            $(document).on('click', '.admin-remove-sponsored-by', function() {
                $(this).closest('.admin-sponsored-by-row').remove();
            })
        });
    </script>
@endpush