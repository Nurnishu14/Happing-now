<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreateEvent;
class CreateEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$events = CreateEvent::all()->toArray();
		return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$event = new CreateEvent([
		'event_name'=>$request->get('event_name'),
			     'date'=>$request->get('date'),
		 'time'=>$request->get('time'),
		 'venue'=>$request->get('venue'),
		'event_details'=>$request->get('event_details'),
		
		'need_registration'=>$request->get('need_registration')

		]);
		$event->save();
		return redirect('/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$events = CreateEvent::find($id);
		return view('event.edit',compact('events','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

		$events = CreateEvent::find($id);
		$events->event_name = $request->get('event_name');
		$events->date = $request->get('date');
		$events->time = $request->get('time');
		$events->Venue = $request->get('Venue');
		$events->event_details = $request->get('event_details');
		$events->need_registration = $request->get('need_registration');
		$events->save();
		return redirect('/event');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $event = CreateEvent::find($id);
      $event->delete();

      return redirect('/event');
    }
}
