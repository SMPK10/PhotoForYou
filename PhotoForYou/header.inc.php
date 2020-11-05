  <header>
		<!-- nav est un élément HTML servant à la navigation -->
    	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        	<a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          	<span class="navbar-toggler-icon"></span>
        	</button>
        	<div class="collapse navbar-collapse" id="navbarCollapse">
          		<ul class="navbar-nav mr-auto">
            		<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">Photos</a>
						<div class="dropdown-menu">
              <?php
                if(!isset($_SESSION['type'])){
                  echo '<a class="dropdown-item" href="inscription.php">Acheter</a>';
                  echo '<a class="dropdown-item" href="inscription.php">Vendre</a>';
                }
                else {
                  if($_SESSION['type'] == 'client'){
                    echo '<a class="dropdown-item" href="#">Acheter</a>';
                  }
                  else {
                    echo '<a class="dropdown-item" href="#">Vendre</a>';
                  }
                }
              ?>
							<a class="dropdown-item" href="#">Les plus populaires</a>
							<a class="dropdown-item" href="#">Les nouveautés</a>
						</div>
					</li>
            		<li class="nav-item">
              		<?php
                    if(!isset($_SESSION['type'])){
                      echo '<a class="nav-link" href="inscription.php">Tarifs</a>';
                    }
                    else {
                      if($_SESSION['type'] == 'client'){
                        echo '<a class="nav-link" href="#">Tarifs</a>';
                      }
                      else {
                        echo '';
                      }
                    }
                  ?>
            		</li>
          		</ul>
          		<form class="form-inline mt-2 mt-md-0">
            		<input class="form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
            		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          		</form>
          		<ul class="navbar-nav mr-right">
            
        			<li class="nav-item">
                  <?php
                  if(isset($_SESSION['type'])){
              			echo '<a class="nav-link btn btn-outline-dark" href="deconnexion.php">deconnexion</a>';
                  }
                  else{
                    echo '<a class="nav-link btn btn-outline-dark" href="connexion.php">se connecter</a>';
                  }
                  ?>
            		</li>
            		<li class="nav-item">
                  <?php
                  if(isset($_SESSION['type'])){
                    echo '';
                  }
                  else{
                    echo '<a class="nav-link btn btn-outline-dark" href="inscription.php">S\'identifier</a>';
                  }
                  ?>
           			</li>
          		</ul>  
        	</div>
    	</nav>
    </header>