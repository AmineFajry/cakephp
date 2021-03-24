<?php
use phpDocumentor\Reflection\Types\Boolean;
$this->assign('title','Ma page');
$page = $this->request->getQuery('page');
if($page == null || $page <= 0) {
    $page = 1;
}
$tabpicture = array_slice($tabpicture, ($page*10)-10, 10);


?>

<div class="row">

    <div class="medium-7 large-6 columns">
        <h1>Close Your Eyes and Open Your Mind</h1>
        <p class="subheader">There is beauty in space, and it is orderly. There is no weather, and there is regularity. It is predictable. Everything in space obeys the laws of physics. If you know these laws, and obey them, space will treat you kindly.</p>
        <button class="button">Take a Tour</button>
        <button class="button">Start a free trial</button>
    </div>

    <div class="show-for-large large-3 columns">
        <?php
        echo $tabpicture[0]['name'];
        echo $this->Html->image("/img/jpg/".$tabpicture[0]['name'], ['alt' => $tabpicture[0]['name']]); ?>
    </div>

    <div class="medium-5 large-3 columns">
        <div class="callout secondary">
            <form>
                <div class="row">
                    <div class="small-12 columns">
                        <label>Find Your Dream Planet
                            <input type="text" placeholder="Search destinations">
                        </label>
                    </div>
                    <div class="small-12 columns">
                        <label>Number of Moons
                            <input type="number" placeholder="Moons required">
                        </label>
                        <button type="submit" class="button">Search Now!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<div class="row column">
    <hr>
</div>

<div class="row column">
    <p class="lead">Trending Planetary Destinations</p>
</div>

<div class="row small-up-1 medium-up-2 large-up-3">
    <?php

    $tabpicture = array_slice($tabpicture, 1, 7);

    /** @var TYPE_NAME $verif */
    $verif = false;

    foreach($tabpicture as $tab){

        if(count($tabpicture) > 7 ){
            $verif = true ;
        }


        echo ('<div class="column"> <div class="callout"> <p>');
        echo $tab['name'];
        echo('</p> <p>');

        echo $this->Html->image("/img/jpg/".$tab['name'], ['alt' => $tab['name']]);

        echo('</p>');

        echo ' <p>'.$tab['created'].'</p>' ;

        echo $this->Html->link("Download", "/img/jpg/" . $tab['name'], array('download' => $tab['name'], 'class' => ''));

        echo('<p class="lead">');


        if($tab['description'] != NULL){
            echo $tab['description'];
        }else{
            echo 'Copernican Revolution caused an uproar';
        }

        echo('
        </p>
        <p class="subheader">Find Earth-like planets life outside the Solar System</p>
        </div> </div>'
        );

    }
    ?>
</div>
    <?php
    if(!$verif)
    {
        echo('<div class="row column"> <a>');
        echo $this->Html->link(
            'Previous',
            ['controller' => 'Pictures', 'action' => 'index' . '?page=' . ($page-1) ],
            [
                'class' => 'button hollow expanded',
                'title' => 'Previous'
            ]);
        echo('</a> </div>');

    }else{

        echo('<div class="row column"> <a>');
        echo $this->Html->link(
            'Next',
            ['controller' => 'Pictures', 'action' => 'index' . '?page=' . ($page+1) ],
            [
                'class' => 'button hollow expanded',
                'title' => 'Next'
            ]);
        echo('</a> <a>');
        echo $this->Html->link(
            'Previous',
            ['controller' => 'Pictures', 'action' => 'index' . '?page=' . ($page-1) ],
            [
                'class' => 'button hollow expanded',
                'title' => 'Previous'
            ]);
        echo('</a> </div>');

    }
    ?>



