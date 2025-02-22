<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Menu;
use App\Models\Module;
use App\Models\PurchaseModuleCompany;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Spatie\Permission\Models\Permission;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
    
        // Step 1: Validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
        'required',
        'string',
        'lowercase',
        'email',
        'max:255',
        Rule::unique('users')->whereNull('deleted_at')
    ],
            'company_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:20'],
            'team_size' => ['required', 'string'],
            'industry' => ['required', 'string'],
        ]);

        

        // Step 2: Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => null, 
            'role'=> 'admin'
        ]);

        // Step 3: Create the company details
        $company = Company::create([
            'name' => $user->name, 
            'company_name' => $request->company_name,
            'email' => $user->email,
            'phone' => $request->contact_number,
            'team_size' => $request->team_size,
            'industry' => $request->industry,
            'user_id' => $user->id,
            'status' => 'active',
            'created_by' => $user->id,
        ]);

       // Step 4: Assign default menus to the new company
        $defaultMenus = Menu::whereNull('company_id')->get();

        foreach ($defaultMenus as $menu) {
            Menu::create([
                'key' => $menu->key . '_' . $company->id,
                'name' => $menu->name,  
                'company_id' => $company->id,
                'group_menu' => $menu->group_menu,
            ]);
        }


        $modules = Module::all();
        $startDate = now(); // Current date and time
$endDate = now()->addDays(15); // Add 15 days for the trial period
    foreach ($modules as $module) {
        PurchaseModuleCompany::create([
            'company_id' => $company->id,
            'module_id' => $module->id,
            'user_limit' => 5,
            'subscription_period' => 15,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 1,

        ]);
    }

    
         // Step 4: Assign all permissions to the user
    $permissions = Permission::all(); 
    $user->syncPermissions($permissions);

        // Step 4: Send email with password setup link
        $status = PasswordBroker::sendResetLink(['email' => $user->email]);

        if ($status === PasswordBroker::RESET_LINK_SENT) {
            return redirect()->route('dashboard')->with('success', 'User and Company created successfully! Password setup email sent.');
        }

        return redirect()->route('dashboard')->with('success', 'User and Company created successfully! Password setup email sent.');
    }
}
