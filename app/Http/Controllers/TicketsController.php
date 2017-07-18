<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index')->with('tickets',$tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = uniqid();
        $ticket = new Ticket;
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        $ticket->post_type = $request->get('post_type');
        $ticket->slug = $slug;

        $ticket->save();

        $data = array( 'ticket' => $slug, );
        Mail::send('emails.ticket', $data, function ($message)
        {
            $message->from('toneex97@gmail.com', 'Learning Laravel');
            $message->to('toneex97@gmail.com')->subject('There is a new ticket!');
        });


        return redirect('/contact')->with('status','Your ticket has been created.Your ticket ID is: '.$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->get();
        return view('tickets.show')->with('ticket',$ticket)->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit')->with('ticket',$ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if($request->get('status') != NULL){
            $ticket->status = 0;
        } else {
            $ticket->status = 1;
        }
        $ticket->save();
        return redirect(action('TicketsController@edit',$ticket->slug))->with('status','The ticket '.$slug .'has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect('/tickets')->with('status','The ticket '.$slug.' has been deleted');
    }
}
