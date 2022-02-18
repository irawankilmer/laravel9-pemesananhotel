<li class="nav-item">
  <a href="{{ url('backend') }}" class="nav-link @if($menu == 'dashboard') active @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item @if($menu == 'manajemenData') menu-open @endif">
    <a href="#" class="nav-link @if($menu == 'manajemenData') active @endif">
      <i class="nav-icon fas fa-database"></i>
      <p>
        Manajemen Data
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('backend/admin') }}" class="nav-link @if($menuList == 'admin') active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>Admin</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('backend/type') }}" class="nav-link @if($menuList == 'type') active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>Tipe kamar</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('backend/facility') }}" class="nav-link @if($menuList == 'facility') active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>Pasilitas kamar</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('backend/room') }}" class="nav-link @if($menuList == 'room') active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>kamar</p>
        </a>
      </li>

    </ul>
  </li>
  