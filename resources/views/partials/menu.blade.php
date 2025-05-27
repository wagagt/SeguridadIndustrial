<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('empleado_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/departamentos*") ? "menu-open" : "" }} {{ request()->is("admin/cargos*") ? "menu-open" : "" }} {{ request()->is("admin/agregar-empleados*") ? "menu-open" : "" }} {{ request()->is("admin/documento-empleados*") ? "menu-open" : "" }} {{ request()->is("admin/recibo-pagos*") ? "menu-open" : "" }} {{ request()->is("admin/contrato-laborals*") ? "menu-open" : "" }} {{ request()->is("admin/empleado-contratos*") ? "menu-open" : "" }} {{ request()->is("admin/horas-trabajadas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/departamentos*") ? "active" : "" }} {{ request()->is("admin/cargos*") ? "active" : "" }} {{ request()->is("admin/agregar-empleados*") ? "active" : "" }} {{ request()->is("admin/documento-empleados*") ? "active" : "" }} {{ request()->is("admin/recibo-pagos*") ? "active" : "" }} {{ request()->is("admin/contrato-laborals*") ? "active" : "" }} {{ request()->is("admin/empleado-contratos*") ? "active" : "" }} {{ request()->is("admin/horas-trabajadas*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user-alt">

                            </i>
                            <p>
                                {{ trans('cruds.empleado.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('departamento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departamentos.index") }}" class="nav-link {{ request()->is("admin/departamentos") || request()->is("admin/departamentos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hospital-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.departamento.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cargo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cargos.index") }}" class="nav-link {{ request()->is("admin/cargos") || request()->is("admin/cargos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cargo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('agregar_empleado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.agregar-empleados.index") }}" class="nav-link {{ request()->is("admin/agregar-empleados") || request()->is("admin/agregar-empleados/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-male">

                                        </i>
                                        <p>
                                            {{ trans('cruds.agregarEmpleado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('documento_empleado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documento-empleados.index") }}" class="nav-link {{ request()->is("admin/documento-empleados") || request()->is("admin/documento-empleados/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-id-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentoEmpleado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('recibo_pago_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.recibo-pagos.index") }}" class="nav-link {{ request()->is("admin/recibo-pagos") || request()->is("admin/recibo-pagos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.reciboPago.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contrato_laboral_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contrato-laborals.index") }}" class="nav-link {{ request()->is("admin/contrato-laborals") || request()->is("admin/contrato-laborals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contratoLaboral.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('empleado_contrato_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.empleado-contratos.index") }}" class="nav-link {{ request()->is("admin/empleado-contratos") || request()->is("admin/empleado-contratos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-contract">

                                        </i>
                                        <p>
                                            {{ trans('cruds.empleadoContrato.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('horas_trabajada_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.horas-trabajadas.index") }}" class="nav-link {{ request()->is("admin/horas-trabajadas") || request()->is("admin/horas-trabajadas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.horasTrabajada.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('entrenamiento_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/descripcion-entrenamientos*") ? "menu-open" : "" }} {{ request()->is("admin/asistencia-entrenamientos*") ? "menu-open" : "" }} {{ request()->is("admin/charlas*") ? "menu-open" : "" }} {{ request()->is("admin/asistencia-charlas*") ? "menu-open" : "" }} {{ request()->is("admin/instructors*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/descripcion-entrenamientos*") ? "active" : "" }} {{ request()->is("admin/asistencia-entrenamientos*") ? "active" : "" }} {{ request()->is("admin/charlas*") ? "active" : "" }} {{ request()->is("admin/asistencia-charlas*") ? "active" : "" }} {{ request()->is("admin/instructors*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.entrenamiento.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('descripcion_entrenamiento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.descripcion-entrenamientos.index") }}" class="nav-link {{ request()->is("admin/descripcion-entrenamientos") || request()->is("admin/descripcion-entrenamientos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.descripcionEntrenamiento.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asistencia_entrenamiento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asistencia-entrenamientos.index") }}" class="nav-link {{ request()->is("admin/asistencia-entrenamientos") || request()->is("admin/asistencia-entrenamientos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.asistenciaEntrenamiento.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('charla_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.charlas.index") }}" class="nav-link {{ request()->is("admin/charlas") || request()->is("admin/charlas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-glasses">

                                        </i>
                                        <p>
                                            {{ trans('cruds.charla.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asistencia_charla_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asistencia-charlas.index") }}" class="nav-link {{ request()->is("admin/asistencia-charlas") || request()->is("admin/asistencia-charlas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-list-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.asistenciaCharla.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('instructor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.instructors.index") }}" class="nav-link {{ request()->is("admin/instructors") || request()->is("admin/instructors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.instructor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('centro_de_herramientum_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/categoria-herramienta*") ? "menu-open" : "" }} {{ request()->is("admin/herramienta*") ? "menu-open" : "" }} {{ request()->is("admin/uso-herramienta*") ? "menu-open" : "" }} {{ request()->is("admin/mantenimiento-herramienta*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/categoria-herramienta*") ? "active" : "" }} {{ request()->is("admin/herramienta*") ? "active" : "" }} {{ request()->is("admin/uso-herramienta*") ? "active" : "" }} {{ request()->is("admin/mantenimiento-herramienta*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-toolbox">

                            </i>
                            <p>
                                {{ trans('cruds.centroDeHerramientum.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('categoria_herramientum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categoria-herramienta.index") }}" class="nav-link {{ request()->is("admin/categoria-herramienta") || request()->is("admin/categoria-herramienta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.categoriaHerramientum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('herramientum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.herramienta.index") }}" class="nav-link {{ request()->is("admin/herramienta") || request()->is("admin/herramienta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.herramientum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('uso_herramientum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.uso-herramienta.index") }}" class="nav-link {{ request()->is("admin/uso-herramienta") || request()->is("admin/uso-herramienta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.usoHerramientum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mantenimiento_herramientum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mantenimiento-herramienta.index") }}" class="nav-link {{ request()->is("admin/mantenimiento-herramienta") || request()->is("admin/mantenimiento-herramienta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mantenimientoHerramientum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('cliente_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/contrato-documentos*") ? "menu-open" : "" }} {{ request()->is("admin/agregar-clientes*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/contrato-documentos*") ? "active" : "" }} {{ request()->is("admin/agregar-clientes*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.cliente.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('contrato_documento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contrato-documentos.index") }}" class="nav-link {{ request()->is("admin/contrato-documentos") || request()->is("admin/contrato-documentos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contratoDocumento.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('agregar_cliente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.agregar-clientes.index") }}" class="nav-link {{ request()->is("admin/agregar-clientes") || request()->is("admin/agregar-clientes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.agregarCliente.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>