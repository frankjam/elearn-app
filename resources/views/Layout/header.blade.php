<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-learn </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('courses.index') }}">Courses </a>
        </li>
 @can('view-permission')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('permissions.index') }}">permissions</a>
        </li>
@endcan
@can('view-role')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
        </li>
@endcan

<li class="nav-item">
          <a class="nav-link" href="{{ route('login.logout') }}">Logout</a>
        </li>

      </ul>

    </div>
  </div>
</nav>