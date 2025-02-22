<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use App\Models\StudentFeeInstallment;

use Illuminate\Support\Facades\Request as FacadesRequest;
class CalendarController extends Controller
{

    public function __construct()
    {

        $this->checkAuthorization(auth()->user(), FacadesRequest::route()->getName());
    }
    public function index()
    {
      
        $year = date('Y');
    
        // Fetch due payments for students
        $installments = StudentFeeInstallment::where('status', 'pending')
                        ->whereYear('due_date', $year)
                        ->get();
    
        $calendarEvents = [];
        foreach ($installments as $installment) {
            $calendarEvents[] = [
                'id' => $installment->id,
                'companyId' => $installment->company_id,
                'title' => $installment->student->name . ' - Due',
                'start' => date('Y-m-d\TH:i:s', strtotime($installment->due_date)), 
                'backgroundColor' => '#FF0000',
                'borderColor' => '#FF0000',
                'allDay' => true,
                'editable' => false, 
                'fixedEvent' => true 
            ];
        }
    
        $mainEvents = \App\Models\Event::orderBy('sequence_number', 'asc')->where('status', 1)->get();
    
        
        $events = CalendarEvent::all()->map(function ($event) {
            return [
                'id' => $event->id,
                
                'title' => $event->title,
                'start' => date('Y-m-d\TH:i:s', strtotime($event->start)),
                'backgroundColor' => $event->backgroundColor,
                'borderColor' => $event->borderColor,
                'allDay' => true,
                'editable' => true,
                'fixedEvent' => false
            ];
        })->toArray();
    
        $allEvents = array_merge($calendarEvents, $events);

      
     
    
        return view('admin.calender.index', compact( 'allEvents', 'mainEvents'))
            ->with('title', 'Student Calender');
    }

    public function store(Request $request)
    {
        $created_by = auth()->user()->id;
        if (auth()->user()->role != 'super-admin') {
            if (auth()->user()->role == 'admin') {
                $company = Company::where('user_id', auth()->user()->id)->first();
                if ($company) {
                    $company_id = $company->id;
                }
            } else {
                $company_id = auth()->user()->company_id;
            }
        } else {
            // Super-admin can set company_id from the request
            $company_id = $request->company_id;
        }
        
        $event = CalendarEvent::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'backgroundColor' => $request->backgroundColor,
            'borderColor' => $request->borderColor,
            'company_id' =>  $request->company_id,
            'created_by' => $created_by,
        ]);

        return response()->json(['id' => $event->id, 'message' => 'Event created successfully']);

    }

    public function update(Request $request, $id)
    {
        $event = CalendarEvent::find($id);
        if ($event) {
            $event->update([
                'start' => $request->start,
                'end' => $request->end,
            ]);
            return response()->json(['message' => 'Event updated!'], 200);
        }
        return response()->json(['message' => 'Event not found!'], 404);
    }

    public function destroy($id)
    {
        
        $event = CalendarEvent::find($id);
        if ($event) {
            $event->delete();
            return response()->json(['message' => 'Event deleted!'], 200);
        }
        return response()->json(['message' => 'Event not found!'], 404);
    }
}
