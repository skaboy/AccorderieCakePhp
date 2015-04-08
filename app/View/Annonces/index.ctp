<!-- File: /app/View/Posts/index.ctp -->

<h1>Annonces</h1>

<table>
    <tr>
        <th>Id</th>
        
        <th>Nom</th>
        
        <th>Titre</th>
        <th>Description</th>
        <th>Temps de travail</th>
        <th>Date de l'annonce</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($annonces as $annonce): ?>
    <tr>
        <td><?php echo $annonce['Annonce']['id']; ?></td>
        <td><?php echo $annonce['User']['prenom']; ?></td>
        <td>
            <?php echo $this->Html->link($annonce['Annonce']['titre'],
            array('controller' => 'annonces', 'action' => 'view', $annonce['Annonce']['id'])); ?>
        </td>
        <td><?php echo $annonce['Annonce']['description']; ?></td>
        <td><?php echo $annonce['Annonce']['temps_requis']; ?></td>
        <td><?php echo $annonce['Annonce']['date_post']; ?></td>
        <td>
        
         <?php echo $this->Form->postLink(
                'Signaler cette annonce',
                array('action' => 'signaler', $annonce['Annonce']['id']));
         ?>
            
         <?php
         if($annonce['Annonce']['user_id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
         	echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $annonce['Annonce']['id'],'index'),
                array('confirm' => "Êtes-vous sûr ?"));
         echo " ";
			echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $annonce['Annonce']['id'])
            );
         } ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($annonce); ?>
</table>

<?php echo $this->Html->link(
                'Acceder aux Demandes',
                array('action' => 'demande')
            ); ?>
<br>

<?php echo $this->Html->link(
                'Acceder aux Offres',
                array('action' => 'offre')
            ); ?>