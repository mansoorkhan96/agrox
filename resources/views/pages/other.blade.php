@extends('layouts.main')

@section('content')
<div class="section pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center section-title mtn-2">Know about your device battery and your current position</h3>
                <div class="organik-seperator mb-9 center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <div class="about-content-title">
                        <h4>Battery</h4>
                        <div class="about-content-title-line"></div>
                    </div>
                    <div class="about-content-text">
                        <p id="battery-charging">Battery charging? </p>
                        <p id="battery-level">Battery level: </p>
                        <p id="battery-charging-time">Battery charging time: </p>
                        <p id="battery-discharging-time">Battery discharging time: </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="">
                    <div class="about-content-title">
                        <h4>GeoLocation</h4>
                        <div class="about-content-title-line"></div>
                    </div>
                    <div class="about-content-text">
                        <p id="battery-charging">Battery charging? </p>
                        <p id="battery-level">Battery level: </p>
                        <p id="battery-charging-time">Battery charging time: </p>
                        <p id="battery-discharging-time">Battery discharging time: </p>
                    </div>
                </div>
            </div>
            

            
        </div>

        <div class="row p-5 text-center">
            <button id = "find-me">Show my location</button><br/>
            <p id = "status"></p>
            <a id = "map-link" target="_blank"></a>
        </div>
    </div>
</div>
@endsection

@section('page_script')
    <script>
        navigator.getBattery().then(function(battery) {
            function updateAllBatteryInfo(){
                updateChargeInfo();
                updateLevelInfo();
                updateChargingInfo();
                updateDischargingInfo();
            }
            updateAllBatteryInfo();

            battery.addEventListener('chargingchange', function(){
                updateChargeInfo();
            });
            function updateChargeInfo(){
                $('#battery-charging').text("Battery charging? "
                            + (battery.charging ? "Yes" : "No"));
            }

            battery.addEventListener('levelchange', function(){
                updateLevelInfo();
            });
            function updateLevelInfo(){
                $('#battery-level').text("Battery level: "
                            + battery.level * 100 + "%");
            }

            battery.addEventListener('chargingtimechange', function(){
                updateChargingInfo();
            });
            function updateChargingInfo(){
                $('#battery-charging-time').text("Battery charging time: "
                            + battery.chargingTime + " seconds");
            }

            battery.addEventListener('dischargingtimechange', function(){
                updateDischargingInfo();
            });
            function updateDischargingInfo(){
                $('#battery-discharging-time').text("Battery discharging time: "
                            + battery.dischargingTime + " seconds");
            }

        });




        function geoFindMe() {

            const status = document.querySelector('#status');
            const mapLink = document.querySelector('#map-link');

            mapLink.href = '';
            mapLink.textContent = '';

            function success(position) {
                const latitude  = position.coords.latitude;
                const longitude = position.coords.longitude;

                status.textContent = '';
                mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
                mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
            }

            function error() {
                status.textContent = 'Unable to retrieve your location';
            }

            if (!navigator.geolocation) {
                status.textContent = 'Geolocation is not supported by your browser';
            } else {
                status.textContent = 'Locating…';
                navigator.geolocation.getCurrentPosition(success, error);
            }

        }

        document.querySelector('#find-me').addEventListener('click', geoFindMe);
    </script>
@endsection