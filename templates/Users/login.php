<?php
$this->assign('title','Ma page');
?>

<div class="row">

    <?= /** @var \App\Model\Entity\User $user */
    $this->Form->create($user) ?>

    <?= $this->Form->control('email',
        [
            'label' => "Indiquez Votre Email",
            'autocomplete' => false
        ]) ?>

    <?= $this->Form->control('password',
        [
            'label' => "Votre mot de passe "
        ]) ?>

    <?= $this->Form->button('Valider',
        ['class' => 'button'])
    ?>

    <?= $this->Form->end() ?>



</div>


