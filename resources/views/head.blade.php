<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content= '{{ $metaDescription }}'>
<meta name="keywords" content='{{ $metaKeywords }}'>
<meta name="author" content='{{ $metaAuthor }}'>
<title>
{{ $siteName }}
</title>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />