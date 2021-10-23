@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.rol.actions.edit', ['name' => $rol->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <role-form
                :action="'{{ $rol->resource_url }}'"
                :data="{{ $rol->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.rol.actions.edit', ['name' => $rol->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.rol.components.form-elements')
                    </div>
                    @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </role-form>

        </div>
    
</div>

@endsection