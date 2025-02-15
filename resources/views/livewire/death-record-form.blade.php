<div class="container-fluid mt-3">
    <div class="row">
        <!-- بخش گزارش گیری سمت چپ -->
        <div class="col-md-3 bg-white p-3 shadow-sm rounded">
            <h5 class="text-center">📊 گزارش‌گیری</h5>
            <hr>
            <p>................................</p>
        </div>

        <!-- بخش نقشه در وسط -->
        <div class="col-md-6">
            <div id="map" wire:ignore></div>

        </div>

        <!-- بخش فرم سمت راست -->
        <div class="col-md-3 bg-white p-3 shadow-sm rounded">
            <h5 class="text-center">📌 ثبت اطلاعات فوت</h5>
            <hr>
            <form wire:submit.prevent="submit">
                @csrf

                <!-- فیلد کد ملی -->
                <div class="mb-2">
                    <label for="national_id" class="form-label">کد ملی متوفی:</label>
                    <input type="text" wire:model="national_id" id="national_id" class="form-control">
                    @error('national_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                

                <!-- انتخاب علت مرگ از جدول -->
                <div class="mb-2">
                    <label for="cause_of_death">علت مرگ:</label>
                    <select wire:model="cause_of_death" id="cause_of_death" class="form-control">
                        <option value="">انتخاب کنید</option>
                        @foreach($causes as $cause)
                            <option value="{{ $cause->name }}">{{ $cause->name }}</option>
                        @endforeach
                    </select>
                    @error('cause_of_death') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- تاریخ فوت (به زودی شمسی می‌کنیم) -->
                <div class="mb-2">
                    <label for="death_date">تاریخ فوت:</label>
                    <input type="date" wire:model="death_date" id="death_date" class="form-control">
                    @error('death_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <input type="hidden" wire:model="lat">
                <input type="hidden" wire:model="lng">
                <div class="mb-2">
                    <label for="lat_display">عرض جغرافیایی:</label>
            <input type="text" id="lat_display" value="{{ $lat }}" readonly class="form-control">
                    @error('lat') <span>{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-2">
                    <label for="lng_display">طول جغرافیایی:</label>
                    <input type="text" id="lng_display" value="{{ $lng }}" readonly class="form-control">
                    @error('lng') <span>{{ $message }}</span> @enderror
                </div>
                <!-- توضیحات -->
                <div class="mb-2">
                    <label for="description">توضیحات:</label>
                    <textarea wire:model="description" id="description" class="form-control"></textarea>
                </div>

                <!-- دکمه ثبت -->
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

                <!-- نمایش پیام موفقیت -->
                @if (session()->has('message'))
                    <div class="alert alert-success mt-2">{{ session('message') }}</div>
                @endif
            </form>
        </div>
    </div>
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
            var marker;
        var boundary = @json($boundary); // مختصات محدوده

        if (boundary) {
            var polygon = L.polygon(boundary, {color: 'red'}).addTo(map);
            map.fitBounds(polygon.getBounds()); // نمایش کامل محدوده
        }

        function isPointInsidePolygon(point, polygon) {
            var inside = false;
            var x = point[0], y = point[1];

            for (var i = 0, j = polygon.length - 1; i < polygon.length; j = i++) {
                var xi = polygon[i][0], yi = polygon[i][1];
                var xj = polygon[j][0], yj = polygon[j][1];

                var intersect = ((yi > y) !== (yj > y)) &&
                    (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
                if (intersect) inside = !inside;
            }
            return inside;
        }

        map.on('click', function (e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    if (boundary && !isPointInsidePolygon([lat, lng], boundary)) {
        alert("محل انتخاب‌شده خارج از محدوده مجاز است!");
        return;
    }

    document.getElementById('lat_display').value = lat;
    document.getElementById('lng_display').value = lng;

    // مقدار `lat` و `lng` را در Livewire به‌روز کن
    @this.set('lat', lat);
    @this.set('lng', lng);


    if (marker) {
        marker.setLatLng([lat, lng]);
    } else {
        marker = L.marker([lat, lng]).addTo(map);
    }
});


          
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
        
</div>   
  
