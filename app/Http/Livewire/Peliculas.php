<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelicula;

class Peliculas extends Component
{
    //definimos unas variables
    public $peliculas,$nombre, $descripcion, $duracion, $id_pelicula;
    public $modal = false;

    public function render()
    {
        $this->peliculas = Pelicula::all();
        return view('livewire.peliculas');
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->nombre = '';
        $this->descripcion = '';
        $this->duracion = '';
        $this->id_pelicula = '';
    }
    public function editar($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $this->id_pelicula = $id;
        $this->nombre = $pelicula->nombre;
        $this->descripcion = $pelicula->descripcion;
        $this->duracion = $pelicula->duracion;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Pelicula::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Pelicula::updateOrCreate(['id'=>$this->id_pelicula],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'duracion' => $this->duracion
            ]);
         
         session()->flash('message',
            $this->id_pelicula ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
