<?php

namespace App\Charts;

use App\Models\Komplain;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KompalinChartBar
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = [
            Komplain::whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 7)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 8)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 9)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 10)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 11)->whereYear('created_at', date('Y'))->count(),
            Komplain::whereMonth('created_at', 12)->whereYear('created_at', date('Y'))->count(),
        ];
        $label = [
            'Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desemeber'
        ];
        return $this->chart->barChart()
            ->addData('Jumlah Kompalin', $data)
            ->setXAxis($label);
    }
}
