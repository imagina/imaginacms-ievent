@php
	$op = array('required' => 'required');
@endphp

<div class="box-body">

	{!! Form::i18nInput('title',trans('ievent::common.form.title'), $errors,$lang,null,$op) !!}

	{!! Form::i18nTextarea('summary', trans('ievent::common.form.summary'),$errors,$lang,null,array('class'=>'form-control','rows'=>2)) !!} 

	{!! Form::i18nTextarea('description', trans('ievent::common.form.description'),$errors,$lang,null) !!}

	 <div class="col-xs-12" style="padding-top: 35px;">
        <div class="panel box box-primary">
            <div class="box-header">
                <div class="box-tools pull-right">
                    <a href="#aditional{{$lang}}" class="btn btn-box-tool " data-target="#aditional{{$lang}}"
                       data-toggle="collapse"><i class="fa fa-minus"></i>
                    </a>
                </div>
                <label>{{ trans('ievent::common.form.metadata')}}</label>
            </div>
            <div class="panel-collapse collapse" id="aditional{{$lang}}">
                <div class="box-body">
                    <div class='form-group{{ $errors->has("{$lang}.meta_title") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_title]", trans('ievent::common.form.meta_title')) !!}
                        {!! Form::text("{$lang}[meta_title]", old("{$lang}.meta_title"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ievent::common.form.meta_title')]) !!}
                        {!! $errors->first("{$lang}.meta_title", '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class='form-group{{ $errors->has("{$lang}.meta_keywords") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_keywords]", trans('ievent::common.form.meta_keywords')) !!}
                        {!! Form::text("{$lang}[meta_keywords]", old("{$lang}.meta_keywords"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ievent::common.form.meta_keywords')]) !!}
                        {!! $errors->first("{$lang}.meta_keywords", '<span class="help-block">:message</span>') !!}
                    </div>

                    @editor('meta_description', trans('ievent::common.form.meta_description'),
                    old("{$lang}.meta_description"), $lang)
                </div>
            </div>
        </div>
    </div>


</div>