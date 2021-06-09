@extends('layouts.app')

@section('head')
<!-- CSSMap STYLESHEET - POLAND -->
<link rel="stylesheet" type="text/css" href="cssmap-poland/cssmap-poland.css" media="screen" />
<!-- CSSMap SCRIPT -->
<script type="text/javascript" src="https://cssmapsplugin.com/5/jquery.cssmap.min.js"></script>
@endsection

@section('content')
    <!-- CSSMap - Poland -->
<div id="map-poland">
    <ul class="poland">
        @foreach ($voivodships as $voivodship)  
            <li class="pl{{ $loop->iteration }}"><a href="{{ route('voivodship.index', $voivodship->name) }}">{{$voivodship->name}}</a></li>
        @endforeach
    </ul>
   </div>
   <!-- END OF THE CSSMap - Poland -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
    
    // CSSMap;
    $("#map-poland").CSSMap({
      "size": 750,
      mapStyle: "vintage",
      tooltips: "visible"
    });
    // END OF THE CSSMap;
    
    });
    </script>
@endsection