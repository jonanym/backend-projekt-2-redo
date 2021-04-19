<?php include "header.php" ?>


<article>
    <h1>Välkomstsidan</h1>
    <a href="index.php?stage=signin"><input type="button" value="logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="registrera dig" id="registbut"></a><br><br><br>
    
    <?php 
    // Register click INCLUDE register formulär i php
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup')) {
        include "uppg4.php";
    }
    // Login click INCLUDE register formulär i php
    else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin')) {
        //header('Refresh:1; url=index.php');
        include "uppg2.php";
    }
    ?>
</article>



<article>
    <h1>Uppg 1</h1>
    <?php include "uppg1.php" ?>
</article>

<article>
    <h1>Uppg 2</h1>
    <?php include "uppg2.php" ?>
</article>

<article>
    <h1>Uppg 3</h1>
    <?php include "uppg3.php" ?>
</article>

<article>
    <h1>Uppg 4</h1>
    <?php include "uppg4.php" ?>
</article>

<?php include "footer.php" ?>
