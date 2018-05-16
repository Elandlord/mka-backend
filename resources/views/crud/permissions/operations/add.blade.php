<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/permissions">
            @csrf
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" placeholder="Naam" name="name" id="name" required/>
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" placeholder="Beschrijving" name="description" id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="display_name">Display Naam</label>
                <input type="text" class="form-control" placeholder="Display Naam" name="display_name" id="display_name" required/>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>