<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pelicula_id'), 'has-success': fields.pelicula_id && fields.pelicula_id.valid }">
    <label for="pelicula_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.listapelicula.columns.pelicula_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pelicula_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pelicula_id'), 'form-control-success': fields.pelicula_id && fields.pelicula_id.valid}" id="pelicula_id" name="pelicula_id" placeholder="{{ trans('admin.listapelicula.columns.pelicula_id') }}">
        <div v-if="errors.has('pelicula_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pelicula_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('venta_id'), 'has-success': fields.venta_id && fields.venta_id.valid }">
    <label for="venta_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.listapelicula.columns.venta_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.venta_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('venta_id'), 'form-control-success': fields.venta_id && fields.venta_id.valid}" id="venta_id" name="venta_id" placeholder="{{ trans('admin.listapelicula.columns.venta_id') }}">
        <div v-if="errors.has('venta_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('venta_id') }}</div>
    </div>
</div>


