<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DeathRecord;
use App\Models\CauseOfDeath;
use Carbon\Carbon;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;

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
        if (!empty($this->filter_cause)) {
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
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['from_date', 'to_date', 'filter_cause'])) {
            $this->applyFilters();
        }
    }

    public function render()
    {
        // ساخت مدل نمودار پای بر اساس داده‌های deathsByCause
        $pieChartModel = (new PieChartModel())
            ->setAnimated(true)
            // ->setLegendVisibility(false) // حذف لیبل‌های زیر نمودار
            ->withDataLabels(true) // نمایش مقدار روی نمودار
            ->setTitle('آمار علت‌های مرگ');

        // اضافه کردن داده‌ها به نمودار
        foreach ($this->deathsByCause as $cause => $count) {
            $pieChartModel->addSlice($cause, $count, '#' . dechex(rand(0xAAAAAA, 0xFFFFFF)));
        }

        // ایجاد مدل نمودار خطی بدون عنوان (عنوان خالی) و با نمایش مقادیر روی نمودار
        $lineChartModel = (new LineChartModel())
            ->setAnimated(true)
            ->setSmoothCurve()
            ->withDataLabels(true)
            ->setTitle(''); // حذف عنوان

        // اضافه کردن داده‌ها: هر نقطه نمایانگر یک علت مرگ به همراه تعداد آن
        foreach ($this->deathsByCause as $cause => $count) {
            $lineChartModel->addPoint($cause, $count, '#f6ad55'); // رنگ قابل تغییر است
        }


        // ایجاد مدل نمودار ستونی بدون عنوان و با نمایش مقادیر روی نمودار
        $columnChartModel = (new ColumnChartModel())
            ->setAnimated(true)
            ->withDataLabels(true)
            ->setTitle(''); // حذف عنوان

        // اضافه کردن ستون‌ها: هر ستون نمایانگر یک علت مرگ است
        foreach ($this->deathsByCause as $cause => $count) {
            $columnChartModel->addColumn($cause, $count, '#68d391'); // رنگ دلخواه
        }

        return view('livewire.death-dashboard', [
            'pieChartModel' => $pieChartModel,
            'lineChartModel' => $lineChartModel,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}