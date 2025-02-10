<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Map</title>

    <!-- لینک SDK نشان -->
    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>
    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>
<style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
        }
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
      
        <div 
            id="map" 
            style="height: 500px; width: 100%;"
            wire:ignore
        ></div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            const apiKey = @js($this->apiKey);
            const regionCounties = @js($this->regionCounties); // ارسال دادهها به JS
        
            const map = new L.Map("map", {
                key: apiKey,
                maptype: "neshan",
                center: [36.1474388, 49.2286013],
                zoom: 8,
            });
        
            // افزودن مارکرها برای هر شهرستان
            regionCounties.forEach(county => {
                L.marker([county.lat, county.lng])
                .bindPopup(`<b>${county.name}</b>`)
                .addTo(map);
            });
        });
        </script>
</body>
</html>