<?php
    include 'functionCrud.php';

    if(isset($_GET["id_argonote"]))
    {
      $id = $_GET['id_argonote'];
      $delete = deleteArgonote($id);
    }
    
    if(isset($_GET['action']) && $_GET['action'] == 'suppression')
    {
      $delete;
    }

    if($_POST)
    {
      $nom = $_POST['nom'];
      createArgonote($nom);      
    }    
    $users = readAllArgonotes();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Challenge Wild Code School</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>
<body>
  <!-- Header section -->
  <header>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
  </header>

  <!-- Main section -->
  <main>
    
    <!-- New member form -->
    <h2 class="mt-5">Ajouter un(e) Argonaute</h2>
    <form class="new-member-form" method="post">
      <label for="name">Nom de l&apos;Argonaute</label>
      <input class="mb-3" id="name" name="nom" type="text" placeholder="Charalampos" required/>
      <button id="submit" type="submit">Envoyer</button>
    </form>
    
    <!-- Member list -->
    <h2>Membres de l'équipage</h2>
        <section class="row member-list d-flex justify-content-sm-start justify-content-center mx-auto mt-5 mb-5">
          <?php
            foreach($users as $user): ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-10 d-flex justify-content-between border-right border-left">
                <div class="col-8"><?= $user[1] ?></div>
                <a href='?action=suppression&id_argonote=<?= $user[0] ?>' onclick="return(confirm('Etes-vous sûr de retirer cet Argonote ?'))"><i class='fas fa-times'></i></a>
              </div>
          <?php
            endforeach;
          ?>
        </section>
  </main>

  <footer>
    <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
  </footer>

  <script type="text/javascript" src="js/app.js"></script>

</body>

</html>