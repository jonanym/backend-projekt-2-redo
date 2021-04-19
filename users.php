
<?php include "header.php" ?>

<article>
    <h1>Bläddra i kontaktannonserna</h1>
    <p>Använd filter för att specifiera din sökning</p>
    <p>
        <!-- Formulär -->
        <form action="users.php" method="get">

        <!-- Radio buttons för sortering -->
        <label for="rich">Rika först</label>
        <input type="radio" name="salary" value="rich"><br>


        <label for="poor">Rika sist</label>
        <input type="radio" name="salary" value="poor"><br><br>

        <label for="pop">Populära först</label>
        <input type="radio" name="likes" value="pop"><br>

        <label for="notpop">Populära sist</label>
        <input type="radio" name="likes" value="notpop"><br><br>
            
        <!-- Dropdown för preference -->
        <label for="pref">Välj</label>
                <select name="pref">
                    <option value="male">Man</option>
                    <option value="male">Kvinna</option>
                    <option value="male">Annan</option>
                    <option value="male">Båda</option>
                    <option value="male">Allt</option>
                </select>

                <input type="submit" value="Filtrera">
        </form>
            
    </p>
    <?php include "fetch.php" ?>
</article>

<?php include "footer.php" ?>