<?php

if ($url_path[3-$i] == '' || $url_path[3-$i] == 'create-league.php' || $url_path[3-$i] == 'edit-league.php') {
  $admin_section  = 'leagues';
}
elseif ($url_path[3-$i] == 'locations.php' || $url_path[3-$i] == 'create-location.php' || $url_path[3-$i] == 'edit-location.php') {
  $admin_section  = 'locations';
}

echo '
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="nav navbar-nav">
            <li ';
            if ($admin_section == 'leagues') {
              echo 'class="active"';
            }
            echo '><a href="admin/">Leagues</a></li>
            <li ';
            if ($admin_section == 'locations') {
              echo 'class="active"';
            }
            echo '><a href="admin/locations.php">Locations</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>';

      if (isset($auth) && $auth === 1) {
      echo '</div>';
}

?>
