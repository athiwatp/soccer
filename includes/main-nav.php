<?php 
        echo '
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="nav navbar-nav">
            
            <li ';
            if ($borough == 'home') {
              echo 'class="active"';
            } 
            echo '><a href="">Home</a></li>
            <li ';
            if ($borough == 'brooklyn') {
              echo 'class="active"';
            } 
            echo '><a href="brooklyn">Brooklyn</a></li>
            <li ';
            if ($borough == 'manhattan') {
              echo 'class="active"';
            } 
            echo '><a href="manhattan">Manhattan</a></li>
            <li ';
            if ($borough == 'queens') {
              echo 'class="active"';
            } 
            echo '><a href="queens">Queens</a></li>


          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="https://nycsoccer.leagueapps.com/login">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>';

    ?>
