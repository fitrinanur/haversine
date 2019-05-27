@extends('layouts.master')

@section('content')
@push('styles')
<style>
    .gallery {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    -webkit-column-width: 33%;
    -moz-column-width: 33%;
    column-width: 33%; }
    .gallery .pics {
    -webkit-transition: all 350ms ease;
    transition: all 350ms ease; }
    .gallery .animation {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1); }
    .btn.filter {
    margin-top: 10px;
    background-color: #4FB99F;
    border: 1px solid #fff;
    color: #fff;
    }
    .btn.filter:hover {
        background-color: #45a089;
    }
    
    @media (max-width: 450px) {
    .gallery {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    -webkit-column-width: 100%;
    -moz-column-width: 100%;
    column-width: 100%;
    }
    }
    
    @media (max-width: 400px) {
    .btn.filter {
        padding-left: 1.1rem;
        padding-right: 1.1rem;
        
    }
    }
    
</style>
@endpush
<div class="container">
    <!-- Grid row -->
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-12 d-flex justify-content-center mb-5">
            <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="all">All</button>
            @foreach ($attractionTypes as $attractionType)
                <button type="button" class="btn btn-outline-black waves-effect filter" data-rel="{{ $attractionType->name}}">{{ $attractionType->name}}</button>
            @endforeach
        </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->
    <!-- Grid row -->
    <div class="gallery" id="gallery">
        <!-- Grid column -->
        @foreach ($attractions as $attraction)
            @foreach($attraction->pictures as $picture)
            <div class="mb-3 pics animation all {{ $attraction->attractionType->name }}">
                <img class="img-fluid" src="{{ $picture->path()}}" alt="Card image cap">
            </div>
            @endforeach
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->
</div>
@stop
@push('javascript')
<script type="application/javascript">
    $(document).ready(function ($) {
        $(function ($) {
            var selectedClass = "";
            $(".filter").click(function () {
                selectedClass = $(this).attr("data-rel");
                jQuery("#gallery").fadeTo(100, 0.1);
                jQuery("#gallery div").not("." + selectedClass).fadeOut().removeClass(
                    'animation');
                setTimeout(function () {
                    jQuery("." + selectedClass).fadeIn().addClass('animation');
                    jQuery("#gallery").fadeTo(300, 1);
                }, 300);
            });
        });
    });

</script>
@endpush
