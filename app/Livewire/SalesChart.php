<?php

namespace App\Livewire;

use Livewire\Component;

class SalesChart extends Component
{
    public $salesData = [];
    public $year;
    public $category;

    public function mount()
    {
        $this->year = date('Y');
        $this->category = 'all';
        $this->updateChartData();
    }

    public function updateChartData()
    {
        $data = [
            '2023' => [
                'all'         => [100, 150, 80, 200, 170, 90],
                'electronics' => [120, 130, 110, 180, 150, 100],
                'clothing'    => [90, 160, 70, 220, 180, 85],
            ],
            '2024' => [
                'all'         => [130, 140, 90, 210, 160, 95],
                'electronics' => [140, 120, 100, 190, 140, 110],
                'clothing'    => [100, 170, 80, 230, 190, 90],
            ],
        ];

        $this->salesData = $data[$this->year][$this->category] ?? [];
        $this->dispatch('chartUpdated', salesData: $this->salesData);
    }

    public function render()
    {
        return view('livewire.sales-chart');
    }
}
