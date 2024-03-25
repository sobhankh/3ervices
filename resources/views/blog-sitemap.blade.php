@php  echo '<?xml version="1.0" encoding="UTF-8" ?>'; @endphp
<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>
    @foreach($blogs as $page)
        <url>
            <loc>{{ route('home.blog',[$page['slug'],$page['id']]) }}</loc>
            <lastmod>{{ date('Y-m-d', time()); }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>