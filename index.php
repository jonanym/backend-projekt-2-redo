<?php include "header.php" ?>


<article>
    <h1>Välkomstsidan</h1>
    <a href="index.php?stage=signin"><input type="button" value="logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="registrera dig" id="registbut"></a><br><br><br>
    
    <?php 
    // Register click INCLUDE register formulär i php
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup') || isset($_REQUEST['submit'])) {
        include "uppg4.php";
    }
    // Login click INCLUDE register formulär i php
    else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin') || isset($_REQUEST['login'])) {
        //header('Refresh:1; url=index.php');
        include "uppg2.php";
    }

    if (!isset($_SESSION['user'])){
        print("<p>Du är för tillfället inte inloggad</p>");
    include "welcome.php";
    } else {
        print("Du är nu inloggad som: " .$_SESSION['user'] . "<br>");
        print("<a href='./logout.php' id='logout'>Logout</a>");
    }
    ?>
</article>



<article>
    <!--<h1>Uppg 2</h1>-->
    <?php //include "uppg2.php" ?>
</article>

<article>
    <!--<h1>Uppg 3</h1>-->
    <?php //include "uppg3.php" ?>
</article>

<article>
    <!--<h1>Uppg 4</h1>-->
    <?php //include "uppg4.php" ?>
</article>

<?php include "footer.php" ?>
