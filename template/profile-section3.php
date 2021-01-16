<section class="bg-light">
    <h1> LOGOUT</h1>
    <div id="blackline"></div>
    <p id="ppar">Se si desidera uscire dall'account e' possibile cliccare sul seguente bottone </br>
    per accedere nuovamente sara' necessario inserire le credenziali dell'account.
</p>
    <form action="logout.php" method="POST">
        <div id="row" class="form-group">
            <fieldset>
                <input type="hidden" name="logout" value="true">
                <button id="btn" class="btn btn-outline-danger" type="submit">Logout</button>
            </fieldset>
        </div>
    </form>
</section>