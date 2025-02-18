<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DeathRecord;
use App\Models\CauseOfDeath;
use Carbon\Carbon;

class DeathDashboard extends Component
{
    public $totalDeaths;
    public $deathsByCause = [];
    public $todayDeaths;
    
    // فیلترها
    public $from_date;
    public $to_date;
    public $filter_cause;
    
    // لیست علل مرگ برای فیلتر (اختیاری)
    public $causes;

    public function mount()
    {
        // دریافت لیست علل مرگ (در صورت نیاز)
        $this->causes = CauseOfDeath::all();

        // محاسبه آمار اولیه بدون اعمال فیلترها
        $this->applyFilters();

        // محاسبه تعداد مرگ‌های امروز (برابر با تاریخ امروز)
        $this->todayDeaths = DeathRecord::whereDate('death_date', Carbon::today())->count();
    
    }

    /**
     * متدی برای اعمال فیلترها و به‌روزرسانی آمار
     */
    public function applyFilters()
    {
        $query = DeathRecord::query();

        if ($this->from_date) {
            $query->whereDate('death_date', '>=', $this->from_date);
        }
        if ($this->to_date) {
            $query->whereDate('death_date', '<=', $this->to_date);
        }
        if ($this->filter_cause) {
            $query->where('cause_of_death', $this->filter_cause);
        }

        // محاسبه تعداد کل رکوردها بر اساس فیلترها
        $this->totalDeaths = $query->count();

        // محاسبه تعداد رکوردها به تفکیک علت مرگ (با در نظر گرفتن فیلترهای تاریخ)
        $this->deathsByCause = DeathRecord::query()
            ->when($this->from_date, function ($q) {
                $q->whereDate('death_date', '>=', $this->from_date);
            })
            ->when($this->to_date, function ($q) {
                $q->whereDate('death_date', '<=', $this->to_date);
            })
            ->groupBy('cause_of_death')
            ->selectRaw('cause_of_death, count(*) as count')
            ->pluck('count', 'cause_of_death')
            ->toArray();
    }

    public function render()
    {
        
        return view('livewire.death-dashboard');
    }
}
