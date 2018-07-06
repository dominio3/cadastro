<li class="{{ Request::is('cadastros*') ? 'active' : '' }}">
    <a href="{!! route('cadastros.index') !!}"><i class="fa fa-barcode text-light-blue"></i><span>Cadastros</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('product.list') !!}"><i class="fa fa-users text-light-blue"></i><span>Importar Excel</span></a>
</li>


<li class="{{ Request::is('product*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users text-light-blue"></i><span>Usuarios</span></a>
</li>
