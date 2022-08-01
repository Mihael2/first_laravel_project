<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Admin panel</li>
          <li class="nav-item">
            <a href="{{ asset('pages/calendar.html')}} " class="nav-link">
            <i class="nav-icon fas fa-align-justify"></i>
              <p>
                Posts
                <span class="badge badge-info right">{{ $posts->total()}}</span>
              </p>
            </a>
           </li>
           </li>
           
        </ul>
</nav>        

          