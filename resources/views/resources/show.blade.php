@extends('resources.publish')
@section('title')
    {!! $resource->router !!}
@endsection
@section('style')
    {!! $resource->css !!}
@endsection
@section('content')
   {!! $resource->html !!}
    
@endsection
@section('script')
    {!! $resource->script !!}
@endsection

{{-- 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ }} Resource</title>
</head>

<body>
    <h1>{{ $resource->router }} Resource</h1>

    <p>HTML: {!! !!}</p>
    <p>CSS: {!! !!}</p>
    <p>Script: {!! !!}</p>
    <p>Created By: {{ $resource->createBy }}</p>
</body>

</html> --}}
