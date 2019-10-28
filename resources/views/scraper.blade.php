<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
      
        @php
        use Symfony\Component\DomCrawler\Crawler;
        $crawler = Goutte::request('GET', env('SIGMALIVE_SCRAPER_URL'));
      
        $crawler->filter('.article--column')->each(function (Crawler $node, $i) use (&$results,&$title) {
            $node->filter('.article--title')->each(function (Crawler $node) use (&$results,&$title) {
                $title = $node->text();
            });
            $node->filter('.article--img img')->each(function (Crawler $node) use (&$results,&$title) {
                
                $results[]= ['title' => $title , 'href' => env('SIGMALIVE_BASE_URL'). $node->attr('src')];
            });
        });

        $mylovelyJSON = json_encode($results);
        
        @endphp

        <style>
            .even {background-color: #fdfdfd;}
            .odd {background-color: #FFFFFF;}
            .even,.odd{margin-top: 25px;padding:20px}
        </style>
       
    </head>
    <body>
        <div id="main-container">

       
        </div>
        <script type="text/javascript"> 
            var mylovelyJSON = @json($mylovelyJSON, JSON_PRETTY_PRINT);
            mylovelyJSON = JSON.parse(mylovelyJSON);
            var html = ''; var i = 0;

            mylovelyJSON.forEach((item) => {
                i++;
                var cssClass = 'row ' +  (i % 2 == 0 ? 'even' : 'odd');
                // html += '<div class="title">$(item.title)</div><div class="img"><img src="$(item.title)"/></div>';
                 html += '<div class="'+ cssClass +'"><div class="title">' + item.title + '</div><div class="img"><img src="' + item.href + '"/></div></div>';
            });
            document.querySelector("#main-container").innerHTML = html;

        </script>
    </body>
</html>
