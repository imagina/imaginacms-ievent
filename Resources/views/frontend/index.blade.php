@extends('layouts.master')

@section('meta')
    @include('ievent::frontend.partials.category.metas')
@stop
@section('title')
    {{$category->title}} | @parent
@stop
@section('content')
    
<div class="events events-index events-category-{{$category->id}}"> 
    <div class="container">

        <div class="row">
            
                <div class="category-title w-100 my-4">
                    <h1>{{$category->title}}</h1> 
                </div>

                <div class="category-description w-100 mb-2">
                    <p>{!! $category->description !!}</p>
                </div>
                
                @if (count($events))
                    @foreach($events as $event)
                       
                        <div class="event col-md-4 mb-4">

                            <div class="event-img">
                                <img src="{{$event->mainimage->path}}" alt="{{$event->title}}">
                            </div>
                           
                            <div class="event-body">
                                <h2 class="event-title">{{$event->title}}</h2>
                                <p class="event-text">{{$event->summary}}</p>
                                <a href="{{$event->url}}" class="btn btn-primary">{{trans('ievent::common.button.read more')}} &rarr;</a>
                            </div>

                            <div class="event text-muted">
                                    {{trans('ievent::common.Posted on')}} {{format_date($event->created_at,'%m %d, %G')}} {{trans('ievent::common.by')}}
                                    <a href="#">
                                        {{$event->user->present()->fullName()}}
                                    </a>
                            </div>

                        </div>

                    @endforeach

                    <!-- Pagination -->
                    <div class="pagination justify-content-center mb-4 pagination paginacion-event row">
                        <div class="pull-right">
                            {{$events->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                @else

                    <!-- Not found Events -->
                    <div class="msj-not-found">
                        <div class="white-box">
                            <h3>Ups... :(</h3>
                            <h1>404 Post no encontrado</h1>
                            <hr>
                            <p style="text-align: center;">No hemos podido encontrar el Contenido que estás
                                buscando.</p>
                        </div>
                    </div>

                @endif

            
        </div>

    </div>
</div>


@stop