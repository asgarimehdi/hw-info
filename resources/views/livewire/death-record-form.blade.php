<div>
    <form wire:submit.prevent="submit">
        @csrf
    
        <div>
            <label for="location">مکان:</label>
            <input type="text" wire:model="location" id="location">
            @error('location') <span>{{ $message }}</span> @enderror
        </div>
    
        <div>
            <label for="death_date">تاریخ مرگ:</label>
            <input type="date" wire:model="death_date" id="death_date">
            @error('death_date') <span>{{ $message }}</span> @enderror
        </div>
    
        <div>
            <label for="cause_of_death">علت مرگ:</label>
            <input type="text" wire:model="cause_of_death" id="cause_of_death">
            @error('cause_of_death') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="lat">عرض جغرافیایی:</label>
            <input type="text" wire:model="lat" id="lat" readonly>
            @error('lat') <span>{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="lng">طول جغرافیایی:</label>
            <input type="text" wire:model="lng" id="lng" readonly>
            @error('lng') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">ثبت</button>
    
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
    
    <div id="map" wire:ignore></div>
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
            var marker;

map.on('click', function (e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    // نمایش مختصات در ورودی‌ها
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;

    // ارسال مختصات به Livewire
    @this.set('lat', lat);
    @this.set('lng', lng);

    // افزودن یا جابجایی مارکر
    if (marker) {
        marker.setLatLng([lat, lng]);
    } else {
        marker = L.marker([lat, lng]).addTo(map);
    }
});

           /*  // —— ۱. افزودن کلاستر مارکرها ——
            const markersCluster = L.markerClusterGroup({
                spiderfyOnMaxZoom: true,
                showCoverageOnHover: false
            }); */
     
         /*    regionCounties.forEach(county => {
                const marker = L.marker([county.lat, county.lng])
                .bindPopup(`<b>${county.name}</b>`);
    
                markersCluster.addLayer(marker);
            });
    
            map.addLayer(markersCluster);  */
    
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
</div>
