<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Company;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $company = Company::where("user_id", $user->id)->first();
        $states = State::all();
        return view("admin.profile.index", compact('user','states','company'));
    }
   

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
      
        $user = User::findOrFail($id);

        
    
        // Validate user data first
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'mobile' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'landmark' => 'nullable|string|max:255',
            'pin_code' => 'nullable|numeric',
            'state' => 'nullable|exists:states,id',
            'city' => 'nullable|exists:cities,id',
            'photo' => 'nullable|image|max:2048',
        ]);
    
      
        // Additional validation and logic for admins
        if ($user->role == 'admin') {
            $companyValidatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric',
                'team_size' => 'required|string',
                'industry' => 'required|string',
                'photo' => 'nullable|image|max:2048',
            ]);
    
            // Find company by user_id
            $company = Company::where('user_id', $user->id)->first();
    
            if ($request->hasFile('photo')) {
                // Check and delete existing company photo
                if ($company && $company->photo && Storage::disk('public')->exists($company->photo)) {
                    Storage::disk('public')->delete($company->photo);
                }
    
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('companys', $filename, 'public');
                $companyValidatedData['photo'] = $path;
            }
    
            // Update or create company record
            if ($company) {
                $company->update($companyValidatedData);
            } else {
                $companyValidatedData['user_id'] = $user->id; // Add user_id for new record
                Company::create($companyValidatedData);
            }
        }
    
        // Handle user photo upload
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
    
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('users', $filename, 'public');
            $validatedData['photo'] = $path;
        }
    
        // Update user data
        $user->update($validatedData);
    
        
        return redirect()
            ->route('user-profile.index')
            ->with('success', 'User details updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
