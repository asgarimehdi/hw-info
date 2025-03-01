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
    public $selectedMonth = 'January';
    public $data = [
        'January'   => 50,
        'February'  => 40,
        'March'     => 60,
        'April'     => 55,
        'May'       => 70,
        'June'      => 65,
        'July'      => 80,
        'August'    => 75,
        'September' => 60,
        'October'   => 50,
        'November'  => 45,
        'December'  => 55,
    ];

    // در صورت نیاز به به‌روزرسانی یا محاسبه اطلاعات می‌توانید متدهای بیشتری اضافه کنید
    // public function updatedSelectedMonth()
    // {
    //     \Log::info('ماه انتخاب شد: ' . $this->selectedMonth);

    //     $this->dispatch('monthChanged', month: $this->selectedMonth, value: $this->data[$this->selectedMonth]);
    // }
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

        $this->totalDeaths = $query->count();

        $this->deathsByCause = $query
            ->groupBy('cause_of_death')
            ->selectRaw('cause_of_death, count(*) as count')
            ->pluck('count', 'cause_of_death')
            ->toArray();

        // حذف مواردی که مقدار نامعتبر دارند
        foreach ($this->deathsByCause as $cause => $count) {
            if (!is_numeric($count) || $count < 0 || is_null($count)) {
                unset($this->deathsByCause[$cause]); // حذف مقدار نامعتبر
            }
        }

        // اگر مقدار خالی بود، مقدار پیش‌فرض بده
        if (empty($this->deathsByCause)) {
            $this->deathsByCause = ['بدون داده' => 0];
        }
    }



    public function updated($propertyName)
    {
        \Log::info('ماه انتخاب شد: ' . $this->selectedMonth);

        $this->dispatch('monthChanged', month: $this->selectedMonth, value: $this->data[$this->selectedMonth]);

        \Log::info('پراپرتی تغییر کرد: ' . $propertyName);

        if (in_array($propertyName, ['from_date', 'to_date', 'filter_cause'])) {
            $this->applyFilters();
        }
      
    }

    public function render()
    {

        // اگر هیچ داده‌ای وجود نداشت، مقدار پیش‌فرض بده
        if (empty($this->deathsByCause)) {
            $this->deathsByCause = ['بدون داده' => 0];
        }

        // مدل نمودار پای
        $pieChartModel = (new PieChartModel())
            ->setAnimated(true)
            ->withDataLabels(true)
            ->setTitle('آمار علت‌های مرگ');

        foreach ($this->deathsByCause as $cause => $count) {
            if (!is_numeric($count) || $count < 0 || is_null($count)) {
                continue; // مقدار نامعتبر را رد کن
            }
            $pieChartModel->addSlice($cause, $count, '#' . dechex(rand(0xAAAAAA, 0xFFFFFF)));
        }

        // مدل نمودار خطی
        $lineChartModel = (new LineChartModel())
            ->setAnimated(true)
            ->setSmoothCurve()
            ->withDataLabels(true)
            ->setTitle('');

        foreach ($this->deathsByCause as $cause => $count) {
            if (!is_numeric($count) || $count < 0 || is_null($count)) {
                continue;
            }
            $lineChartModel->addPoint($cause, $count, '#f6ad55');
        }

        // مدل نمودار ستونی
        $columnChartModel = (new ColumnChartModel())
            ->setAnimated(true)
            ->withDataLabels(true)
            ->setTitle('');

        foreach ($this->deathsByCause as $cause => $count) {
            if (!is_numeric($count) || $count < 0 || is_null($count)) {
                continue;
            }
            $columnChartModel->addColumn($cause, $count, '#68d391');
        }

        return view('livewire.death-dashboard', [
            'pieChartModel' => $pieChartModel,
            'lineChartModel' => $lineChartModel,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}