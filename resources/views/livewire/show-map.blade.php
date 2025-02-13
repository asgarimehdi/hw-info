


    @push('map')

        <script src="{{ asset('js/map/neshan.js') }}" defer></script>
        <script src="{{ asset('js/map/turf.min.js') }}" defer></script>
        <script src="{{ asset('js/map/leaflet.markercluster.js') }}" defer></script>

        <script>
            document.addEventListener('livewire:init', () => {
                const apiKey = @js($this->apiKey);
                const regionCounties = @js($this->regionCounties);

                // بررسی وجود داده
                if (!regionCounties || regionCounties.length === 0) {
                    console.error("داده‌ای برای نمایش وجود ندارد!");
                    return;
                }

                // ایجاد نقشه
                const map = new L.Map("map", {
                    key: apiKey,
                    maptype: "neshan",
                    center: [36.1474388, 49.2286013],
                    zoom: 8
                });

                // —— ۱. افزودن کلاستر مارکرها ——
                const markersCluster = L.markerClusterGroup({
                    spiderfyOnMaxZoom: true,
                    showCoverageOnHover: false
                });

                regionCounties.forEach(county => {
                    const marker = L.marker([county.lat, county.lng])
                        .bindPopup(`<b>${county.name}</b>`);

                    markersCluster.addLayer(marker);
                });

                map.addLayer(markersCluster);

                /*  // افزودن مارکرها برای هر شهرستان
                 regionCounties.forEach(county => {
                        L.marker([county.lat, county.lng])
                        .bindPopup(`<b>${county.name}</b>`)
                        .addTo(map);
                    }); */

                /*       // —— ۲. ترسیم خطوط ——
                  const coordinates = regionCounties.map(c => [c.lng, c.lat]);
                  const lineString = turf.lineString(coordinates);

                  L.geoJSON(lineString, {
                      style: { color: '#ff0000', weight: 3 }
                  }).addTo(map); */

            });
        </script>
        <link rel="stylesheet" href="{{ asset('css/map/neshan.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/map/MarkerCluster.css') }}"/>

        <style>
            #map { height: 100vh; width: 100%; }
        </style>
    @endpush
{{--    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>--}}
{{--    <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>--}}


    <div id="map" wire:ignore></div>



