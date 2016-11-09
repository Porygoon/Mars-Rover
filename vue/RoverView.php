<html>
    <link rel="stylesheet" type="text/css" href="../vue/Rover.css">
    <body>
        <form method="post" action="/controleur/RoverControleur.php" id="form">
<input type="submit" value="↑" name="direction"/><br/>
<input type="submit" value="←" name="direction"/>
<input type="submit" value="↓" name="direction"/>
<input type="submit" value="→" name="direction"/><br/>

<?php

echo 'direction: '.$rover->getDirection().'<br/>';
echo ('Postion rover en Y: '.$rover->getPositionY().'<br/>');
echo ('Postion rover en X: '.$rover->getPositionX().'<br/>');
echo '<b>Score:</b>'.'<b>'.$scoreSave.'</b><br/>';

//$longueur = range(10, 1);
//$largeur = range(1, 10);
//
//
//
//foreach ($ligne as $ligneIndex) {
//    $grille[$ligneIndex] = $colonne;
//}
//
//$positionRover = $rover->getPosition();
//$grille[$positionRover['Y']][$positionRover['X']] = '<img src="../vue/rover.png"/>';
//$grille[$YObstacle][$XObstacle] = '<img src="../vue/obstacle.png"/>';
//$grille[$positionAlien['Y']][$positionAlien['X']] = '<img src="../vue/alien.png"/>';
//print_r ($map->getGrille());
?>

<?php foreach ($map->getGrille() as $ligne) : ?>
    <?php foreach ($ligne as $case) : ?>
        <?php if ($case instanceof Rover) { ?>
            <div id="gestionDeLaMap"><img src="../vue/rover.png"></div>
        <?php } elseif ($case instanceof Alien) { ?>
            <div id="gestionDeLaMap"><img src="../vue/alien.png"></div>
        <?php } elseif ($case instanceof Obstacle) { ?>
            <div id="gestionDeLaMap"><img src="../vue/obstacle.png"></div>
        <?php } else { ?>
            <div id="gestionDeLaMap"><?php echo($case);?></div>
        <?php } ?>
    <?php endforeach; ?>
    <br />
<?php endforeach; ?>

<input type="hidden" value="<?php echo $positionRover['X']; ?>" name="X"/>
<input type="hidden" value="<?php echo $positionRover['Y']; ?>" name="Y"/>
<input type="hidden" value="<?php echo $rover->getDirection(); ?>" name="directionRover"/>
<input type="hidden" value="<?php echo $YObstacle; ?>" name="YObstacleSave"/>
<input type="hidden" value="<?php echo $XObstacle; ?>" name="XObstacleSave"/>
<input type="hidden" value="<?php echo $XAlien; ?>" name="XAlienSave"/>
<input type="hidden" value="<?php echo $YAlien; ?>" name="YAlienSave"/>
<input type="hidden" value="<?php echo $scoreSave; ?>" name="scoreSave"/>
</form>
    </body>
</html>
