<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class MessegesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $messages = DB::table('messages')->get();
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        // Guardar los datos usando la clase DB
        // DB::table('messages')->insert([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "message" => $request->input('mensaje'),
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);
        // Guardar los datos usando modelo Message variante 1
        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('mensaje');
        // $message->save();
        // Guardar los datos usando modelo Message variante 2
        // hay que adicionar la propiedad fillable en el modelo
        Message::create([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "message" => $request->input('mensaje')
        ]);
        // Guardar los datos usando modelo Message variante 3
        // hay que adicionar la propiedad fillable en el modelo
        // Message::created($request);

        return redirect()
            ->route('messages.create')
            ->with('info', 'Mesaje recibido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {
        // DB::table('messages')->where('id', $id)->update([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "message" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now()
        // ]);
        Message::findOrFail($id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "message" => $request->input('mensaje')
        ]);
        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('messages')->where('id', $id)->delete();
        // Message::findOrFail($id)->delete();
        Message::destroy($id);
        return redirect()->route('messages.index');
    }
}
