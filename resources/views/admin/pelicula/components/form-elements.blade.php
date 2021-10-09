<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pelicula.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.pelicula.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descripcion'), 'has-success': fields.descripcion && fields.descripcion.valid }">
    <label for="descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pelicula.columns.descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descripcion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descripcion'), 'form-control-success': fields.descripcion && fields.descripcion.valid}" id="descripcion" name="descripcion" placeholder="{{ trans('admin.pelicula.columns.descripcion') }}">
        <div v-if="errors.has('descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('duracion'), 'has-success': fields.duracion && fields.duracion.valid }">
    <label for="duracion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pelicula.columns.duracion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duracion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('duracion'), 'form-control-success': fields.duracion && fields.duracion.valid}" id="duracion" name="duracion" placeholder="{{ trans('admin.pelicula.columns.duracion') }}">
        <div v-if="errors.has('duracion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duracion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('genero_id'), 'has-success': fields.genero_id && fields.genero_id.valid }">
    <label for="genero_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pelicula.columns.genero_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.genero_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('genero_id'), 'form-control-success': fields.genero_id && fields.genero_id.valid}" id="genero_id" name="genero_id" class="form-control" tabindex="1">
        
             @foreach ($generos as $genero)
                <option value="{{ $genero->id}}"> 
                  {{$genero->genero}}
                </option>
             @endforeach 
               </select>  
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('director_id'), 'has-success': fields.director_id && fields.director_id.valid }">
    <label for="director_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pelicula.columns.director_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div v-if="errors.has('director_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('director_id') }}</div>
        <select v-model="form.director_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('director_id'), 'form-control-success': fields.director_id && fields.director_id.valid}" id="director_id" name="director_id" class="form-control" tabindex="1">
             @foreach ($directors as $director)
                <option value="{{ $director->id}}"> 
                  {{$director->nombre}}
                </option>
             @endforeach 
               </select> 
    </div>
</div>


