<!-- Fichier : /app/View/Utilisateurs/view.ctp -->

<div class="table-responsive">

    <table class="table table-hover" style="text-align:center;">
        <thead>
        <tr>
            <th colspan="99"><legend><?php echo 'Profil de '.h($user['User']['username']); ?> </th>
        </tr>
        </thead>
        <tbody>

        <tr class ="active">
            <td rowspan="99" class="td_avatar">
<!--                <img src="--><?php //echo strtolower(h($user['User']['avatar'])) ?><!-- " alt="Avatar" height="150" width="150  ">-->
                <?php echo $this->Html->image('avatars/'.$user['User']['avatar'],array(
                    "alt"=> "Avatar",
                    "class" => 'img_avatar'
                )) ;
                ?>
            </td>
        </tr>

        <tr class="active">
            <td><strong>Identifiant : </strong></td><td><?php echo strtolower(h($user['User']['username'])); ?></td>
        </tr>
        <tr>
            <td><strong>Nom : </strong></td><td><?php echo strtoupper($user['User']['nom']); ?></td>
        </tr>
        <tr class="active">
            <td><strong>Prénom : </strong></td><td><?php echo h($user['User']['prenom']); ?></td>
        </tr>
        <?php if(AuthComponent::user('role') == "admin" || AuthComponent::user('id')==$user['User']['id'] ){ ?>
        <tr>
            <td><strong>Mail : </strong></td><td><?php echo h($user['User']['mail']); ?></td>
        </tr>
        <tr class="active">
            <td><strong>Adresse : </strong></td><td><?php echo h($user['User']['adresse']); ?></td>
        </tr>
        <tr>
            <td><strong>Ville : </strong></td><td><?php echo h($user['User']['ville']); ?></td>
        </tr>
        <tr class="active">
            <td><strong>Code Postal : </strong></td><td><?php echo h($user['User']['code_postal']); ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><strong>Présentation : </strong></td><td><?php echo h($user['User']['presentation']); ?></td>
        </tr>
        <tr>
            <td><strong>Type de service favoris : </strong></td>
            <td>
                <?php if(isset($favType['libelle'])){
                    echo h($favType['libelle']);
                }else{ echo $favType;} ?>
            </td>
        </tr>
        <tr class="active">
            <td><strong>Credit temps : </strong></td><td><?php echo h($user['User']['credit_temps']); ?></td>
        </tr
        <?php if(AuthComponent::user('role') == "admin"){ ?>
        <tr class="">
            <td><strong>Rôle : </strong></td><td><?php echo strtoupper($user['User']['role']); ?></td>
        </tr>

        <tr class="active <?php if($user['User']['offre_de_bienvenue'] == "oui"){echo 'success';}else{echo 'danger';} ?>">
            <td><strong>Compte validé : </strong></td><td><?php echo h($user['User']['offre_de_bienvenue']); ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="table table-hover">
        <thead>
        <tr>

            <th>Annonce réalisée</th>
            <th> Note sur 10</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if(isset($evaluations)){
            foreach($evaluations as $evaluation){
                ?>
                <tr>

                    <?php
                echo "<td>".$evaluation['Annonce']['titre']."</td>";
                echo "<td>".$evaluation['Evaluation']['note']."</td></tr>";


            }}

        ?>

        </tbody>
    </table>
</div>