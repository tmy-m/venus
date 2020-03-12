@extends('layouts.main')
@section('content')

<style>
    #map{
        height: 50%;
    }
</style>
<div class="contact-area d-flex align-items-center">

        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfdeAj_ZQHD6keeLCQ4dT451grV7-nKMI&callback=initMap"
        async defer></script>

    <div class="contact-info">
        <h2>How to Find Us</h2>

        <div class="contact-address mt-50">
            <p><span>address:</span> Khu phố 6, phường Linh Trung, quận Thủ Đức, thành phố Hồ Chí Minh</p>
            <p><span>telephone:</span> +84 38 4729 818</p>
            <p><span>facebook:</span><a href="#">venus</a></p>
            <p><span>instagram:</span><a href="#">venus.studio</a></p>
            <p><a href="mailto:venus@gmail.com">venus@gmail.com</a></p>

        </div>
    </div>

</div>

@endsection