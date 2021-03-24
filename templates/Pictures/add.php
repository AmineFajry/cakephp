<?php
$this->assign('title', 'Ajouter une image');

?>

<div class="row">

    <?= /** @var \App\Model\Entity\Picture $pictureEntity */

    $this->Form->create($pictureEntity, ['type' => 'file']) ?>

    <?= $this->Form->control('name');?>

    <?= $this->Form->control('height');?>

    <?= $this->Form->control('width');?>

    <?= $this->Form->file('uploadfile');?>

    <?= $this->Form->control('description',
        [
            'label' => "Description"
        ])
    ?>

    <?= $this->Form->button('Valider',
        ['class' => 'button'])
    ?>

    <?php

    $uploadPath ='img/jpg/';

    $files = scandir($uploadPath, 0);

    echo "<h3>Vos Images :</h3><br/>";

    for($i = 2; $i < count($files); $i++)
        echo $files[$i] ."<br>".
            $this->Html->image("/img/jpg/" .  $files[$i], ['alt' => 'Fleur'])
            ."<br>".
            $this->Form->button('Supprimer',
                ['class' => 'alert button'])
            . "<br>";

    ?>

    <?= $this->Form->end() ?>


</div>

