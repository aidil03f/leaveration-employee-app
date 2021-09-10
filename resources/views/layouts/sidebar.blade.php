<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>

      @if(auth()->user()->role == 'Admin')

      <li class="nav-item">
        <a href="{{ route('department.index') }}" class="nav-link{{ request()->is('department') ? ' active' : '' }}">
          <i class="nav-icon fas fa-folder"></i>
          <p>Department</p>
        </a>
      </li>

        
      <li class="nav-item">
        <a href="{{ route('position.index') }}" class="nav-link{{ request()->is('position') ? ' active' : '' }}">
          <i class="nav-icon fas fa-folder"></i>
          <p>Position</p>
        </a>
      </li>
      @endif
        
      <li class="nav-item">
        <a href="{{ route('employee.index') }}" class="nav-link{{ request()->is('employee') ? ' active' : '' }}">
          <i class="nav-icon fas fa-folder"></i>
          <p>Employees</p>
        </a>
      </li>

         
      <li class="nav-item">
        <a href="{{ route('leave.index') }}" class="nav-link{{ request()->is('cuti') ? ' active' : '' }}">
          <i class="nav-icon fas fa-folder"></i>
          <p>
            Leaveration
            @if(DB::table('leaves')->count() <= 0)
            @elseif(DB::table('leaves')->count() > 0)
              <span class="badge badge-info right">{{ DB::table('leaves')->count() }}</span>
            @endif
          </p>
        </a>
      </li>
      
      <li class="nav-header">
          <p>Authentication</p>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
                <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-outline-info col-12">Logout</button>
            </form>
      </li>
    </ul>
  </nav>