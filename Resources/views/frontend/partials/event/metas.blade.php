<meta name="description" content="{{$event->summary}}">
<!-- Schema.org para Google+ -->
<meta itemprop="name" content="{{$event->title}}">
<meta itemprop="description" content="{{$event->summary}}">
<meta itemprop="image" content=" {{url($event->mainimage->path) }}">
<!-- Open Graph para Facebook-->
<meta property="og:title" content="{{$event->title}}"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="{{$event->url}}"/>
<meta property="og:image" content="{{url($event->mainimage->path)}}"/>
<meta property="og:description" content="{{$event->summary}}"/>
<meta property="og:site_name" content="{{Setting::get('core::site-name') }}"/>
<meta property="og:locale" content="{{config('asgard.iblog.config.oglocale')}}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ Setting::get('core::site-name') }}">
<meta name="twitter:title" content="{{$event->title}}">
<meta name="twitter:description" content="{{$event->summary}}">
<meta name="twitter:creator" content="{{Setting::get('iblog::twitter') }}">
<meta name="twitter:image:src" content="{{url($event->mainimage->path)}}">