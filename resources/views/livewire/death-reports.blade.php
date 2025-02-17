<div class="container-fluid">
    
    <div >
        <!-- کارت آمار کل مرگ‌ها -->
        <div class=" mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">تعداد کل مرگ‌ها</h5>
                    <p class="card-text display-4">{{ $totalDeaths }}</p>
                </div>
            </div>
        </div>
        <!-- کارت آمار بر اساس علت مرگ -->
        <div class="mb-3">
            <div class="card shadow-sm">
                <div class="card-header text-center">
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
    </div>
</div>
