<?php 
try{
 
$bd = new PDO ('mysql:host=localhost; dbname=site; charset=utf8;', 'root', '');
}
catch(Exception $e){
die('Une erreur a été trouvée: '. $e->getMessage());
}

if(isset($_POST['valider'])){
	if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['message'])){

		$nom = htmlspecialchars($_POST['nom']);
		$prenom =htmlspecialchars($_POST['prenom']);
		$message = htmlspecialchars($_POST['message']);

		$insertInfos = $bd -> prepare ('INSERT INTO contact (prenom, nom, message) VALUES (?, ?, ?)');
		$insertInfos ->execute(array($nom, $prenom, $message));

		$successMsg= "Vos données ont été bien envoyés"; 
	}else{
		$errorMsg = "Veuillez remplir les champs";
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <title>Site</title>
    <link href="Ressources/favicon.png" rel="icon">
 
</head>
<body>
    <!--Accueil et navbar-->
    <div class="navbar">
        <div class="contItems">
            <a href="#" class="items">Accueil</a>
            <a href="#sectionTxtImg" class="items">A propos</a>
            <a href="#creations" class="items">Créations</a>
            <a href="#contact" class="items">Contact</a>
        </div>
        <!--<img src="Ressources/menu.png" alt="logo menu" class="logoMenuImg">-->
    </div>

    <!--Accueil-->

    <div class="accueil">
        <h1>Découvrez mes créations</h1>
        <p class="sousTitreP">Dreams are not what you see in your sleep, Dreams are things which do not let you sleep</p>
    </div>

    <!--Section texte et image-->
    <h2 class="titreSection1">A propos du site web.</h2>
    <hr>
    <section id="sectionTxtImg" class="txtImg">
        <div class="flexContainerSection1">
            <div class="contImgSec1">
                <img src="Ressources/1.jpg" alt="Image de ville">
            </div>
            <div class="contTxtSec1">
                <h2>Le Secret Méconnu du Succès</h2>
                <p class="sousTitreSec1"> Un matin, il y a de</p>
                <p class="txtSec1">
                    cela des années, en traversant le campus du Collège
                    d’Etat de Warrensburg dans le Missouri, je me suis arrêté pour bavarder
                    avec un de mes amis, Franck Self. J’étais loin d’imaginer que cette
                    conversation allait bouleverser ma vie.
                    Si je n’avais pas recontré Franck ce matin-là, je serais probablement
                    devenu directeur de quelque lycée ou collège du Middle West.
                    </p>
                <hr>
                <p class="txtSec1">Il me raconta que, I’été précédent, il avait vendu des cours par
                    correspondance pour I’International Correspondance School. Je fus
                    impressionné quand il me dit qu’on lui payait une belle commission pour
                    les cours qu’il vendait, plus deux dollars par jour pour ses frais d’hôtel.
                    Deux dollars par jour, c’était tout ce que je pouvais espérer gagner comme
                    professeur. Franck Self me montrait en réalité une façon de bien mieux
                    gagner ma vie. J’étais emballé</p>
            </div>
        </div>
    </section>

    <!--Section Portfolio-->
    <h2 class="titrePortfolio">Voici un aperçu de mes créations.</h2>

    <hr class="diviseurPort">

    <section id="creations" class="portFolioImg">
        <div class="flexImgPortflolio">
            <div class="ImgPort">
                <img src="Ressources/A.jpg" alt="Image simple A">
            </div>
            <div class="ImgPort">
                <img src="Ressources/B.jpg" alt="Image simple B">
            </div>
            <div class="ImgPort">
                <img src="Ressources/C.jpg" alt="Image simple C">
            </div>
            <div class="ImgPort">
                <img src="Ressources/D.jpg" alt="Image simple D">
            </div>
            <div class="ImgPort">
                <img src="Ressources/E.jpg" alt="Image simple E">
            </div>
            <div class="ImgPort">
                <img src="Ressources/F.jpg" alt="Image simple F">
            </div>
            <div class="ImgPort">
                <img src="Ressources/G.jpg" alt="Image simple G">
            </div>
            <div class="ImgPort">
                <img src="Ressources/H.jpg" alt="Image simple H">
            </div>
            <div class="ImgPort">
                <img src="Ressources/I.jpg" alt="Image simple I">
            </div>
        </div>
    </section>
    <hr>

    <!--Section parallax-->

    <div class="paraScroll">
        <h3>Nature</h3>
    </div>

    <!---Section formulaire-->
<h2 class="titreForm">Contactez-nous pour plus d'informations</h2>
<hr>
<section class="formulaire">
    <form action="" id="contact" method="POST">
<?php
	if(isset($successMsg)){
?>
<div class="alert alert-success" role="alert">
<?php echo $successMsg; }
elseif(isset($errorMsg)){
?>
<div class="alert alert-danger" role="alert">
<?php echo $errorMsg; ?>
</div> 
<?php } 
?>
        <div class="row">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" placeholder="Prenom" name="prenom" require>
        </div>
        <div class="row">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" placeholder="Nom" name="nom" require>
        </div>
        <div class="row">
            <label for="msg">Message:</label>
            <textarea id="msg" placeholder="Message" name="message" require></textarea>
        </div>
        <div class="row">
            <input type="submit" class="subBtn" value="Envoyer" name="valider">
        </div>
    </form>
</section>
<!--Footer-->

<footer>
    <p>@ CopyRight, Tous droits réservés &#169; Ralisé par Regis F.M. ATTOLOU</p>
</footer>
</body>
</html>