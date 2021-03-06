<!DOCTYPE html>
<html>

<head>
    <title>Places Search Box</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1FomHh4hLrZSXK0wdDLTy3w4CeBowG3U&callback=initAutocomplete&libraries=places&v=weekly" defer></script>
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 25px;
            font-weight: 300;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 30%;
            margin-top: 20%;
            margin-left: 10%;
            border-radius: 20px;
            border-color: #03B898;
            border: 3px solid;

        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }

        .all {
            height: 100%;
            width: 100%;
        }

        .top {
            width: 100%;
            height: 90%;
        }

        .bot {
            width: 100%;
            height: 10%;
        }

        .first {
            float: left;
            width: 33.3%;
            height: 100%;
        }

        .second {
            float: left;
            width: 33.3%;
            height: 100%;
        }

        .third {
            float: left;
            width: 33.3%;
            height: 100%;
        }

        .profile {
            width: 100%;
            height: 100%;
            text-align: center;
            margin-top: 10%;
        }

        .add-point {
            width: 100%;
            height: 100%;
            text-align: center;
            margin-top: 10%;

        }

        .list {
            width: 100%;
            height: 100%;
            text-align: center;
            margin-top: 10%;

        }

        button {
            background: transparent;
            border: none;
        }
    </style>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 10,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
    </script>
</head>

<body>
    <input id="pac-input" class="controls" type="text" placeholder="Search ..." />
    <div class="all">
        <div class="top">

            <div id="map"></div>
        </div>
        <div class="bot">
            <div class="first">
                <div class="list">
                    <button type="button" class="btn btn-primary">
                        <a href="menu.php">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="120" viewBox="0 0 65 65">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            fill: #03b898;
                                        }

                                        .cls-3 {
                                            filter: url(#Rectangle_110);
                                        }
                                    </style>
                                    <filter id="Rectangle_110" x="0" y="0" width="65" height="65" filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha" />
                                        <feGaussianBlur stdDeviation="3" result="blur" />
                                        <feFlood flood-opacity="0.161" />
                                        <feComposite operator="in" in2="blur" />
                                        <feComposite in="SourceGraphic" />
                                    </filter>
                                </defs>
                                <g id="Menu" transform="translate(9 6.38)">
                                    <g class="cls-3" transform="matrix(1, 0, 0, 1, -9, -6.38)">
                                        <rect id="Rectangle_110-2" data-name="Rectangle 110" class="cls-1" width="47" height="47" rx="10" transform="translate(9 6)" />
                                    </g>
                                    <path id="Tracé_1" data-name="Tracé 1" class="cls-2" d="M28.531,12.588H5.545A1.153,1.153,0,0,1,4.5,11.357h0a1.153,1.153,0,0,1,1.045-1.232H28.531a1.153,1.153,0,0,1,1.045,1.232h0A1.153,1.153,0,0,1,28.531,12.588Z" transform="translate(6.562 3.308)" />
                                    <path id="Tracé_2" data-name="Tracé 2" class="cls-2" d="M28.531,19.338H5.545A1.153,1.153,0,0,1,4.5,18.107h0a1.153,1.153,0,0,1,1.045-1.232H28.531a1.153,1.153,0,0,1,1.045,1.232h0A1.153,1.153,0,0,1,28.531,19.338Z" transform="translate(6.562 4.96)" />
                                    <path id="Tracé_3" data-name="Tracé 3" class="cls-2" d="M28.531,26.088H5.545A1.153,1.153,0,0,1,4.5,24.857h0a1.153,1.153,0,0,1,1.045-1.232H28.531a1.153,1.153,0,0,1,1.045,1.232h0A1.153,1.153,0,0,1,28.531,26.088Z" transform="translate(6.562 6.611)" />
                                </g>
                            </svg>
                        </a>
                    </button>
                </div>
            </div>
            <div class="second">
                <div class="add-point">
                    <button type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="120" viewBox="0 0 65 65">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill: #03b898;
                                    }

                                    .cls-3 {
                                        filter: url(#Rectangle_111);
                                    }
                                </style>
                                <filter id="Rectangle_111" x="0" y="0" width="65" height="65" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g id="Pin" transform="translate(9 6.38)">
                                <g class="cls-3" transform="matrix(1, 0, 0, 1, -9, -6.38)">
                                    <rect id="Rectangle_111-2" data-name="Rectangle 111" class="cls-1" width="47" height="47" rx="10" transform="translate(9 6)" />
                                </g>
                                <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(12.643 10.272)">
                                    <path id="Tracé_836" data-name="Tracé 836" class="cls-2" d="M25.834,12.167c0,8.3-10.667,15.408-10.667,15.408S4.5,20.464,4.5,12.167a10.667,10.667,0,1,1,21.334,0Z" transform="translate(-4.5 -1.5)" />
                                    <path id="Tracé_837" data-name="Tracé 837" class="cls-2" d="M20.611,14.056A3.556,3.556,0,1,1,17.056,10.5,3.556,3.556,0,0,1,20.611,14.056Z" transform="translate(-6.389 -3.389)" />
                                </g>
                            </g>
                        </svg> </button>
                </div>
            </div>
            <div class="third">
                <div class="profile">
                    <button type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="120" viewBox="0 0 65 65">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill: #03b898;
                                    }

                                    .cls-3 {
                                        filter: url(#Rectangle_110);
                                    }
                                </style>
                                <filter id="Rectangle_110" x="0" y="0" width="65" height="65" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g id="Profile" transform="translate(9 6.38)">
                                <g class="cls-3" transform="matrix(1, 0, 0, 1, -9, -6.38)">
                                    <rect id="Rectangle_110-2" data-name="Rectangle 110" class="cls-1" width="47" height="47" rx="10" transform="translate(9 6)" />
                                </g>
                                <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" class="cls-2" d="M13.846,15.577A7.789,7.789,0,1,0,6.058,7.789,7.791,7.791,0,0,0,13.846,15.577Zm6.923,1.731h-2.98a9.415,9.415,0,0,1-7.886,0H6.923A6.923,6.923,0,0,0,0,24.231V25.1a2.6,2.6,0,0,0,2.6,2.6H25.1a2.6,2.6,0,0,0,2.6-2.6v-.865A6.923,6.923,0,0,0,20.77,17.308Z" transform="translate(9.407 9.427)" />
                            </g>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>