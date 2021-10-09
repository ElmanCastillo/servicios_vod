<div class="form-group row align-items-center" :class="{'has-danger': errors.has('genero'), 'has-success': fields.genero && fields.genero.valid }">
    <label for="genero" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.genero.columns.genero') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.genero" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('genero'), 'form-control-success': fields.genero && fields.genero.valid}" id="genero" name="genero" placeholder="{{ trans('admin.genero.columns.genero') }}">
        <div v-if="errors.has('genero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('genero') }}</div>
    </div>
</div>


