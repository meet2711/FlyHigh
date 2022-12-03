<!DOCTYPE html>

<head>
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Other CSS -->
    <link rel="stylesheet" href="../resources/css/index.css">
    <link rel="stylesheet" href="../resources/css/footer.css">
    <!--Review CSS -->
    <link rel="stylesheet" href="../resources/css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
    <!-- Font awesome symbols -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>Fly High</title>
</head>

<body>

    @include('header')

    <div id="outerWrap"><img src="../resources/images/Hero (1).png" alt="" width="100%" height="600px"></div>
    <div id="layer1">
        <div>
            <i class="fa fa-plane" aria-hidden="true" style="margin-left: 20px;"></i>
            <select class="home_type" id="trip_type" onchange="myfunction()" style="margin-top: 12px;border: 0px;">
                <option selected value="1">Round Trip</option>
                <option value="2">Single Trip</option>
            </select>
            <i class="fa fa-tags" aria-hidden="true" style="margin-left: 20px;"></i>
            <select class="home_class" style="margin-top: 12px;border: 0px;">
                <option value="1">Economy</option>
                <option selected value="2">Business Class</option>
            </select>
            <div style="--bs-gutter-y: -1rem;--bs-gutter-x: 0rem;margin-left: 1rem;margin-top: 16px;margin-right: 1rem;">

                <form style="display: flex; justify-content:space-between " method="POST" action="flights">
                    @csrf
                    <div>
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">From</label>
                        <div style="display: flex;">
                            <i class="fa fa-plane-departure form_icon"></i>
                            <div>
                                <input type="text" name="arrival" class="form-input" placeholder="From where?" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div style="display: flex;">
                            <i class="fa-solid fa-plane-arrival form_icon"></i>
                            <div>
                                <input type="text" id="abc" name="departure" class="form-input" placeholder="Where to?" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" class="form-input" id="datefield" name="arrival_date" placeholder="Departure: &nbsp" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    </div>
                    <div>
                        <div id="optional-field">
                            <div>
                                <input type="text" class="form-input" id="datefield1" name="departure_date" placeholder="Return: &nbsp" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div style="display: flex;">
                            <div>
                                <i class="fa fa-minus form_icon" aria-hidden="true" onclick="passengerSub()" style="padding-right: 5px;"></i>
                                <input type="number" id="pnum" class="form-input" name="adults" placeholder="No of Adults" required>
                            </div>
                            <i class="fa fa-plus form_icon" aria-hidden="true" onclick="passengerAdd()" style="padding-left: 5px;"></i>
                        </div>
                    </div>
                    <div>
                        <!-- <a href="public/flights"> -->
                        <button type="submit" class="home_search_button">Search</button>
                        <!-- </a> -->
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="home_flight_deals">
        <p>Find your next adventure with these <span class="bold">flight deals</span><span class="all">All <i class='fa fa-arrow-right' style="color:#6E7491;"></i></span></p>
    </div>
    <div class="places">
        <div class="card-group">
            <div class="card ">
                <img src="../resources/images/image1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">The Bund, <span class="bold">Shanghai</span></span><span class="price">$598</span></h5>
                    </h5>
                    <p class="card-text">China's most international city</p>
                </div>
            </div>
            <div class="card">
                <img src="../resources/images/image2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Sydney Opera House, <span class="bold">Sydney</span><span class="price">$981</span></h5>
                    <p class="card-text">Take a stroll along the famous harbor</p>
                </div>
            </div>
            <div class="card">
                <img src="../resources/images/image3.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kōdaiji Temple, <span class="bold">Kyoto</span><span class="price">$633</span></h5>
                    <p class="card-text">Step back in time in the Gion district</p>
                </div>
            </div>
        </div>
        <div class="card-group">

            <div class="card mb-3 ">
                <img src="../resources/images/image4.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tsavo East National Park, <span class="bold">Kenya</span><span class="price">$1,248</span></h5>
                    <p class="card-text">Named after the Tsavo River, and opened in April 1984, Tsavo East National Park
                        is one of the oldest parks in Kenya. It
                        is located in the semi-arid Taru Desert.</p>
                </div>
            </div>
        </div>
    </div>
    <div style="color: #6E7491; padding: 0px 15px;">
        <p>Explore unique <span class="bold">places to stay</span><span class="all">All <i class='fa fa-arrow-right'></i></span></p>
    </div>


    <div class="places">
        <div class="card-group">
            <div class="card ">
                <img src="../resources/images/image5.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Stay among the atolls in <span class="bold">Maldives</span></span>
                    </h5>
                    </h5>
                    <p class="card-text">From the 2nd century AD, the islands were known as the 'Money Isles' due to the
                        abundance of cowry shells, a currency of
                        the early ages.</p>
                </div>
            </div>
            <div class="card ">
                <img src="../resources/images/image6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Experience the Ourika Valley in <span class="bold">Morocco</span>
                    </h5>
                    <p class="card-text">Morocco’s Hispano-Moorish architecture blends influences from Berber culture,
                        Spain, and contemporary artistic currents
                        in the Middle East.</p>
                </div>
            </div>
            <div class="card ">
                <img src="../resources/images/image7.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Live traditionally in <span class="bold">Mongolia</span></h5>
                    <p class="card-text">Traditional Mongolian yurts consists of an angled latticework of wood or bamboo
                        for walls, ribs, and a wheel.</p>
                </div>
            </div>
        </div>
        <div class="card-group" id="hide" style="display:none ;">
            <div class="card ">
                <img src="../resources/images/image5.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Stay among the atolls in <span class="bold">Maldives</span></span>
                    </h5>
                    </h5>
                    <p class="card-text">From the 2nd century AD, the islands were known as the 'Money Isles' due to the
                        abundance of cowry shells, a currency of
                        the early ages.</p>
                </div>
            </div>
            <div class="card ">
                <img src="../resources/images/image6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Experience the Ourika Valley in <span class="bold">Morocco</span>
                    </h5>
                    <p class="card-text">Morocco’s Hispano-Moorish architecture blends influences from Berber culture,
                        Spain, and contemporary artistic currents
                        in the Middle East.</p>
                </div>
            </div>
            <div class="card ">
                <img src="../resources/images/image7.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Live traditionally in <span class="bold">Mongolia</span></h5>
                    <p class="card-text">Traditional Mongolian yurts consists of an angled latticework of wood or bamboo
                        for walls, ribs, and a wheel.</p>
                </div>
            </div>
        </div>
    </div>
    <div style="display: grid;justify-content: center;align-items: center;padding: 10px;">
        <button class="btn btn-primary mx-auto" type="submit" id="explore-btn" style="background-color:#1DB4FF ;
        " onclick="showmore()">Explore more stays</button>
    </div>
    <div style="display: grid;justify-content: center;align-items: center;color: #6E7491;" class="home_reviews">
        <p>What <span class="bold" style="color:#1DB4FF ;">FlyHigh</span> users are saying</p>
    </div>
    @include('review')
    <!-- Footer -->
    @include('footer')
    <!--Date field JS-->
    <!-- <script src="../resources/js/date.js"></script> -->
    <!-- Review Js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="../resources/js/review.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="../resources/js/homepage.js"></script>
<!-- <script src="../resources/js/main.js"></script> -->

</html>