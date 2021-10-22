<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/actors') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.actor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/repartos') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.reparto.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipopagos') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.tipopago.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/generos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.genero.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/peliculas') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.pelicula.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/directors') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.director.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/listapeliculas') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.listapelicula.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ventas') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.venta.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/suscriptores') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.suscriptore.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.user.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
