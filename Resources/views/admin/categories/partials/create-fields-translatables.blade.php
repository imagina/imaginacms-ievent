@php
	$op = array('required' => 'required');
@endphp

<div class="box-body">

{!! Form::i18nInput('title',trans('ievent::common.form.title'), $errors,$lang,null,$op) !!}
{!! Form::i18nTextarea('description', trans('ievent::common.form.description'),$errors,$lang,null) !!} 
</div>