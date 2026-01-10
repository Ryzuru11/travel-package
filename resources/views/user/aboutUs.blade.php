{{-- in layouts folder, mainStructure file has user navigation bar and footer --}}
@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row">
            {{-- team image --}}
            <div class="col">
                <img src="{{ asset('image/about-page-image/maszurok.png') }}" alt="Team image">
            </div>
            {{-- team discription --}}
            <div class="col mt-2">
                <h2 class="mb-5 fw-bold">OUR STORY</h2>
                <div class="text-justify lh-lg">
                    <p >At Dilaga Tour, we are committed to bringing you the finest beauty and charm of the best travel destinations.
                        As a trusted travel agency, we specialize in crafting personalized itineraries that deliver truly memorable vacation experiences.
                        With deep local knowledge and years of experience in the travel industry, we take pride in offering unique journeys that allow you to enjoy rich cultural heritage, breathtaking natural landscapes, and a variety of captivating destinations filled with stories.
                        Whether you’re looking for a relaxing beach getaway, an exciting nature adventure, or a meaningful cultural exploration, Dilaga Tour is ready to turn your travel dreams into reality.
                        Trust your vacation to Dilaga Tour, and enjoy an extraordinary experience at every step of your journey.
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- close container --}}
    <br>

        {{-- more details section --}}
        <div class="mt-5 d-flex justify-content-around ">
            <div>
                <img src="{{ asset('image/help-tools/img1About.svg') }}" class="ms-5" alt="1 YEARS EXPERIENCES logo">
                <h5>1 YEARS EXPERIENCES</h5>
                
                    <p class="mt-3 lh-base">
                        Discover Dilaga Tour’s wonders <br>
                        with our 5 years’ expertise. <br>
                        Memorable journeys tailored <br>
                        to your preferences await.
                    </p>
            </div>
            <div>
                <img src="{{ asset('image/help-tools/img2About.svg') }}" class="ms-5" alt="ACCOMMODATION ADVICE logo">
                <h5>ACCOMMODATION ADVICE</h5>

                <p class="mt-3 lh-base">
                    Find your perfect stay in Dilaga Tour. Expert <br>
                    advice on accommodations to make your <br>
                    trip unforgettable.
                </p>

            </div>
            <div>
                <img src="{{ asset('image/help-tools/img3About.svg') }}" class="ms-5" alt="MAP logo">
                <h5>MOST COMPLETED MAP</h5>

                <p class="mt-3 lh-base">
                    Explore confidently with our complete <br>
                    map. Discover hidden gems and plan <br>
                    your adventures effortlessly.
                </p>

            </div>
            <div>
                <img src="{{ asset('image/help-tools/img4About.svg') }}" class="ms-5" alt="TRANSPORT logo">
                <h5 class="ms-5">TRANSPORT</h5>

                <p class="mt-3 lh-base">
                    Choose from our reliable transport options <br>
                    and enjoy convenient journeys to your <br>
                    desired destinations.
                </p>

            </div>
        </div>

        {{-- WHY CHOOSE US? section --}}
        <div>
            <img src="{{ asset('image/help-tools/for-about-section-Img.svg') }}" class="image-position" width="99.5%" alt="BG image">
            <div class="container">
                <div class="text-position text-justify lh-lg">
                    <h2 class="fw-bold mb-4">WHY CHOOSE US?</h2>
                    <p>
                        At Dilaga tour Tours, we are your trusted travel partner for exploring <br>
                        the wonders of Dilaga tour. With our extensive experience and local expertise, <br>
                        we offer personalized itineraries and seamless travel experiences tailored to <br>
                        your preferences. Our dedicated team of professionals is committed to providing <br>
                        exceptional service, ensuring your journey is filled with unforgettable moments. <br>
                        From cultural heritage sites to pristine beaches, lush tea plantations to thrilling <br>
                        wildlife encounters, we strive to showcase the best of Dilaga Tour. Choose <br>
                        Dilaga tour Tours for a truly immersive and memorable travel experience in the<br>
                        jewel of the Indian Ocean.
                    </p>
                </div>
            </div>
        </div>
        
@endsection