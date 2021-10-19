<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Logs;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VicePresChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $datas = Logs::select(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "views"')
        )->where('department_id', auth()->user()->vice_pres->id)
            ->groupBy('date')
            ->get();

        foreach ($datas as $index => $data) {

            $label[$index] = Carbon::parse($data['date'])->format('d M Y');
            $values[$index] = $data['views'];
        }

        return Chartisan::build()
            ->labels($label)
            ->dataset('date', $values)
            ->extra(['#ECC94B', '#4299E1']);
    }
}
