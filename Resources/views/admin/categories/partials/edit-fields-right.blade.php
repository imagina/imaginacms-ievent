@php
	$op = array('required' => 'required');

@endphp

<div class="row">

    <div class="col-xs-12 ">
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                    </button>
                </div>
                <div class="form-group">
                    <label>{{trans('ievent::categories.form.parent category')}}</label>
                </div>
            </div>
            <div class="box-body">
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0">-</option>
                    @foreach ($categories as $parent)
                        <option value="{{$parent->id}}" {{ old('parent_id', $parent->id) == $category->parent_id ? 'selected' : '' }}> {{$parent->title}}
                                    </option>
                    @endforeach
                </select><br>
            </div>
        </div>
    </div>

    <div class="col-xs-12 ">
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                </div>
                <div class="form-group">
                    <label>{{trans('ievent::categories.form.image')}}</label>
                </div>
            </div>
            <div class="box-body">
                <div class="tab-content">
                    @mediaSingle('mainimage',$category)
                </div>
            </div>
        </div>
    </div>
    
</div>