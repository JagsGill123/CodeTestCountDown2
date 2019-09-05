<?php

namespace App\Http\Controllers;

use App\CountDown;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CountDownController extends AbstractController
{
    /**
     * @var string
     */
    protected $label = 'Count Down';

    /**
     * @return Model|string
     */
    protected function getModel()
    {
        return (CountDown::class);
    }

    /**
     * @return array
     */
    protected function getValidationConfig()
    {
        return [
            'name' => 'required|max:255',
            'content' => 'required|max:255',
            'url' => 'required|url',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'priority' => 'required|numeric|min:1|max:100',
        ];
    }

    /**
     * Get active CountDown
     *
     * @param Request $request
     * @return Response
     */
    public function active(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();
        $query = DB::table('count_downs')
            ->where('endDate', '>=', $date)
            ->where('startDate', '<=', $date)
            ->orderBy('priority');

        $result = $query->first();
        return response()->json([
            'data' => $result ? [$result] : []
        ]);
    }
}
