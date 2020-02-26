<h1> Ajout client </h1>

<?php echo validation_errors(); ?>
<?php echo form_open('client/create'); ?>

<label for="nomClient">Nom</label>
<input type="input" name="nomClient" />

<label for="numClient">n° Client</label>
<input type="number" name="numClient" />

<label for="adresse">Adresse</label>
<input type="input" name="adresse" />

<label for="numTel">Téléphone</label>
<input type="tel" name="numTel" />

<label for="mail">Mail</label>
<input type="mail" name="mail" />

<input type="submit" name="submit" value="créer" />

</form>



