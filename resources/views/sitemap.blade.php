   @php  echo '<?xml version="1.0" encoding="UTF-8" ?>'; @endphp
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        @foreach($Service as $page)
            <url>
                <loc>{{ route('home.city',[$page['name_service_slug'],$page['id']]) }}</loc>
                <lastmod>{{ date('Y-m-d', time());}}</lastmod>

            </url>
        @endforeach
    </urlset>