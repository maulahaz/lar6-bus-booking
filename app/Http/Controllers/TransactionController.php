<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction_mdl;

class TransactionController extends Controller
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
        // $dtTransactions = Transaction_mdl::all();
        $dtTransactions = Transaction_mdl::where('status', 1)->get();

        $this->data['pageTitle'] = 'Transactions List'; 
        $this->data['dtTransactions'] = $dtTransactions; 
        return view('transactions.v_index', $this->data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'nama_tiket' => 'required',
            'qty' => 'required|numeric'
        ]);

        Transaction_mdl::create([
            'ticket_id' => $request->nama_tiket,
            'status' => 1,
            'qty' => $request->qty,
        ]);
        
        return redirect('transactions')->with('success', 'Success, New Data successfully created!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
