<div class="container-fluid">
    <div>
    <!-- لیست کشویی برای انتخاب ماه -->
    <select wire:model.live="selectedMonth" class="form-control" style="width: 200px; margin-bottom: 20px;">
        @foreach($data as $month => $value)
            <option value="{{ $month }}">{{ $month }}</option>
        @endforeach
    </select>

    <!-- کانتینر نمودار -->
    <div wire:ignore>
    <div id="precipitation-chart" style="min-height: 400px;"></div>
</div>

</div>

    

<!-- افزودن Highcharts از طریق CDN -->
                <script src="https://code.highcharts.com/highcharts.js"></script>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', function () {
        let chart = Highcharts.chart('precipitation-chart', {
            chart: { type: 'column' },
            title: { text: 'بارش ماهانه ۲۰۲۴' },
            xAxis: { categories: Object.keys(@json($data)), title: { text: 'ماه' } },
            yAxis: { title: { text: 'مقدار بارش' } },
            series: [{ name: 'بارش', data: Object.values(@json($data)) }]
        });

        Livewire.on('monthChanged', (event) => {
            console.log('رویداد دریافت شد:', event);
            const month = event.month;
            const index = chart.xAxis[0].categories.indexOf(month);
            if (index !== -1) {
                chart.series[0].data.forEach(function(point, i) {
                    point.update({ color: i === index ? '#FF0000' : null });
                });
            }
        });
    });
</script>
@endpush

    <h3 class="mb-4 text-center">داشبورد گزارشات مرگ</h3>
    <form wire:submit.prevent="applyFilters" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <x-persian-datepicker 
                         wirePropertyName="from_date"   {{-- نام متغیر Livewire که تاریخ در آن ثبت می‌شود --}}
                         label=" از تاریخ "                {{-- برچسب فیلد --}}
                         showFormat="jYYYY/jMM/jDD"       {{-- قالب نمایش تاریخ به صورت شمسی --}}
                         returnFormat="YYYY-MM-DD"         {{-- قالب خروجی برای ذخیره در دیتابیس --}}
                         :required="true"/>
                {{-- <input type="date" wire:model="from_date" class="form-control"> --}}
            </div>
            <div class="col-md-4">
                <x-persian-datepicker 
                wirePropertyName="to_date"   {{-- نام متغیر Livewire که تاریخ در آن ثبت می‌شود --}}
                label=" تا تاریخ "                {{-- برچسب فیلد --}}
                showFormat="jYYYY/jMM/jDD"       {{-- قالب نمایش تاریخ به صورت شمسی --}}
                returnFormat="YYYY-MM-DD"         {{-- قالب خروجی برای ذخیره در دیتابیس --}}
                :required="true"/>
                {{-- <input type="date" wire:model="to_date" class="form-control"> --}}
            </div>
            <div class="col-md-4">
                <label>علت مرگ:</label>
                <select wire:model.lazy="filter_cause" class="form-control">
                    <option value="">همه</option>
                    @foreach($causes as $cause)
                        <option value="{{ $cause->name }}">{{ $cause->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-secondary mt-2">اعمال فیلتر</button> --}}
    </form>
    
    <div class="row">
        <!-- کارت تعداد کل مرگ‌ها -->
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">تعداد کل مرگ‌ها</h5>
                    <p class="card-text display-4">{{ $totalDeaths }}</p>
                </div>
            </div>
        </div>
        <!-- کارت تفکیک علت مرگ -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    مرگ‌ها به تفکیک علت
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($deathsByCause as $cause => $count)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $cause }}
                            <span class="badge bg-primary rounded-pill">{{ $count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- کارت سوم: تعداد مرگ‌های امروز (در صورت تعریف شدن) -->
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">مرگ‌های امروز</h5>
                    <p class="card-text display-4">
                        {{ $todayDeaths ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
<div class="h-96">
    <livewire:livewire-pie-chart :pie-chart-model="$pieChartModel" wire:key="pie-chart-{{ now() }}" />
</div>

<div class="h-96">
    <livewire:livewire-line-chart :line-chart-model="$lineChartModel" wire:key="line-chart-{{ now() }}" />
</div>

<div class="h-96">
    <livewire:livewire-column-chart :column-chart-model="$columnChartModel" wire:key="column-chart-{{ now() }}" />
</div>

        
    
    
</div>




