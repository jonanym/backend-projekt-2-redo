
<?php include "header.php" ?>

<article>
    <h1>Annonser</h1>
    <p>Använd filter för att specifiera din sökning</p>
    <p>
        <!-- Formulär -->
        <form action="users.php" method="get">

        <!-- Radio buttons för sortering -->
        <label for="rika">Rika först</label>
        <input type="radio" name="salary1" value="rika"><br>

        <label for="fattiga">Rika sist</label>
        <input type="radio" name="salary2" value="fattiga"><br><br>

        <!--
        <label for="pop">Populära först</label>
        <input type="radio" name="likes" value="pop"><br>

        <label for="notpop">Populära sist</label>
        <input type="radio" name="likes" value="notpop"><br><br>
        -->
            
        <!-- Dropdown för preference -->
        <label for="pref">Välj</label>
                <select name="pref">
                    <option value="hidden" value="empty"></option>
                    <option value="male" name="male">Man</option>
                    <option value="female">Kvinna</option>
                    <option value="else">Annan</option>
                    <option value="both">Båda</option>
                    <option value="all">Allt</option>
                </select>

                <input type="submit" value="Filtrera">
        </form>
            
    </p>
    <?php include "hämta.php" ?>
</article>

<?php include "footer.php" ?>