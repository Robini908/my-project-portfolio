<!-- Contact Map Component -->
<div class="relative w-full h-full min-h-[300px] rounded-2xl overflow-hidden">
    <!-- Map Container -->
    <div id="map" class="w-full h-full min-h-[300px] rounded-2xl shadow-xl z-10"></div>

    <!-- Decorative Elements -->
    <div class="absolute -bottom-5 -right-5 w-32 h-32 bg-violet-500/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-2xl pointer-events-none"></div>

    <!-- Map Close Button - New Addition -->
    <div class="absolute top-4 left-4 z-20">
        <button id="close-map" class="group p-3 bg-slate-800/80 hover:bg-indigo-600 text-white rounded-lg shadow-lg transition-all duration-300 backdrop-blur-sm flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="text-sm font-medium">Back to Contact</span>
        </button>
    </div>

    <!-- Map Controls -->
    <div class="absolute top-4 right-4 z-20 flex flex-col space-y-2">
        <button id="map-directions" class="p-2 bg-indigo-600 text-white rounded-lg shadow-lg transition-transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
            </svg>
        </button>
        <button id="map-fullscreen" class="p-2 bg-indigo-600 text-white rounded-lg shadow-lg transition-transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5" />
            </svg>
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Initialize the map once the Google Maps API is loaded
    function initMap() {
        // Coordinates for Westlands, Nairobi
        const westlands = { lat: -1.2659, lng: 36.8039 };

        // Create a map centered on Westlands
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: westlands,
            mapId: 'b76c60ae4683bef1', // Custom map style - dark theme
            disableDefaultUI: true,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false,
        });

        // Create a marker for the specific location
        const marker = new google.maps.Marker({
            position: westlands,
            map: map,
            title: "Abraham's Office",
            animation: google.maps.Animation.DROP,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 10,
                fillColor: "#6d28d9",
                fillOpacity: 1,
                strokeColor: "#ffffff",
                strokeWeight: 2,
            }
        });

        // Add location info window
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div class="p-2">
                    <h3 class="font-bold text-gray-900">Abraham Opuba</h3>
                    <p class="text-gray-700">Westlands, Nairobi, Kenya</p>
                    <p class="text-sm text-indigo-600 mt-1">
                        <a href="https://www.google.com/maps/dir/?api=1&destination=-1.2659,36.8039" target="_blank" class="hover:underline">
                            Get Directions
                        </a>
                    </p>
                </div>
            `,
        });

        // Open info window when marker is clicked
        marker.addListener("click", () => {
            infoWindow.open({
                anchor: marker,
                map,
            });
        });

        // Initially open the info window
        infoWindow.open({
            anchor: marker,
            map,
        });

        // Add click handler for directions button
        document.getElementById('map-directions').addEventListener('click', function() {
            window.open(`https://www.google.com/maps/dir/?api=1&destination=-1.2659,36.8039`, '_blank');
        });

        // Add click handler for fullscreen button
        document.getElementById('map-fullscreen').addEventListener('click', function() {
            const mapDiv = document.getElementById('map');
            if (mapDiv.requestFullscreen) {
                mapDiv.requestFullscreen();
            } else if (mapDiv.webkitRequestFullscreen) {
                mapDiv.webkitRequestFullscreen();
            } else if (mapDiv.msRequestFullscreen) {
                mapDiv.msRequestFullscreen();
            }
        });
    }
</script>

<!-- Load the Google Maps JavaScript API with a callback to initMap -->
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
@endpush

<style>
    /* Add smooth transition for buttons */
    #map-directions, #map-fullscreen {
        transition: all 0.3s ease;
    }

    /* Hide Google attribution in a way that doesn't violate terms */
    #map .gmnoprint a, .gmnoprint span, .gm-style-cc {
        opacity: 0.7;
    }
</style>
