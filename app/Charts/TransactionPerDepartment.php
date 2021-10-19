<?php

namespace App\Charts;

use App\Models\Logs;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionPerDepartment
{
    protected $chart;
    protected $values = [0];
    protected $label = [];

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($department_id): \ArielMejiaDev\LarapexCharts\LineChart
    {

        $datas =   Logs::select(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "views"')
        )->where('department_id', $department_id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('date')
            ->get();

        foreach ($datas as $index => $data) {

            $this->label[$index] = Carbon::parse($data['date'])->format('d M Y');
            $this->values[$index] = $data['views'];
        }
        // dd($this->values);
        return $this->chart->lineChart()
            ->setTitle('Transaction Made')
            ->setHeight(300)
            ->addData('Transaction Made', $this->values)
            ->setXAxis($this->label);
    }
}
