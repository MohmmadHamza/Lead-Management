<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\DomainClassType;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use App\Models\DomainClass;
use App\Models\Priority;

class CityFatch extends Controller
{
    public function getCities($stateId)
    {

        $cities = City::where('state_id', $stateId)->get();

        return response()->json($cities);
    }

    public function getDomainsAndPriorities($companyId)
{
    $domains = DomainClass::where('company_id', $companyId)->get(['id', 'name']);
    $priorities = Priority::where('company_id', $companyId)->get(['id', 'name']);

    return response()->json([
        'domains' => $domains,
        'priorities' => $priorities,
    ]);
}
public function getUsersByCompany($companyId)
{
    try {
        $users = User::where('company_id', $companyId)->get(['id', 'name']);
        return response()->json(['users' => $users], 200);
    } catch (\Exception $e) {
       
        return response()->json(['error' => 'Unable to fetch users.'], 500);
    }
}





public function transfer(Request $request)
{
    dd($request->all());
    $request->validate([
        'student_ids' => 'required|string',
        'user_id' => 'required|exists:users,id',
    ]);

    // Parse the student IDs from the input
    $studentIds = explode(',', $request->input('student_ids'));
    $userId = $request->input('user_id');

    // Perform the transfer logic (e.g., update student records)
    DB::table('students')
        ->whereIn('id', $studentIds)
        ->update(['user_id' => $userId]);

    return redirect()->back()->with('success', 'Students transferred successfully.');
}



}
