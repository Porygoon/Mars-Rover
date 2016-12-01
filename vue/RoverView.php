<html xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" type="text/css" href="../vue/Rover.css">
    <script type="text/javascript" src="../controleur/script.js"></script>
    <body>
    <img src="../vue/Rover-site.png">
        <form method="post" action="/controleur/RoverControleur.php" id="form">
<input type="submit" value="↑" name="direction"/><br/>
<input type="submit" value="←" name="direction"/>
<input type="submit" value="↓" name="direction"/>
<input type="submit" value="→" name="direction"/><br/>

<?php
$rover = $map->getRover();
echo 'direction: '.$rover->getDirection().'<br/>';
echo ('Postion rover en Y: '.$rover->getPositionY().'<br/>');
echo ('Postion rover en X: '.$rover->getPositionX().'<br/>');
echo '<b>Score:</b>'.'<b>'.$scoreSave.'</b><br/>';
?>

<?php foreach ($map->getGrille() as $ligne) : ?>
    <?php foreach ($ligne as $case) : ?>
        <div id="gestionDeLaMap">
            <?php if ($case instanceof Rover) { ?>
                <img src="../vue/SpriteRover.php?direction=<?php echo $rover->getDirection();?>">
            <?php } elseif ($case instanceof Alien) { ?>
                <img src="../vue/alien.png">
            <?php } elseif ($case instanceof Obstacle) { ?>
                <img src="../vue/obstacle.png">
            <?php } else { ?>
                <?php echo($case);?>
            <?php } ?>
        </div>
    <?php endforeach; ?>
    <br />
<?php endforeach; ?>

<input type="hidden" value="<?php echo $rover->getPositionX(); ?>" name="X"/>
<input type="hidden" value="<?php echo $rover->getPositionY(); ?>" name="Y"/>
<input type="hidden" value="<?php echo $rover->getDirection(); ?>" name="directionRover"/>
<input type="hidden" value="<?php echo $YObstacle; ?>" name="YObstacleSave"/>
<input type="hidden" value="<?php echo $XObstacle; ?>" name="XObstacleSave"/>
<input type="hidden" value="<?php echo $XAlien; ?>" name="XAlienSave"/>
<input type="hidden" value="<?php echo $YAlien; ?>" name="YAlienSave"/>
<input type="hidden" value="<?php echo $scoreSave; ?>" name="scoreSave"/>
</form>
Vous avez du mal à prendre en main le Rover ? Alors <a href="#" onclick="tutoRover()">cliquez ici</a>.<br/>
<a href="../vue/newsletter.html">Cliquez ici pour vous inscrire à la newsletter et ainsi pouvoir être au courant des dernières nouvelles du Rover</a></br>
Si vous voyez un bug ou que vous avez une amélioration, n'hésitez pas à m'en faire part <a href="https://bitbucket.org/occitech/mars-rover/issues">ici</a>
    </body>
</html>
