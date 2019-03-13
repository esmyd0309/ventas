<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Tipod;
use App\Region;
use App\Provincia;
use App\Canton;
use App\Parroquia;
use App\Sexo;
use App\Estadocivil;

use App\User;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use DB;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   

      // dd($request);
        $apellidos = $request->get('apellidos');
        $cedula = $request->get('cedula');
        $celular = $request->get('celular');
      //  dd($request);
        $clientes=Cliente::orderBy('id', 'DESC')
        ->apellidos($apellidos)
        ->cedula($cedula)
        ->celular($celular)
        ->paginate(10);
     

        return view('cliente.index', compact('clientes'));

    
    }
    

        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipod = Tipod::all();
        $region = Region::all();
        $provincia = Provincia::all();
        $canton = Canton::all();
        $parroquia = Parroquia::all();
        $sexo = Sexo::all();
        $estadocivil = Estadocivil::all();
      
        
        return view('cliente.create', compact('tipod','provincia','region','parroquia','sexo','estadocivil','canton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
    
  
         //Validacion de los campos. 
        /* $this->validate($request,[
            'nombres' => 'required|unique:posts|max:255',
            'cedula' => 'required',
            'sexo' => 'required',
            'dato' => 'required|unique:posts|max:10',
            'cedula' => 'required|unique:posts|max:10',
            'cargo' => 'required|unique:posts|max:45',
        ]);*/

    //instanciar el metodo, para el almacenamiento

            
            $cliente = new Cliente;
           
            $cliente->tipo_documento = $request->tipo_documento;
            $cliente->cedula = $request->cedula;
            $cliente->apellidos = $request->apellidos;
            $cliente->nombres = $request->nombres;
            $cliente->direccion = $request->direccion;
            $cliente->email = $request->email;
            $cliente->parentesco = $request->parentesco;
            $cliente->fechanacimiento = $request->fechanacimiento;
            $cliente->dato4 = $request->dato4;
            $cliente->dato5 = $request->dato5;
            $cliente->empresa = $request->empresa;
            $cliente->provincia = $request->provincia;
            $cliente->canton = $request->canton;
            $cliente->parroquia = $request->parroquia;
            $cliente->region = $request->region;
            $cliente->sexo = $request->sexo;
            $cliente->estadocivil = $request->estadocivil;
            $cliente->dato = $request->dato;
            $cliente->dato2 = $request->dato2;
            $cliente->dato3 = $request->dato3;
            $cliente->dato7 = $request->dato7;
            $cliente->dato6 = $request->dato6;
            $cliente->dato8 = $request->dato8;
            $cliente->extension = $request->extension;
            $cliente->tipo_empleado = $request->tipo_empleado;
            $cliente->observacion = $request->observacion;
            $cliente->cargo = $request->cargo;
            $cliente->salario = $request->salario;
            $cliente->antiguedad = $request->antiguedad;
            $cliente->direccion_trabajo = $request->direccion_trabajo;
            $cliente->user_id =$request->user_id;

            $cliente->save();
            

    //Redireccion

    return redirect()->route('cliente.show',['id' => $cliente->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //dd($cliente);

        //$clientes = Cliente::find($cliente);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
       
        
       // $clientes = Cliente::find($cliente);
        return view('cliente.edit', compact('cliente'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
         /*$data = request()->validate([
            'cedula' => 'required|max:10',
            'dato' => 'required|max:10',
            'nombres' => 'required|max:40',
            'apellidos' => 'required|max:40',
            'direccion' => 'required|max:255'
           'dato2' => 'max:10',
            'dato3' => 'required|max:10',
            'nombres' => 'required|max:40',
            'apellidos' => 'required|max:40',
            'sexo' => 'required|max:9',
            'direccion' => 'required|max:255',
            'dato5' => 'max:10'
        ]);*/

        
        //dd($request);
        $usuario = auth()->id();
       // dd($usuario);
            $cliente->tipo_documento = $request->input('tipo_documento');
            $cliente->cedula = $request->input('cedula');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->nombres = $request->input('nombres');
            $cliente->email = $request->input('email');
            $cliente->parentesco = $request->input('parentesco');
            $cliente->fechanacimiento = $request->input('fechanacimiento');
            $cliente->dato4 = $request->input('dato4');
            $cliente->dato5 = $request->input('dato5');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->provincia = $request->input('provincia');
            $cliente->canton = $request->input('canton');
            $cliente->parroquia = $request->input('parroquia');
            $cliente->region = $request->input('region');
            $cliente->sexo = $request->input('sexo');
            $cliente->estadocivil = $request->input('estadocivil');
            $cliente->dato = $request->input('dato');
            $cliente->dato2 = $request->input('dato2');
            $cliente->dato3 = $request->input('dato3');
            $cliente->dato7 = $request->input('dato7');
            $cliente->extension = $request->input('extension');
            $cliente->tipo_empleado = $request->input('tipo_empleado');
            $cliente->empresa = $request->input('empresa');
            $cliente->dato6 = $request->input('dato6');
            $cliente->observacion = $request->input('observacion');
            $cliente->cargo = $request->input('cargo');
            $cliente->salario = $request->input('salario');
            $cliente->antiguedad = $request->input('antiguedad');
            $cliente->direccion_trabajo = $request->input('direccion_trabajo');
            $cliente->direccion = $request->input('direccion');
            $cliente->user_id =$usuario;
            $cliente->update();
            return redirect()->route('cliente.show',['id' => $cliente->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
