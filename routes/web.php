<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Cutoff;
use App\Models\DseCutoff;

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('predictor');
});

Route::get('/predictor', function () {
    return view('predictor');
});

/*
|--------------------------------------------------------------------------
| College Search Page
|--------------------------------------------------------------------------
*/

Route::get('/college-search', function () {

    $feColleges = Cutoff::select('college_name')
        ->distinct()
        ->orderBy('college_name')
        ->pluck('college_name');

    $dseColleges = DseCutoff::select('college_name')
        ->distinct()
        ->orderBy('college_name')
        ->pluck('college_name');

    $colleges = $feColleges
        ->merge($dseColleges)
        ->unique()
        ->sort()
        ->values();

    return view('college-search', compact('colleges'));
});

/*
|--------------------------------------------------------------------------
| Predictor Results
|--------------------------------------------------------------------------
*/

Route::post('/results', function (Request $request) {

    $admissionType = $request->admission_type;
    $year = $request->year;
    $category = strtoupper($request->category);
    $percentile = $request->percentile;
    $branch = $request->branch;

    $query = ($admissionType === 'DSE')
        ? DseCutoff::query()
        : Cutoff::query();

    $query->where('year', $year)
          ->whereRaw('UPPER(category) = ?', [$category])
          ->where('percentile', '<=', $percentile);

    if (!empty($branch)) {
        $query->where('branch_name', 'LIKE', "%{$branch}%");
    }

    $colleges = $query
        ->orderByDesc('percentile')
        ->limit(50)
        ->get();

    return view('results', compact(
        'colleges',
        'percentile',
        'year',
        'category',
        'admissionType',
        'branch'
    ));
});

/*
|--------------------------------------------------------------------------
| College Cutoff Results
|--------------------------------------------------------------------------
*/

Route::post('/college-results', function (Request $request) {

    $admissionType = $request->admission_type;
    $year = $request->year;
    $collegeName = trim($request->college_name);

    $query = ($admissionType === 'DSE')
        ? DseCutoff::query()
        : Cutoff::query();

    $cutoffs = $query
        ->where('year', $year)
        ->where('college_name', 'LIKE', $collegeName)
        ->orderBy('branch_name')
        ->orderBy('category')
        ->get();

    return view('college-results', compact(
        'cutoffs',
        'collegeName',
        'year',
        'admissionType'
    ));
});