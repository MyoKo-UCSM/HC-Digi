<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">@if ($formMode === 'edit') Edit Home @else Create Home @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url('/admin/home')}}'"><i class="bi bi-x" aria-hidden="true"></i>
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-body content-body">   
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('banner_title') ? 'has-error' : ''}}">
                            {!! Form::label('banner_title', 'Banner Title', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('banner_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('banner_title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>    
                </div> 
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('banner_description') ? 'has-error' : ''}}">
                            {!! Form::label('banner_description', 'Banner Description', ['class' => 'control-label mb-3']) !!}
                            {!! Form::textarea('banner_description', null, ('' == 'required') ? ['class' => 'form-control editor h-100px', 'required' => 'required'] : ['class' => 'form-control editor h-100px']) !!}
                            {!! $errors->first('banner_description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>    
                </div> 
                <div class="row mt-4">
                    {{-- <div class="col-md-6">
                        <div class="form-group {{ $errors->has('next_conference') ? 'has-error' : ''}}">
                            {!! Form::label('next_conference', 'Next Conference', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('next_conference', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('next_conference', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>    --}}
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                            {!! Form::label('date', 'Date', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                            {!! Form::label('location', 'Location', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('location', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div> 
                {{-- <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                            {!! Form::label('location', 'Location', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('location', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>   
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                            {!! Form::label('time', 'Time', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>    
                </div>  --}}
                {{-- <div class="row mt-4"> <!-- second section -->
                    <div class="col-md-12">
                        <div class="accordion" id="second_section">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="second_section">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->section_two_content) && isset($home->section_two_content) || $errors->has('section_two_content')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#second_section_content" aria-expanded="true" aria-controls="second_section_content" style="padding: 1.1rem 1rem;">
                                        Second Section Content
                                    </button>
                                </h2>
                                <div id="second_section_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->section_two_content) && isset($home->section_two_content) || $errors->has('section_two_content')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#second_section">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('section_two_content') ? 'has-error' : ''}}">
                                                    {!! Form::label('section_two_content', 'Second Section Content', ['class' => 'control-label mb-3']) !!}
                                                    {!! Form::textarea('section_two_content', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('section_two_content', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-4"> <!-- welcome by chairman -->
                    <div class="col-md-12">
                        <div class="accordion" id="welcome_by_chairman">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="welcome_by_chairman">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->welcome_by_chairman) && isset($home->welcome_by_chairman) || $errors->has('welcome_by_chairman')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#welcome_by_chairman_content" aria-expanded="true" aria-controls="welcome_by_chairman_content" style="padding: 1.1rem 1rem;">
                                        Welcome By Chairman
                                    </button>
                                </h2>
                                <div id="welcome_by_chairman_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->welcome_by_chairman) && isset($home->welcome_by_chairman) || $errors->has('welcome_by_chairman')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#welcome_by_chairman">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('welcome_by_chairman') ? 'has-error' : ''}}">
                                                    {!! Form::label('welcome_by_chairman', 'Welcome By Chairman', ['class' => 'control-label mb-3']) !!}
                                                    {!! Form::textarea('welcome_by_chairman', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('welcome_by_chairman', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- our theme -->
                    <div class="col-md-12">
                        <div class="accordion" id="our_theme">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="our_theme">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->our_themes) && isset($home->our_themes['title'][0]) || isset($home->our_themes['description'][0]) || $errors->has('our_theme_title')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#our_theme_content" aria-expanded="true" aria-controls="our_theme_content" style="padding: 1.1rem 1rem;">
                                        Conference Theme
                                    </button>
                                </h2>
                                <div id="our_theme_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->our_themes) && isset($home->our_themes['title'][0]) || isset($home->our_themes['description'][0]) || $errors->has('our_theme_title')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#our_theme">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('our_themes') ? 'has-error' : ''}}">
                                                    <div class="row mb-4">
                                                        <div class="col-md-8">
                                                            {!! Form::label('our_theme', 'Conference Theme', ['class' => 'control-label pt-2']) !!}
                                                        </div>
                                                        <div class="col-md-4 text-end">
                                                            <button type="button" class="admin-add-our-theme btn btn-success btn-sm" style="background-color: #cc410da1">
                                                                <i class="bi bi-plus-circle"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-scroll h-300px">
                                                        {{-- /* start:our theme */ --}}
                                                        @include('admin.home._our_theme')
                                                        {{-- /* end:our theme */ --}}
                                                        <div class="admin-get-our-theme"></div>{{-- /* to get more our theme row */ --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- organized by -->
                    <div class="col-md-12">
                        <div class="accordion" id="organized_by">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="organized_by">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->organized_by) && isset($home->organized_by['image'][0]) || $errors->has('organized_by_image')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#organized_by_content" aria-expanded="true" aria-controls="organized_by_content" style="padding: 1.1rem 1rem;">
                                        Organized By
                                    </button>
                                </h2>
                                <div id="organized_by_content" class="accordion-collapse collapse  {{ (isset($home) && isset($home->organized_by) && isset($home->organized_by['image'][0]) || $errors->has('organized_by_image')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#organized_by">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('organized_by') ? 'has-error' : ''}}">
                                                    <div class="row mb-4">
                                                        <div class="col-md-8">
                                                            {!! Form::label('organized_by', 'Organized By', ['class' => 'control-label pt-2']) !!}
                                                        </div>
                                                        <div class="col-md-4 text-end">
                                                            <button type="button" class="admin-add-organized-by btn btn-success btn-sm" style="background-color: #cc410da1">
                                                                <i class="bi bi-plus-circle"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-scroll h-300px organized-row-container">
                                                        <input type="hidden" name="organized_by_row" id="#organized-by-row">
                                                        {{-- /* start:organized by */ --}}
                                                        @include('admin.home._organized_by')
                                                        {{-- /* end:organized by */ --}}
                                                        <div class="admin-get-organized-by"></div>
                                                        {{-- /* to get more organized by row */ --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- co organized by -->
                    <div class="col-md-12">
                        <div class="accordion" id="co_organized_by">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="co_organized_by">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->co_organized_by) && isset($home->co_organized_by['image'][0]) || $errors->has('co_organized_by_image')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#co_organized_by_content" aria-expanded="true" aria-controls="co_organized_by_content" style="padding: 1.1rem 1rem;">
                                        Co Organized By
                                    </button>
                                </h2>
                                <div id="co_organized_by_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->co_organized_by) && isset($home->co_organized_by['image'][0]) || $errors->has('co_organized_by_image')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#co_organized_by">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('co_organized_by') ? 'has-error' : ''}}">
                                                    <div class="row mb-4">
                                                        <div class="col-md-8">
                                                            {!! Form::label('co_organized_by', 'Co Organized By', ['class' => 'control-label pt-2']) !!}
                                                        </div>
                                                        <div class="col-md-4 text-end">
                                                            <button type="button" class="admin-add-co-organized-by btn btn-success btn-sm" style="background-color: #cc410da1">
                                                                <i class="bi bi-plus-circle"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-scroll h-300px co-organized-row-container">
                                                        <input type="hidden" name="co_organized_by_row" id="#co-organized-by-row">
                                                        {{-- /* start:co organized by */ --}}
                                                        @include('admin.home._co_organized_by')
                                                        {{-- /* end:co organized by */ --}}
                                                        <div class="admin-get-co-organized-by"></div>
                                                        {{-- /* to get more co organized by row */ --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- sponsored by -->
                    <div class="col-md-12">
                        <div class="accordion" id="sponsored_by">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sponsored_by">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->sponsored_by) && isset($home->sponsored_by['image'][0]) || $errors->has('sponsored_by_image')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#sponsored_by_content" aria-expanded="true" aria-controls="sponsored_by_content" style="padding: 1.1rem 1rem;">
                                        Sponsored By
                                    </button>
                                </h2>
                                <div id="sponsored_by_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->sponsored_by) && isset($home->sponsored_by['image'][0]) || $errors->has('sponsored_by_image')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#sponsored_by">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('sponsored_by') ? 'has-error' : ''}}">
                                                    <div class="row mb-4">
                                                        <div class="col-md-8">
                                                            {!! Form::label('sponsored_by', 'Sponsored By', ['class' => 'control-label pt-2']) !!}
                                                        </div>
                                                        <div class="col-md-4 text-end">
                                                            <button type="button" class="admin-add-sponsored-by btn btn-success btn-sm" style="background-color: #cc410da1">
                                                                <i class="bi bi-plus-circle"></i>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-scroll h-300px sponsored-row-container">
                                                        <input type="hidden" name="sponsored_by_row" id="#sponsored-by-row">
                                                        {{-- /* start:co organized by */ --}}
                                                        @include('admin.home._sponsored_by')
                                                        {{-- /* end:co organized by */ --}}
                                                        <div class="admin-get-sponsored-by"></div>
                                                        {{-- /* to get more co organized by row */ --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4"> <!-- key date for conference -->
                    <div class="col-md-12">
                        <div class="accordion" id="key_date">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="key_date">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->key_date_for_conference) && isset($home->key_date_for_conference) || $errors->has('key_date_for_conference')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#key_date_content" aria-expanded="true" aria-controls="key_date_content" style="padding: 1.1rem 1rem;">
                                        Key Date For Conference
                                    </button>
                                </h2>
                                <div id="key_date_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->key_date_for_conference) && isset($home->key_date_for_conference) || $errors->has('key_date_for_conference')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#key_date">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('key_date_for_conference') ? 'has-error' : ''}}">
                                                    {!! Form::label('key_date_for_conference', 'Key Date For Conference', ['class' => 'control-label mb-3']) !!}
                                                    {!! Form::textarea('key_date_for_conference', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('key_date_for_conference', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-4"> <!-- meet our speaker -->
                    <div class="col-md-12">
                        <div class="accordion" id="meet_our_speaker">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="meet_our_speaker">
                                    <button class="accordion-button fs-6 fw-bold {{ (isset($home) && isset($home->meet_our_speaker) && isset($home->meet_our_speaker) || $errors->has('meet_our_speaker')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#meet_our_speaker_content" aria-expanded="true" aria-controls="meet_our_speaker_content" style="padding: 1.1rem 1rem;">
                                        Meet Our Speaker
                                    </button>
                                </h2>
                                <div id="meet_our_speaker_content" class="accordion-collapse collapse {{ (isset($home) && isset($home->meet_our_speaker) && isset($home->meet_our_speaker) || $errors->has('meet_our_speaker')) ? 'show' : '' }}" aria-labelledby="penfolds" data-bs-parent="#meet_our_speaker">
                                    <div class="accordion-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4{{ $errors->has('meet_our_speaker') ? 'has-error' : ''}}">
                                                    {!! Form::label('meet_our_speaker', 'Meet Our Speaker', ['class' => 'control-label mb-3']) !!}
                                                    {!! Form::textarea('meet_our_speaker', null, ('' == 'required') ? ['class' => 'form-control editor', 'required' => 'required'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('meet_our_speaker', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">Search Engine Optimization</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('meta_title') ? 'has-error' : ''}}">
                                    {!! Form::label('meta_title', 'Meta title', ['class' => 'control-label mb-3 required']) !!}
                                    {!! Form::text('meta_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('meta_description') ? 'has-error' : ''}}">
                                    {!! Form::label('meta_description','Meta Description', ['class' => 'control-label mb-3 required']) !!}
                                    {!! Form::textarea('meta_description', null, ('' == 'required') ? ['class' => 'form-control h-150px', 'required' => 'required'] : ['class' => 'form-control h-150px']) !!}
                                    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body pt-0">
                            <div class="list-title mb-3">
                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                    <span style="color: #B5B5C3">Image Size (1200 x 630)px</span>
                                </label>
                            </div>
                            <div class="panel-block">
                                <div class="form-group">
                                <div id="holder-meta-image">
                                        @if(!empty($home->meta_image))
                                            <div class='lfmimage-container meta-imagelfmc0'>
                                                <img src="{{ asset($home->meta_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                                <div>
                                                    <button type="button" onclick="removeImage('meta-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                                        <i class='bi bi-trash'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                </div>
                                <div class="input-group mt-3">
                                    <span class="input-group-btn">
                                        <a id="lfm-meta-image" data-input="meta-image" data-preview="holder-meta-image" class="btn btn-primary text-white">
                                            <i class="bi bi-image-fill"></i>Choose
                                        </a>
                                    </span>
                                    <input id="meta-image" class="form-control" type="text" name="meta_image" value="{{isset($home) ? $home->meta_image : ''}}">
                                </div>  
                                {!! $errors->first('meta_image', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    {!! Form::label('meta_image_alt', 'Meta Image Alt', ['class' => 'control-label mb-3']) !!}
                                    {!! Form::text('meta_image_alt', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('meta_image_alt', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
    <div class="col-md-4">
        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size ( 1920 x 300 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-banner-image">
                            @if(!empty($home->banner_image))
                                <div class='lfmimage-container banner-imagelfmc0'>
                                    <img src="{{ asset($home->banner_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <button type="button" onclick="removeImage('banner-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-banner-image" data-input="banner-image" data-preview="holder-banner-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="banner-image" class="form-control" type="text" name="banner_image" value="{{ isset($home->banner_image) ? $home->banner_image : '' }}">
                        </div> 
                        {!! $errors->first('banner_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {!! Form::label('banner_image_alt', 'Banner Image Alt', ['class' => 'control-label mb-3']) !!}
                        {!! Form::text('banner_image_alt', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('banner_image_alt', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Section Two Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size ( 1920 x 300 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-section-two-image">
                            @if(!empty($home->section_two_image))
                                <div class='lfmimage-container section-two-imagelfmc0'>
                                    <img src="{{ asset($home->section_two_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <button type="button" onclick="removeImage('section-two-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-section-two-image" data-input="section-two-image" data-preview="holder-section-two-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="section-two-image" class="form-control" type="text" name="section_two_image" value="{{ isset($home->section_two_image) ? $home->section_two_image : '' }}">
                        </div> 
                        {!! $errors->first('section_two_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {!! Form::label('section_two_image_alt', 'Section Two Image Alt', ['class' => 'control-label mb-3']) !!}
                        {!! Form::text('section_two_image_alt', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('section_two_image_alt', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Video</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Video</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-gift-image">
                            @if(!empty($home->gift_image))
                                <div class='lfmimage-container gift-imagelfmc0'>
                                    <video src="{{ asset($home->gift_image) }}" class='lfmimage w-100' style="height: 20rem;" controls><source src="{{ asset($home->gift_image) }}"></video>
                                    <button type="button" onclick="removeImage('gift-image',0)" class="btn btn-icon btn-active-light-danger btn btn-danger w-40px h-40px remove-image w-100" style="position: absolute; top: 150px; right: 50px;">
                                        <i class='bi bi-trash'></i>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('backend/cityU/images/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-gift-image" data-input="gift-image" data-ptype="video" data-preview="holder-gift-image" class="btn btn-primary text-white">
                                    <i class="bi bi-image-fill"></i>Choose
                                </a>
                            </span>
                            <input id="gift-image" class="form-control" type="text" name="gift_image" value="{{ isset($home->gift_image) ? $home->gift_image : '' }}">
                        </div> 
                            {!! $errors->first('gift_image', '<p class="help-block">:message</p>') !!} 
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Plenary SPEAKERS​</h3>
                <div class="card-toolbar">
                    <button type="button" class="admin-add-speaker btn btn-success btn-sm" style="background-color: #cc410da1">
                        <i class="bi bi-plus-circle"></i>Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="overflow-scroll h-600px speaker-row-container">
                    <input type="hidden" name="speaker_row" id="#speaker-row">
                    {{-- /* start:speaker */ --}}
                    @include('admin.home._speaker')
                    {{-- /* end:speaker */ --}}
                    <div class="admin-get-speaker"></div>
                    {{-- /* to get more speaker row */ --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#lfm-banner-image').filemanager('file');
    $('#lfm-gift-image').filemanager('file');
    $('#lfm-meta-image').filemanager('file');
    $('#lfm-organized-by-image').filemanager('file');
    $('#lfm-co-organized-by-image').filemanager('file');
    $('#lfm-sponsored-by-image').filemanager('file');
    $('#lfm-speaker-image').filemanager('file');
    $('#lfm-section-two-image').filemanager('file');
</script>
@endpush
