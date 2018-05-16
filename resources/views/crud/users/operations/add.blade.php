<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/users">
            @csrf
            <div class="form-group">
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" placeholder="Voornaam" name="first_name" id="first_name" required/>
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="text" class="form-control" placeholder="Achternaam" name="last_name" id="last_name" required/>
            </div>
            <div class="form-group">
                <label for="insertion">Tussenvoegsel</label>
                <input type="text" class="form-control" placeholder="Tussenvoegsel" name="insertion" id="insertion"/>
            </div>
            <div class="form-group">
                <label for="email">Emailadres</label>
                <input type="text" class="form-control" placeholder="Emailadres" name="email" id="email" required/>
            </div>
            <div class="form-group">
                <label for="is_confirmed">Bevestigd</label>
                <select class="form-control" name="is_confirmed" id="is_confirmed">
                    <option value="true">Bevestigd</option>
                    <option value="false">Niet bevestigd</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>