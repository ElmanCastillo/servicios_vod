<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Post;
use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Suscriptore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {    
         $this->middleware('permission:movie-list|movie-create|movie-edit|movie-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:mavie-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:movie-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:movie-delete', ['only' => ['destroy']]);
         
    }

    public function index()
    {
        $data = Movie::latest()->paginate(5);
        $datas = Movie::all();

        $date1 = Carbon::now()->format('d-m-Y');
        $date2 = Carbon::now()->add(30, 'day')->format('d-m-Y'); //agregar 30 dias
        //dd($date2);

        return view('movies.index', compact('data'),compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscriptor_valido = 0;
        $date1 = Carbon::now()->format('Y-m-d');
        $datas = Movie::all();
        $data = Movie::find($id);
        $userlog = Auth::user()->id ;
        if($suscriptor = DB::table('suscriptores')->where('users_id', $userlog)->first()!=null)
        {
            $suscriptor = DB::table('suscriptores')->where('users_id', $userlog)->first();
           // dd($suscriptor->suscripcion);
            $fecha1 = Carbon::parse($suscriptor->suscripcion);
            //dd($suscriptor->suscripcion);
            if($fecha1->gt($date1)){
                $suscriptor_valido = 1;
            }

        }
        
        
        return view('movies.show', compact('data'),compact('datas'))->with('suscriptor_validos',$suscriptor_valido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }

}
