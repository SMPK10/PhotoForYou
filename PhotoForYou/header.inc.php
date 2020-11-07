  <header>
		<!-- nav est un élément HTML servant à la navigation -->
    	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<!-- Création du logo -->
        	<a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          	<span class="navbar-toggler-icon"></span>
        	</button>
			<!-- Mise en place d'un menu déroulant -->
        	<div class="collapse navbar-collapse" id="navbarCollapse">
          		<ul class="navbar-nav mr-auto">
            		<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">Photos</a>
						<div class="dropdown-menu">
              <?php
                if(!isset($_SESSION['type'])){
				  // Si la personne n'est pas connécté, alors on place ses deux onglets qui amène à la page d'inscription lorsqu'on clique dessus
                  echo '<a class="dropdown-item" href="inscription.php">Acheter</a>';
                  echo '<a class="dropdown-item" href="inscription.php">Vendre</a>';
                }
                else {
                  if($_SESSION['type'] == 'client'){
					// Si la personne connecté est un client, alors on ne fait apparaître que l'onglet d'achat
                    echo '<a class="dropdown-item" href="#">Acheter</a>';
                  }
                  else {
					// Si la personne connecté est un photographe, alors on ne fait apparaître que l'onglet de vente
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
						// Si la personne n'est pas connécté, alors on laisse le bouton des tarifs qui l'amènera à la page d'inscription s'il clique dessus
                      echo '<a class="nav-link" href="inscription.php">Tarifs</a>';
                    }
                    else {
                      if($_SESSION['type'] == 'client'){
						// Si la personne connecté est un client, alors on laisse le bouton des tarifs apparant
                        echo '<a class="nav-link" href="#">Tarifs</a>';
                      }
                      else {
						// Si la personne connecté est un photographe, alors on enlève le bouton des tarifs
                        echo '';
                      }
                    }
                  ?>
            		</li>
          		</ul>
          		<form class="form-inline mt-2 mt-md-0">
				<!-- création d'un menu de recherche -->
            		<input class="form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
            		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          		</form>
          		<ul class="navbar-nav mr-right">
            
        			<li class="nav-item">
                  <?php
                  if(isset($_SESSION['type'])){
					    // Si la personne est connecté, alors il aura accées à un bouton de déconnexion
              			echo '<a class="nav-link btn btn-outline-dark" href="deconnexion.php">deconnexion</a>';
                  }
                  else{
					// Si la personne n'est pas connecté, alors ils aura accées à un bouton de connexion
                    echo '<a class="nav-link btn btn-outline-dark" href="connexion.php">se connecter</a>';
                  }
                  ?>
            		</li>
            		<li class="nav-item">
                  <?php
                  if(isset($_SESSION['type'])){
					// Si la personne est connecté, le bouton d'inscription disparaît
                    echo '';
                  }
                  else{
					// Si la personne n'est pas connecté, le bouton d'inscription est visible
                    echo '<a class="nav-link btn btn-outline-dark" href="inscription.php">S\'identifier</a>';
                  }
                  ?>
           			</li>
          		</ul>  
        	</div>
    	</nav>
    </header>