<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/persons">
            @csrf
            <div class="form-group">
                <label for="salutation">Aanhef</label>
                <input type="text" class="form-control" placeholder="Aanhef" name="salutation" id="salutation" required/>
            </div>
            <div class="form-group">
                <label for="initials">Initialen</label>
                <input type="text" class="form-control" placeholder="Initialen" name="initials" id="initials" required/>
            </div>
            <div class="form-group">
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" placeholder="Voornaam" name="first_name" id="first_name"/>
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="text" class="form-control" placeholder="Achternaam" name="last_name" id="last_name" required/>
            </div>
            <div class="form-group">
                <label for="insertion">Tussenvoegsel</label>
                <input type="text" class="form-control" placeholder="Tussenvoegsel" name="insertion" id="insertion" required/>
            </div>
            <div class="form-group">
                <label for="gender">Geslacht</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="m">Man</option>
                    <option value="f">Vrouw</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" name="bio" id="bio" placeholder="Bio"/></textarea>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Geboortedatum</label>
                <input type="date" class="form-control" placeholder="Geboortedatum" name="date_of_birth" id="date_of_birth" required/>
            </div>
            <div class="form-group">
                <label for="phone_number_private">Telefoonnummer (Prive)</label>
                <input type="text" class="form-control" placeholder="Telefoonnummer (Prive)" name="phone_number_private" id="phone_number_private" required/>
            </div>
            <div class="form-group">
                <label for="email_private">Emailadres (Prive)</label>
                <input type="text" class="form-control" placeholder="Emailadres (Prive)" name="email_private" id="email_private" required/>
            </div>
            <div class="form-group">
                <label for="address">Adres</label>
                <input type="text" class="form-control" placeholder="Adres" name="address" id="address" required/>
            </div>
            <div class="form-group">
                <label for="address2">Adres 2</label>
                <input type="text" class="form-control" placeholder="Adres 2" name="address2" id="address2" required/>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" placeholder="District" name="district" id="district" required/>
            </div>
            <div class="form-group">
                <label for="city">Plaats</label>
                <input type="text" class="form-control" placeholder="Plaats" name="city" id="city" required/>
            </div>
            <div class="form-group">
                <label for="postal_code">Postcode</label>
                <input type="text" class="form-control" placeholder="Postcode" name="postal_code" id="postal_code" required/>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>