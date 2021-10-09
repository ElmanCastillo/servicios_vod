@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.pelicula.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <pelicula-form
            :action="'{{ url('admin/peliculas') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.pelicula.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.pelicula.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </pelicula-form>

        </div>

        </div>

    
@endsection