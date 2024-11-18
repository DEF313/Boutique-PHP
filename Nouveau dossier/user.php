<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="src/user.css">
    <style>



    </style>

    
</head>
<body>
<?php
    session_start();
    require_once("connectbd.php");
    if(!isset($_SESSION['nom'])|| !isset($_SESSION['prenom'])){
        header("location:connexion.php");

       
    }
    $articles = $pdo->query("SELECT * FROM article ORDER BY id DESC");
    ?>
    <header class="header">
        <div class="background-video">
            <video autoplay muted loop>
                <source src="src/7568747-hd_1920_1080_25fps.mp4" type="video/mp4">
                Ton navigateur ne prend pas en charge la vidéo.
            </video>
        </div>
        <div class="content">
        <h1>Notre Boutique</h1>
        <h2>Votre destination pour des produits d'exception</h2>
        <p>Découvrez notre sélection de produits de qualité, soigneusement sélectionnés pour répondre à vos besoins. Explorez notre page pour voir les différents articles que nous proposons.</p>
        </div>
    </header>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Nos produits et Divers</h2>
        
        
        <div class="mb-3 w-50">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon1">
    </div>
</div>


        <div class="row" id="cardContainer">
            <!-- Produits en dur -->
            <?php 
$i = 1;  
while ($result = $articles->fetch()) {
    // Générer un nombre aléatoire entre 2 et 5
    $randomStars = rand(2, 5);
    $starsHtml = ''; // Variable pour stocker les étoiles

    // Ajouter les étoiles remplies
    for ($j = 0; $j < $randomStars; $j++) {
        $starsHtml .= "<i class='fas fa-star' style='color: orange;'></i>";
    }

    // Ajouter les étoiles vides
    for ($k = $randomStars; $k < 5; $k++) {
        $starsHtml .= "<i class='far fa-star' style='color: orange;'></i>";
    }

    echo "
    <div class='col-md-3 product-card'>
        <div class='card'>
            <img src='" . $result['image'] . "' class='card-img-top' alt='Produit'>
            <div class='card-body' id='" . $i . "' style='display:none'>
                <h5 class='card-title'>" . $result['libelle'] . "</h5>
                <p class='card-text'>" . $result['description'] . "</p>
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item'>" . $result['prix'] . "<span> FCFA</span></li>
                <li class='list-group-item'>Quantité : " . $result['quantite'] . "</li>
                <li class='list-group-item'>
                    <button class='btn btn-outline-primary' onclick='Description(" . $i . ")'>Description</button> 
                    $starsHtml
                </li>
            </ul>
        </div>
    </div>
    ";
    $i++;
} 
?>

        </div>

        <div class="text-center mt-4">
            <ul class="pagination" id="pagination"></ul>
        </div>
    </div>
    

   






    <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    
    
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    
  </section>
 
  <section class="">
    <div class="container text-center text-md-start mt-5">
      
      <div class="row mt-3">
        
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Projet groupe4
          </h6>
          <p>
          En tant qu'étudiants de cette école, nous avons l'opportunité d'apprendre dans un environnement axé sur le développement web, le développement de réseaux et la cybersécurité. 
    Ce projet témoigne de notre engagement à tirer le meilleur parti de notre formation et à contribuer à l'avenir de notre domaine. 
    Ensemble, nous construisons des compétences précieuses et un réseau professionnel solide.
          </p>
        </div>
       
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Membres
          </h6>
          <p>
            Maxime DEFALEOUNA
          </p>
          <p>
            Patrice GNANSA
          </p>
          <p>
            Audrey BAKOMA
          </p>
          <p>
            Etudiants a LPSIC Kara
          </p>
        </div>
        
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contacts</h6>
          <p><i class="fas fa-home me-3"></i> Kara TOGO</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            maximedefa@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 228 90 75 93 10</p>
          <form action="" id="commentForm">
          <div class="form-group">
    <label for="exampleFormControlTextarea1">Laissez un commentaire</label>
    <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"  spellcheck="false" autocomplete="off" placeholder="saissisez un message"></textarea>
  </div>
  <button type="submit" class="btn btn-secondary mt-1">Envoyer</button>
          </form>
          <p id="response" style="display: none; color: green;">Message envoyé</p>
         
        </div>
        
      </div>
      
    </div>
  </section>
  
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="https://univ-kara.tg/">LPSIC kara</a>
  </div>
  
</footer>

    <script>
        const cardsPerPage = 8; // Nombre de cartes par page
        let currentPage = 1;

        function displayCards() {
            const allCards = document.querySelectorAll('.product-card');
            const totalPages = Math.ceil(allCards.length / cardsPerPage);
            const start = (currentPage - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            allCards.forEach((card, index) => {
                card.style.display = (index >= start && index < end) ? 'block' : 'none';
            });

            createPagination(totalPages);
        }

        function createPagination(totalPages) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; // Effacer les anciennes pages

    for (let i = 1; i <= totalPages; i++) {
        const pageItem = document.createElement('li');
        pageItem.className = 'page-item';
        const pageLink = document.createElement('a');
        pageLink.className = 'page-link';
        pageLink.textContent = i;
        pageLink.href = '#';
        pageLink.onclick = function() {
            currentPage = i;
            displayCards();
        };
        pageItem.appendChild(pageLink);
        pagination.appendChild(pageItem);

        // Ajouter la classe 'active' à la page actuelle
        if (i === currentPage) {
            pageItem.classList.add('active');
        }
    }
}



        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                const productName = card.querySelector('.card-title') ? card.querySelector('.card-title').textContent.toLowerCase() : '';
                card.style.display = productName.includes(searchTerm) ? 'block' : 'none';
            });

            currentPage = 1; // Réinitialiser à la première page après recherche
            displayCards(); // Mettre à jour l'affichage après la recherche
        });

        // Afficher les cartes de la première page au chargement
        displayCards();
       

  function Description(element){
   let a = document.getElementById(element)
   document.getElementById(element).style.display == 'block'? a.style.display = 'none' : a.style.display = 'block' 
  }
        
    </script>
    <script>
document.getElementById('commentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    var comment = document.getElementById('exampleFormControlTextarea1').value;
    if (comment === '') {
        return; // Ne pas envoyer le formulaire
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'msg.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('response').style.display = 'block'; // Affiche le message "Message envoyé"
            document.getElementById('exampleFormControlTextarea1').value = ''; // Réinitialise le textarea
            setTimeout(function() {
            document.getElementById('response').style.display = 'none'; // Affiche le message "Message envoyé"

            }, 4000);
        } else {
            // Gérer les erreurs si nécessaire
        }
    };

    xhr.send('comment=' + encodeURIComponent(comment));
});
</script>

   
</body>
</html>

