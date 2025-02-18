<?php

namespace App\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\LineChartModel;

class ChartExample extends Component
{
    public function render()
    {
        // ایجاد یک نمونه از مدل چارت خطی
        $lineChartModel = (new LineChartModel())
            ->setTitle('نمودار نمونه')
            ->setAnimated(true)         // افزودن انیمیشن
            ->setSmoothCurve();         // نمایش منحنی صاف

        // اضافه کردن نقاط داده به چارت (مثال ساده)
        $lineChartModel->addPoint('فروردین', 100, '#f6ad55')
                       ->addPoint('اردیبهشت', 150, '#f6ad55')
                       ->addPoint('خرداد', 200, '#f6ad55');

        return view('livewire.chart-example', [
            'lineChartModel' => $lineChartModel,
        ]);
    }
}
