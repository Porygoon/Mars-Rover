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

$ligne = range(10, 1);
$colonne = range(1, 10);

foreach ($ligne as $ligneIndex) {
    $grille[$ligneIndex] = $colonne;
}

$positionRover = $rover->getPosition();
$grille[$positionRover['Y']][$positionRover['X']] = '<img src="../vue/rover.png"/>';
$grille[$YObstacle][$XObstacle] = '<img src="../vue/obstacle.png"/>';
$grille[$positionAlien['Y']][$positionAlien['X']] = '<img src="../vue/alien.png"/>';

?>

            <?php foreach ($grille as $ligne) : ?>
                <?php foreach ($ligne as $case) : ?>
                    <div id="test3"><?php echo($case);?></div>
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
