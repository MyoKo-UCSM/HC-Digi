<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">@if ($formMode === 'edit') Edit @else Create @endif Role </h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save 
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm cancel" onclick="window.location='{{ url('/admin/role')}}'"><i class="bi bi-x"aria-hidden="true"></i> 
                        Cancel 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('title',  'Title', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                
                <label class="mt-4">Permissions</label>
                <div class="row-cols-xl-4 g-5 g-xl-9 mt-4{{ $errors->has('name') ? ' has-error' : ''}}" style="overflow: scroll; height: 450px; border: 1px solid #eceac9;">
                    <table class="table table-stripped table-hover">
                        @foreach($permissions as $permission)
                        {{-- {{ dd(in_array($permission->name, $role->permissions->pluck('name')->toArray()), $role->permissions->pluck('name'), $permission->name) }} --}}
                            @if(isset($permission->parent_id) && $permission->parent_id == 0)
                                <tr class="parent" style="background-color: #e7eaec;">
                                    <td class="p-5">
                                        <strong style="text-align: center;">{{ $permission->title }}</strong>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input check-all" id="check-all">
                                    </td>
                                </tr>
                            @else
                                <tr class="child">
                                    <td class="ps-12">
                                        {{ $permission->title }}
                                    </td>
                                    <td>
                                        @if($formMode === 'edit')
                                            <input class="form-check-input"  type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->name, $role->permissions->pluck('name')->toArray() ) ? 'checked' : '' }}>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var $checkAll = $(".check-all");
    $checkAll.click(function(e){
        var $children = $(this).parents('tr').nextUntil('tr.parent');
        var $input = $children.find('input');
        $input.prop('checked', this.checked);
    });

    $(".parent").each(function(i, $parent) {
        var $childrenOfParent = $($parent).nextUntil('tr.parent');
        $childrenOfParent.click(function() {
            var totalCount   = $childrenOfParent.length;
            var checkedCount = $childrenOfParent.filter(function(count,$child){

                return $($child).find('input').prop('checked');
            }).length;
            $($parent).find('input').prop('checked',totalCount === checkedCount);
        });
    });
</script>
@endpush