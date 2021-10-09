<div class="form-group row align-items-center" :class="{'has-danger': errors.has('actors_id'), 'has-success': fields.actors_id && fields.actors_id.valid }">
    <label for="actors_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reparto.columns.actors_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div v-if="errors.has('actors_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('actors_id') }}</div>
        <select v-model="form.actors_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('actors_id'), 'form-control-success': fields.actors_id && fields.actors_id.valid}" id="actors_id" name="actors_id" class="form-control" tabindex="1">
             @foreach ($actors as $actor)
                <option value="{{ $actor->id}}"> 
                  {{$actor->nombre}}
                </option>
             @endforeach 
               </select> 
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('peliculas_id'), 'has-success': fields.peliculas_id && fields.peliculas_id.valid }">
    <label for="peliculas_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reparto.columns.peliculas_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div v-if="errors.has('peliculas_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('peliculas_id') }}</div>
        <select v-model="form.peliculas_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('peliculas_id'), 'form-control-success': fields.peliculas_id && fields.peliculas_id.valid}" id="peliculas_id" name="peliculas_id" class="form-control" tabindex="1">
             @foreach ($peliculas as $pelicula)
                <option value="{{ $pelicula->id}}"> 
                  {{$pelicula->nombre}}
                </option>
             @endforeach 
               </select> 
    </div>
</div>


