@php
	$op = array('required' => 'required');
@endphp

<div class="box-body">

	<div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('ievent::categories.form.title')) !!}
        <?php $old = $category->hasTranslation($lang) ? $category->translate($lang)->title : '' ?>
        {!! Form::text("{$lang}[title]", old("{$lang}.title", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ievent::categories.form.title')]) !!}
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
	</div>

	<div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
	    {!! Form::label("{$lang}[slug]", trans('ievent::categories.form.slug')) !!}
	    <?php $old = $category->hasTranslation($lang) ? $category->translate($lang)->slug : '' ?>
	    {!! Form::text("{$lang}[slug]", old("{$lang}.slug",$old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('ievent::categories.form.slug')]) !!}
	    {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
	</div>

	{!! Form::i18nTextarea('description', trans('ievent::common.form.description'),$errors,$lang,$category) !!} 

</div>