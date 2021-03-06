<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/{{config('asgard.iblog.config.oglocale')}}/sdk.js#xfbml=1&version=v4.0&appId={!!Setting::get('iblog::id-facebook') !!}&autoLogAppEvents=1"></script>

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/{{config('asgard.iblog.config.oglocale')}}/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "BlogPosting",{{--NewsArticle--}}
	"@id":"{{$event->url}}",
	"mainEntityOfPage": {
		"@type": "WebPage",
		"@id": "{{$event->url}}"
	},
	"headline": "{{$event->title}}",
	"description": "{{$event->summary}}",
	"image": {
			"@type": "ImageObject",
			"url": "{{$event->mainImage->path}}"
		},
	"datePublished": "{{$event->created_at}}",
	"dateModified": "{{$event->updated_at}}",
	"articleBody":"{{$event->summary}}",
	"author": {
		"@type": "Person",
		"name": "{{$event->user->present()->fullName()}}"
	},
	"publisher": {
		"@type": "Organization",
		"name": "@setting('core::site-name')",
		"logo": {
			"@type": "ImageObject",
			"url": "@setting('isite::logo3')"
		}
	}
}
</script >
{{--
<script type="application/ld+json">
    {
        "publisher":{
            "name":"El Tiempo",
            "@type":"Organization",
            "logo":{
                "@type":"ImageObject",
                "url":"https:\/\/www.eltiempo.com\/bundles\/eltiempocms\/images\/el-tiempo\/logo-el-tiempo-azul.jpg",
                "width":600,
                "height":60
            }
        },
        "hasPart":{"@type":"WebPageElement","isAccessibleForFree":"true","cssSelector":".article"}}

</script>--}}