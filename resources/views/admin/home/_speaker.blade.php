@if(isset($home) && isset($home->speakers))
    @if (isset($home->speakers['image']))
        @foreach ($home->speakers['image'] as $key => $image)
            <div class="panel-block admin-speaker-row">
                <div class="card border p-5">
                    <div class="card-body pt-0">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {!! Form::label('speaker', 'Speaker', ['class' => 'control-label pt-2']) !!}
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="admin-remove-speaker btn btn-icon btn-danger btn-sm w-50px h-30px">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="holder-speaker-image" style="margin: 0 auto;width: 60%;" class="speaker-image">
                                @if(!empty($image))
                                    <div class='lfmimage-container speaker-imagelfmc0'>
                                        <img src="{{ asset($image) }}" class='lfmimage w-100' style="height: 20rem;">
                                        <button type="button" onclick="removeImage('speaker-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                            <i class='bi bi-trash'></i>
                                        </button>
                                    </div>
                                @else
                                    <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                @endif
                            </div>
                            <div class="input-group mt-3">
                                <span class="input-group-btn">
                                    <a id="lfm-speaker-image" data-input="speaker-image" data-preview="holder-speaker-image" class="btn btn-primary text-white">
                                        <i class="bi bi-image-fill"></i>Choose
                                    </a>
                                </span>
                                <input id="speaker-image" class="form-control" type="text" name="speaker_image[]" value="{{ isset($image) ? $image : '' }}">
                            </div> 
                            {!! $errors->first('speaker_image', '<p class="help-block">:message</p>') !!} 
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                {!! Form::label('link', 'Link', ['class' => 'control-label mb-3']) !!}
                                {!! Form::text('link[]', isset($home->speakers['link']) && isset($home->speakers['link'][$key]) ? $home->speakers['link'][$key] : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                {!! Form::label('speaker_name', 'Speaker Name', ['class' => 'control-label mb-3']) !!}
                                {!! Form::text('speaker_name[]', isset($home->speakers['name']) && isset($home->speakers['name'][$key]) ? $home->speakers['name'][$key] : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('speaker_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                {!! Form::label('speaker_institution', 'Speaker Institution', ['class' => 'control-label mb-3']) !!}
                                {!! Form::text('speaker_institution[]', isset($home->speakers['institution']) && isset($home->speakers['institution'][$key]) ? $home->speakers['institution'][$key] : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('speaker_institution', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="panel-block admin-speaker-row">
            <div class="card border p-5">
                <div class="card-body pt-0">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('speaker', 'Speaker', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="holder-speaker-image" style="margin: 0 auto;width: 60%;" class="speaker-image">
                            @if(!empty($home->speaker_image))
                                <div class='lfmimage-container speaker-imagelfmc0'>
                                    <img src="{{ asset($home->speaker_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <button type="button" onclick="removeImage('speaker-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-speaker-image" data-input="speaker-image" data-preview="holder-speaker-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="speaker-image" class="form-control" type="text" name="speaker_image[]" value="{{ isset($home->speaker_image) ? $home->speaker_image : '' }}">
                        </div> 
                        {!! $errors->first('speaker_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('link', 'Link', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_name', 'Speaker Name', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_name[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_institution', 'Speaker Institution', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_institution[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_institution', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    @if (isset($speaker_row) && $speaker_row != 0)
        <div class="panel-block admin-speaker-row">
            <div class="card border p-5">
                <div class="card-body pt-0">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('speaker', 'Speaker', ['class' => 'control-label pt-2']) !!}
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="admin-remove-speaker btn btn-icon btn-danger btn-sm w-50px h-30px">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="{{ isset($speaker_row) ? $speaker_row : '' }}holder-speaker-image" style="margin: 0 auto;width: 60%;" class="speaker-image">
                            @if(!empty($home->speaker_image))
                                <div class='lfmimage-container speaker-imagelfmc0'>
                                    <img src="{{ asset($home->speaker_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <button type="button" onclick="removeImage('{{ isset($speaker_row) ? $speaker_row : '' }}speaker-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="{{ isset($speaker_row) ? $speaker_row : '' }}lfm-speaker-image" data-input="{{ isset($speaker_row) ? $speaker_row : '' }}speaker-image" data-preview="{{ isset($speaker_row) ? $speaker_row : '' }}holder-speaker-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="{{ isset($speaker_row) ? $speaker_row : '' }}speaker-image" class="form-control" type="text" name="speaker_image[]" value="{{ isset($home->speaker_image) ? $home->speaker_image : '' }}">
                        </div> 
                        {!! $errors->first('speaker_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('link', 'Link', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_name', 'Speaker Name', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_name[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_institution', 'Speaker Institution', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_institution[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_institution', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="panel-block admin-speaker-row">
            <div class="card border p-5">
                <div class="card-body pt-0">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            {!! Form::label('speaker', 'Speaker', ['class' => 'control-label pt-2']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="holder-speaker-image" style="margin: 0 auto;width: 60%;" class="speaker-image">
                            @if(!empty($home->speaker_image))
                                <div class='lfmimage-container speaker-imagelfmc0'>
                                    <img src="{{ asset($home->speaker_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <button type="button" onclick="removeImage('speaker-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-speaker-image" data-input="speaker-image" data-preview="holder-speaker-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="speaker-image" class="form-control" type="text" name="speaker_image[]" value="{{ isset($home->speaker_image) ? $home->speaker_image : '' }}">
                        </div> 
                        {!! $errors->first('speaker_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('link', 'Link', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('link[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_name', 'Speaker Name', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_name[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! Form::label('speaker_institution', 'Speaker Institution', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('speaker_institution[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('speaker_institution', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@push('scripts')
    <script>
        function speakerImage(speaker_image) {
            $(speaker_image).filemanager('file');
        }

        // $(document).ready(() => {
        //     var co_organized_image_count = $('#co-organized-image-count').val();
        //     var home_id   = $('#home-id').val();

        //     for (let i = 0; i <= co_organized_image_count ; i++) { 
        //         var co_organized_image = "#"+home_id+i+"lfm-co-organized-by-image";
        //         organizedByImage(co_organized_image);
        //     }
        // })
    </script>
    <script>
        $(document).ready(() => {
            localStorage.removeItem('speaker_row');
            
            $('.admin-add-speaker').on('click', function() {

                var speaker_row = localStorage.getItem('speaker_row');
                    speaker_row++;
                localStorage.setItem('speaker_row', speaker_row);

                $('#speaker-row').val(speaker_row);

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/home/get-speaker') }}",
                    data: {"_token": "{{ csrf_token() }}",
                        speaker_row: speaker_row,
                    },
                    success: function (json) {
                        console.log(json);
                        $('.admin-get-speaker').append(json);
                        var speker_image = "#"+speaker_row+"lfm-speaker-image";
                        speakerImage(speker_image);
                    }
                });
            })

            $(document).on('click', '.admin-remove-speaker', function() {
                $(this).closest('.admin-speaker-row').remove();
            })
        });
    </script>
@endpush