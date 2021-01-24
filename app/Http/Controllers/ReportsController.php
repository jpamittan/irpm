<?php

namespace App\Http\Controllers;

use Auth, DB;
use Illuminate\Http\Request;
use App\Models\SubmissionLocation;

class ReportsController extends Controller
{
    public function map(string $connection): ?object
    {
        try {
            $submissionLocations = DB::connection($connection)
                ->table('submission_locations as sl')
                ->select([
                    'sl.submissions_id',
                    'tr.latitude',
                    'tr.longitude',
                    'tr.state',
                    'tr.city',
                    'tr.zip',
                    'sl.county'
                ])
                ->rightJoin('territory as tr', 'tr.zip', '=', 'sl.zip')
                ->whereRaw("sl.state != ''")
                ->orWhereNotNull('sl.state');
            $locationCounts = DB::connection($connection)
                ->table(DB::raw("({$submissionLocations->toSql()}) as t1"))
                ->select([
                    'latitude',
                    'longitude',
                    'state',
                    'city',
                    'zip',
                    DB::raw('COUNT(*) as total')
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
