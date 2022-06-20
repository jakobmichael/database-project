<form action="registration.php" method="post" class="form-body">
    <h2 class="formheader">Buch Hinzufügen</h2>
    <div class="row">
        <div class="input-container">
            <label>Titel </label>
            <input name="titel" type="text" placholder="Titel">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>Beschreibung</label>
            <textarea name="description"> </textarea>
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>ISBN </label>
            <input name="isbn" type="text" placholder="ISBN">
        </div>
        <div class="input-container">
            <label>Seitenzahl </label>
            <input name="seitenzahl" type="text" placholder="Seitenzahl">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label>Erschienen </label>
            <input name="erschienen" type="date" placholder="Erschienen">
        </div>
    </div>

    <div class="row">
        <div class="input-container">
            <label>LagerplatzID </label>
            <input name="lagerplatzid" type="text" placholder="LagerplatzID">
        </div>
        <div class="input-container">
            <label>VerlagID </label>
            <input name="verlagid" type="text" placholder="VerlagID">
        </div>
    </div>

    <div class="row">
        <div class="input-container">
            <label>GenreID </label>
            <input name="genreid" type="text" placholder="GenreID">
        </div>
        <div class="input-container">
            <label>AutorID </label>
            <input name="autorid" type="text" placholder="AutorID">
        </div>
    </div>

    <div class="form-footer">
        <button class="btn" name="zuruecksetzen" value="zuruecksetzen" type="reset">Zur&uuml;cksetzen</button>
        <button class="btn" name="addBook" type="submit">Create</button>
    </div>
</form>