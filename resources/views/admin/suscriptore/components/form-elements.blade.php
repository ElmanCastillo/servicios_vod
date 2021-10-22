<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': fields.estado && fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.suscriptore.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': fields.estado && fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.suscriptore.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('users_id'), 'has-success': fields.users_id && fields.users_id.valid }">
    <label for="users_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.suscriptore.columns.users_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.users_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('users_id'), 'form-control-success': fields.users_id && fields.users_id.valid}" id="users_id" name="users_id" placeholder="{{ trans('admin.suscriptore.columns.users_id') }}">
        <div v-if="errors.has('users_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('users_id') }}</div>
    </div>
</div>


