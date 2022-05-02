<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ItemsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Inventory Items Chart')
            ->setSubtitle('Remaining Items vs . Finished Items')
            ->addData([\App\Models\Inventory::where('remaining_quantity', '>', 0)->count(),
            \App\Models\Inventory::where('remaining_quantity', '=', 0)->count()
            ])
            ->setLabels(['Remaining Items', 'Finished Items'])
            ->setColors(['#2ccdc9', '#80effe'])
            ->setHeight(300);
    }
}
