<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'My Laravel Apps';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
        // $this->data['statuses'] = Product_mdl::status();
        // $this->mdlCategory = new Category_mdl;
    }

    public function index()
    {
        //--Models:
        $dtTickets = Ticket::all();
        //$dtTickets = [];//Tickets::orderBy('id','DESC')->paginate(10);

        $this->data['pageTitle'] = 'Tickets List'; 
        $this->data['dtTickets'] = $dtTickets; 
        return view('tickets.v_index', $this->data);
    }

    public function create()
    {

        $this->data['pageTitle'] = 'Create Tickets'; 
        return view('tickets.v_form', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ticket_name' => 'required|min:4',
            'type' => 'required',
            'category' => 'required',
            'total' => 'required',
            'price' => 'required|numeric'
        ]);

        // Ticket::create($request->all());
        // Ticket::create($request->except('submit'));

        Ticket::create([
            'name' => $request->ticket_name,
            'type' => $request->type,
            'category_id' => $request->category,
            'total_ticket' => $request->total,
            'price' => $request->price,
        ]);

        return redirect()->route('tickets.index')->with('msg', 'Data ticket berhasil di simpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data['pageTitle'] = 'Edit Tickets';
        $this->data['dtTickets'] = Ticket::findOrFail($id);
        // return view('tickets.edit', $this->data);
        return view('tickets.v_form', $this->data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if(!$ticket){
            return redirect()->back();
        }
        $ticket->delete();
        return redirect('tickets')->with('success', 'Success, Selected data successfully deleted!');
    }
}
