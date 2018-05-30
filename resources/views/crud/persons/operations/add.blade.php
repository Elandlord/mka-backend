<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/persons">
            @csrf
            <div class="form-group">
                <label for="first_name">Aanhef</label>
                <input type="text" class="form-control" placeholder="Voornaam" name="first_name" id="first_name" required/>
            </div>
            <div class="form-group">
                <label for="last_name">Initialen</label>
                <input type="text" class="form-control" placeholder="Achternaam" name="last_name" id="last_name" required/>
            </div>
            <div class="form-group">
                <label for="insertion">Voornaam</label>
                <input type="text" class="form-control" placeholder="Tussenvoegsel" name="insertion" id="insertion"/>
            </div>
            <div class="form-group">
                <label for="email">Achternaam</label>
                <input type="text" class="form-control" placeholder="Emailadres" name="email" id="email" required/>
            </div>
            <div class="form-group">
                <label for="is_confirmed">Geslacht</label>
                <select class="form-control" name="is_confirmed" id="is_confirmed">
                    <option value="m">Man</option>
                    <option value="f">Vrouw</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" name="bio" id="bio" /></textarea>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>