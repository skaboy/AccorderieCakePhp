<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo ("La Marmite"); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	//echo $this->Html->css('cake.generic');
    //echo $this->Html->css('ourCss');
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap-theme');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->css('customStyle');
	echo $this->Html->script('jquery-2.2.0.min');
	echo $this->Html->script('jquery-ui.1.11.4');
	echo $this->Html->script('datepicker-fr.js');
	echo $this->Html->script('bootstrap');
	echo $this->Html->script('script');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>

	<meta name="viewport" content="initial-scale=1" maximum-scale="1.0">

</head>

<?php
	$id_user = 0;
	if(AuthComponent::user('id') != null){
		$id_user = AuthComponent::user('id');
	}
	$URI = $this->Html->url("/", true);
	$loading1 = 'loading.gif';
	$loading2 = 'loading2.gif';


/*	function params($a, $b, $c){

		return $a.", \"".$b."\", \"".$c."\"";
	}*/
?>

<body>

<div id="container">

	<?php echo $this->Html->image('header-maquette.png', array('alt' => 'Header', 'width' => '100%')); ?>

	<?php	if(AuthComponent::user('id') == null)
	{
	?>
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php echo $this->Html->link('Accueil','/', 'class="navbar-brand"'); ?>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><?php echo $this->Html->link('Inscription','/users/add'); ?></li>
				<li><?php echo $this->Html->link('Connexion','/users/login'); ?></li>
				<li><?php echo $this->Html->link('Nous Contacter','/contacts/index'); ?></li>
			</ul>
		</div><!-- /.navbar-collapse -->
		<?php
		}
		else
		{
		?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo $this->Html->link('Accueil','/', 'class="navbar-brand"'); ?>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Annonces<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Ajouter','/annonces/add'); ?></li>
							<li><?php echo $this->Html->link('Demandes','/annonces/demande'); ?></li>
							<li><?php echo $this->Html->link('Offres','/annonces/offre'); ?></li>
							<li><?php echo $this->Html->link('Rechercher','/annonces/'); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon profil<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Voir mon profil','/users/view/'.AuthComponent::user('id')); ?></li>
							<li><?php echo $this->Html->link('Editer mon profil','/users/edit/'.AuthComponent::user('id')); ?></li>
							<li><?php echo $this->Html->link('Mes annonces','/annonces/mes_annonces'); ?></li>
							<li><?php echo $this->Html->link('Mon Historique','/annonces/mon_historique'); ?></li>
						</ul>
					</li>

					<?php } if(AuthComponent::user('role') == "admin") { ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link('Liste utilisateurs','/users/'); ?></li>
								<li><?php echo $this->Html->link('Liste annonces','/annonces/'); ?></li>
								<li><?php echo $this->Html->link('Annonces à valider','/annonces/annonce_pas_valide/'); ?></li>
								<li><?php echo $this->Html->link('Utilisateurs à valider','/users/utilisateur_pas_valide/'); ?></li>
								<li><?php echo $this->Html->link('Gestion des annonces ','/annonces/manage'); ?></li>
							</ul>
						</li>


					<?php }
					if(AuthComponent::user('id') != null) {?>
					<li><?php echo $this->Html->link('Nous Contacter','/contacts/index'); ?></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="alert-danger"><?php echo $this->Html->link('Déconnexion',array('controller'=>'users','action' => 'logout')); ?></li>
					<li class="alert-warning"><?php  echo $this->Html->link('Actualiser votre crédit',array('controller'=>'users','action' => 'getCredit', AuthComponent::user('id'))); ?></li>
					<li class="alert-success"><noscript>Merci d'activer JavaScript</noscript>
						<a id="time"><?php
							/*
							 * Ne pas inserer d'espace ou autre caractère dans l'ID 'time'.
							 * Sinon le loading.gif ne sera pas chargé :(
							 */

							 //echo "<b>".$utilisateur[0]['users']['credit_temps']."</b> Heures";
							?></a>
					</li></ul> <?php
				}
				?>
				</ul>
			</div>
		</nav>

		<div id="content" class="container-fluid" style="overflow-x: auto;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>

		<div class="panel-footer">
			Copyright <?php echo "&copy;".date('Y'); ?> La Marmite. Tous droits réservés.
		</div>

</div>
<?php
echo "<input type='hidden' id='update_uri' value='$URI'>";
echo "<input type='hidden' id='update_id_user' value='$id_user' >";
echo "<input type='hidden' id='update_loading_credit_temps' value='$loading1'>";
echo "<input type='hidden' id='update_loading_page_dynamique'value='$loading2'>";
?>
</body>
</html>
