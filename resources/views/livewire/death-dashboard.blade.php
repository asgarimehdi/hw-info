<div class="container-fluid">
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
                <select wire:model="filter_cause" class="form-control">
                    <option value="">همه</option>
                    @foreach($causes as $cause)
                        <option value="{{ $cause->name }}">{{ $cause->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mt-2">اعمال فیلتر</button>
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
    <div class="p-4 bg-white rounded shadow mb-4">
        <h2 class="text-2xl mb-4">آمار علت‌های مرگ</h2>
        <!-- تغییر ارتفاع از h-64 به h-96 یا اندازه دلخواه -->
        <div class="h-96">
            <livewire:livewire-pie-chart :pie-chart-model="$pieChartModel" />
        </div>
    </div> 
    <div class="p-4 bg-white rounded shadow mt-4">
        <h2 class="text-2xl mb-4">نمودار خطی علت‌های مرگ</h2>
        <!-- تغییر ارتفاع با کلاس‌های CSS (مثلاً Tailwind) -->
        <div class="h-96">
            <livewire:livewire-line-chart :line-chart-model="$lineChartModel" />
        </div>
    </div>
    <div class="p-4 bg-white rounded shadow mt-8">
        <h2 class="text-2xl mb-4">نمودار ستونی علت‌های مرگ</h2>
        <div class="h-96">
            <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
        </div>
    </div>
        
    
    
</div>




