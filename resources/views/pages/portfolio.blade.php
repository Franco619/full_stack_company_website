@extends('layouts.masters_home')
@section('home_content')

<section id="portfolio" class="portfolio">
<div class="container">


<div class="row portfolio-container" data-aos="fade-up">
 @foreach ($images as $item)
 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
    <img src="{{ $item->image }}" class="img-fluid" alt="">
    <div class="portfolio-info">
    <h4>App 1</h4>
    <p>App</p>
    <a href="{{ $item->image }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
    </div>
    </div> 
 @endforeach



</div>

</div>
</section>






@endsection