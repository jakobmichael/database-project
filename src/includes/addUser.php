<form action="registration.php" method="post" class="form-body">
    <h2 class="formheader">Nutzer Hinzufügen</h2>
    <div class="row">
        <div class="input-container">
            <label>Vorname </label>
            <input name="vorname" type="text" placholder="Vorname">
        </div>
        <div class="input-container">
            <label>Nachname </label>
            <input name="nachname" type="text" placholder="Nachname">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>Straße </label>
            <input name="strasse" type="text" placholder="Straße">
        </div>
        <div class="input-container">
            <label>Hausnummer </label>
            <input name="hausnummer" type="text" placholder="Hausnummer">
        </div>
        <div class="input-container">
            <label>PLZ </label>
            <input name="plz" type="text" placholder="Plz">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>Email </label>
            <input name="email" type="email" placholder="Email-Adresse">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>Geburtsdatum </label>
            <input name="geburtsdatum" type="date" placholder="Geburtsdatum">
        </div>
    </div>
    <div class="form-footer">
        <button class="btn" name="zuruecksetzen" value="zuruecksetzen" type="reset">Zur&uuml;cksetzen</button>
        <button class="btn" type="submit">Create</button>
    </div>
</form>