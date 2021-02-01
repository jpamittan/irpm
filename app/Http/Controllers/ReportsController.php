<?php

namespace App\Http\Controllers;

use Auth, DB;
use Illuminate\Http\Request;
use App\Models\SubmissionLocation;

class ReportsController extends Controller
{
    public function line(string $connection): ?object
    {
        try {
            $mon = app('request')->input('month');
            $yr = app('request')->input('year');
            if (in_array($mon, ['04', '06', '09', '11'])) {
                $day = 30;
            } else if ($mon == '02') {
                $day = 28;
            } else {
                $day = 31;
            }
            $submissionPerDay = DB::connection($connection)
                ->table('submission_mods')
                ->select([
                    'id',
                    'submissions_id',
                    'outcome_type_id',
                    DB::Raw('SUBSTRING(CONVERT(VARCHAR(11), created_at, 101), 0, 11) AS created_at')
                ])
                ->whereNotNull('outcome_type_id')
                ->whereRaw("created_at BETWEEN '".$yr."-".$mon."-01 00:00:01' AND '".$yr."-".$mon."-".$day." 23:59:59'");
            $submissionPerDayCounts = DB::connection($connection)
                ->table(DB::raw("({$submissionPerDay->toSql()}) AS t1"))
                ->select([
                    'outcome_type_id',
                    'created_at',
                    DB::raw('SUBSTRING(created_at, 1, 2) AS month'),
                    DB::raw('SUBSTRING(created_at, 4, 2) AS day'),
                    DB::raw('SUBSTRING(created_at, 7, 4) AS year'),
                    DB::raw('COUNT(*) AS total')
                ])
                ->groupBy([
                    'outcome_type_id',
                    'created_at'
                ])
                ->orderBy('created_at')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return $submissionPerDayCounts;
    }

    public function bar(string $connection): ?object
    {
        try {
            $submissionPerDay = DB::connection($connection)
                ->table('submission_mods')
                ->select([
                    'id',
                    'submissions_id',
                    'outcome_type_id',
                    DB::Raw('SUBSTRING(CONVERT(VARCHAR(11), created_at, 101), 0, 11) AS created_at')
                ])
                ->whereNotNull('outcome_type_id')
                ->whereRaw("created_at BETWEEN '2020-01-01 00:00:01' AND '2020-12-31 23:59:59'");
            $submissionPerMonthCounts = DB::connection($connection)
                ->table(DB::raw("({$submissionPerDay->toSql()}) AS t1"))
                ->select([
                    'outcome_type_id',
                    'created_at',
                    DB::raw('SUBSTRING(created_at, 1, 2) AS month'),
                    DB::raw('SUBSTRING(created_at, 4, 2) AS day'),
                    DB::raw('SUBSTRING(created_at, 7, 4) AS year'),
                    DB::raw('COUNT(*) AS total')
                ])
                ->groupBy([
                    'outcome_type_id',
                    'created_at'
                ])
                ->orderBy('created_at')
                ->get();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return $submissionPerMonthCounts;
    }
    
    public function map(string $connection): ?object
    {
        try {
            $submissionLocations = DB::connection($connection)
                ->table('submission_locations AS sl')
                ->select([
                    'sl.submissions_id',
                    'tr.latitude',
                    'tr.longitude',
                    'tr.state',
                    'tr.city',
                    'tr.zip',
                    'sl.county'
                ])
                ->rightJoin('territory AS tr', 'tr.zip', '=', 'sl.zip')
                ->whereRaw("sl.state != ''")
                ->orWhereNotNull('sl.state');
            $locationCounts = DB::connection($connection)
                ->table(DB::raw("({$submissionLocations->toSql()}) AS t1"))
                ->select([
                    'latitude',
                    'longitude',
                    'state',
                    'city',
                    'zip',
                    DB::raw('COUNT(*) AS total')
                ])
                ->groupBy([
                    'latitude',
                    'longitude',
                    'state',
                    'city',
                    'zip'
                ])
                ->get();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return $locationCounts;
    }
}
