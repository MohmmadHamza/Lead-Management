<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Company;
use App\Models\DomainClass;
use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Request as FacadesRequest;
class EventManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
 
         $this->checkAuthorization(auth()->user(), FacadesRequest::route()->getName());
     }
    public function index()
    {
        $companies = Company::all();
       
        return view("admin.event.index",compact('companies'))->with('title', 'Admission Detail');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
       
        return view("admin.event.form",compact('companies'))->with('title', 'Admission Detail');
    }

    public function list(Request $request)
    {
        $loggedInUser = auth()->user();
        $event = Event::select('id', 'name', 'description', 'created_at', 'company_id', 'status', 'updated_at','sequence_number')->with('company');


        if ($request->filled('status')) {
            $event->where("status", $request->status);
        }

        if ($request->filled('company_id')) {
            $event->where("company_id", $request->company_id);
        }



        return DataTables::of($event)

            ->editColumn('created_at', function ($event) {
                return $event->created_at->format('d-m-Y h:i A');
            })

            ->editColumn('status', function ($event) {
                if ($event->status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('company_name', function ($event) use ($loggedInUser) {
                if ($loggedInUser->role == 'super-admin') {
                    return $event->company->company_name ?? 'N/A';
                }
                // return null;
            })
           


          
            ->addColumn('actions', function ($event) {
                $links = [];

                if (auth()->user()->can('event.edit')) {
                    $links[] = [
                        'title' => 'Edit',
                        'link' => route('event.edit', $event->id),
                        'icon' => 'fa-edit',
                    ];
                }
              

                if (auth()->user()->can('event.delete')) {
                    $links[] = [
                        'title' => 'Delete',
                        'link' => '',
                        'icon' => 'fa-trash',
                        'onclick' => "confirmDelete('" . route('event.destroy', $event->id) . "')",
                    ];
                }

                return [
                    'id' => $event->id,
                    'links' => $links,
                ];
            })

            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        try {

            $validated = $request->validated();

            if (auth()->user()->role != 'super-admin') {
                if (auth()->user()->role == 'admin') {
                    $company = Company::where('user_id', auth()->user()->id)->first();
                    $validated['company_id'] = $company->id;
                } else {
                    $validated['company_id'] = auth()->user()->company_id;
                    $validated['created_by'] = auth()->user()->id;
                }

            }

            $validated['created_by'] = auth()->user()->id;

            $validated['status'] = $request->status ?? 0;

            Event::create($validated);
            return redirect()->route('event.index')->with('success', 'Event created successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to create Event: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to create Event: ' . $e->getMessage())->withInput();
        }
        
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
    public function edit(Event $event)
    {
        $companies = Company::orderBy('created_at', 'asc')->where('status', 'active')->get();
       
        return view("admin.event.form",compact('companies','event'))->with('title', 'Admission Detail');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        try {
            $validated = $request->validated();
            $validated['status'] = $request->status ?? 0;
            $event->update($validated);
            return redirect()->route('event.index')->with('success', 'Event updated successfully');
        } catch (\Throwable $e) {
            \Log::error('Failed to update Event ID ' . $event->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to update event: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event = Event::findOrFail($event->id);
            Event::where('id', $event->id)->delete();
            return response()->json(['message' => 'Event deleted successfully.'], 200);
        } catch (\Throwable $e) {
            \Log::error('Failed to delete event ID ' . $event->id . ': ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Failed to delete event: ' . $e->getMessage()], 500);
        }
    }

    public function destroyMany(Request $request)
    {   
        try {
            $event_ids = $request->input('Checkboxes');
            Event::whereIn('id', $event_ids)->delete();
            return redirect()->route('event.index')->with('error', 'Event deleted successfully.');
        } catch (\Throwable $e) {
            \Log::error('Failed to delete Event: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors('Failed to delete Event: ' . $e->getMessage());
        }
    }
}
