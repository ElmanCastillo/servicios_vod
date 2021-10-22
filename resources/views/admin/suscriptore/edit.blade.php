@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.suscriptore.actions.edit', ['name' => $suscriptore->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <suscriptore-form
                :action="'{{ $suscriptore->resource_url }}'"
                :data="{{ $suscriptore->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.suscriptore.actions.edit', ['name' => $suscriptore->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.suscriptore.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </suscriptore-form>

        </div>
    
</div>

@endsection