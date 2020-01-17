@extends('layouts.master')

@section('meta')
    @include('ievent::frontend.partials.event.metas')
@stop

@section('title')
    {{ $event->title }} | @parent
@stop

@section('content')

<div class="events events-single events-single-{{$category->slug}} events-single-{{$category->id}}">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-9 column1">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="event-img">
                            <img class="image img-responsive" src="{{$event->mainimage->path}}"
                                 alt="{{$event->title}}"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="content col-xs-12 col-sm-10 ">
                        <h2>{{ $event->title }}</h2>
                        {!! $event->description !!}
                    </div>

                    <div class="content col-xs-12 col-sm-10">
                       
                        @include('ievent::frontend.gallery.viewline')
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="share-box">
                            <span>Compartir:</span>
                            <div class="share-box-wrap">
                                <div class="share-box">
                                    <ul class="social-share">
                                        <li class="facebook_share">
                                            <a onclick="window.open('http://www.facebook.com/sharer.php?u={{$event->url }}','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+'')">
                                                <div class="share-item-icon"><i class="fa fa-facebook "
                                                                                title="Facebook"></i></div>
                                            </a>
                                        </li>
                                        <li class="twitter_share">
                                            <a onclick="window.open('http://twitter.com/share?url={{ $event->url }}','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+'')">
                                                <div class="share-item-icon"><i class="fa fa-twitter "
                                                                                title="Twitter"></i></div>
                                            </a>
                                        </li>
                                        <li class="gplus_share">
                                            <a onclick="window.open('https://plus.google.com/share?url={{ $event->url }}','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+'')">
                                                <div class="share-item-icon"><i class="fa fa-google-plus "
                                                                                title="Google Plus"></i></div>
                                            </a>
                                        </li>
                                        <li class="pinterest_share">
                                            <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                                                <div class="share-item-icon"><i class="fa fa-pinterest "
                                                                                title="Pinterest"></i></div>
                                            </a>
                                        </li>
                                        <li class="linkedin_share">
                                            <a onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $event->url }}','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+'')">
                                                <div class="share-item-icon"><i class="fa fa-linkedin "
                                                                                title="Linkedin"></i></div>
                                            </a>
                                        </li>
                                        <li class="whatsapp_share">
                                            <!-- WhatsApp Share Button-->
                                            <a href="whatsapp://send?text={{$event->url}}"
                                               data-action="share/whatsapp/share">
                                                <div class="share-item-icon"><span class="fa-stack"><i
                                                                class="fa fa-square fa-stack-2x"></i><i
                                                                class="fa fa-whatsapp fa-stack-1x"></i></span></div>
                                            </a>
                                            <!-- /WhatsApp Share Button  -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="facebook-comments">
                    <div class="fb-comments"
                         data-href="{{url($event->url)}}"
                         data-numposts="5" data-width="100%">
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-3 column2">
                <div class="sidebar-revista">
                    <div class="cate">
                        <h3>Categorias</h3>

                        <div class="listado-cat">
                            <ul>
                                @php
                                    $categories = ievent_get_categories();
                                    $uri = trans('ievent::common.uri').'/';
                                @endphp

                                @if(isset($categories))
                                    @foreach($categories as $index=>$category)
                                        <li><a href="{{url($uri.$category->slug)}}">{{$category->title}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
   
@stop

@section('scripts')
    @parent
    @include('ievent::frontend.partials.event.script')
@stop