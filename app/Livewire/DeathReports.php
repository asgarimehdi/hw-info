<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DeathRecord;

class DeathReports extends Component
{
    public $totalDeaths;
    public $deathsByCause = [];

    public function mount()
    {
        // دریافت تعداد کل رکوردهای ثبت‌شده
        $this->totalDeaths = DeathRecord::count();

        // دریافت تعداد رکوردها به تفکیک علت مرگ
        $this->deathsByCause = DeathRecord::selectRaw('cause_of_death, count(*) as count')
                                ->groupBy('cause_of_death')
                                ->pluck('count', 'cause_of_death')
                                ->toArray();
    }

    public function render()
    {
        return view('livewire.death-reports');
    }
}
