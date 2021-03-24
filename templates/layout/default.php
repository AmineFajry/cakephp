<!DOCTYPE html>
<html lang = "fr">

<head>
    <?= $this->Html->charset();?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?=  $this->fetch('title')?>
    </title>
    <?= $this->Html->css('foundation'); ?>
</head>

<body>
  <?= $this->element('front/header') ?>

  <?=  $this->fetch('content')?>

  <?=  $this->element('front/footer')?>

  <?= $this->Flash->render() ?>

  <?= $this->Html->script([
        'https://code.jquery.com/jquery-2.1.4.min.js',
        'https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js'
  ]);?>

</body>

</html>
