<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/modules">
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
                <label for="logo">Logo</label>
                <input type="text" class="form-control" placeholder="Logo" name="logo" id="logo"/>
            </div>
            <div class="form-group">
                <label for="action">Action</label>
                <input type="text" class="form-control" placeholder="Action" name="action" id="action" required/>
            </div>
            <div class="form-group">
                <label for="is_active">Actief</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="1">Actief</option>
                    <option value="0">Niet actief</option>
                </select>
            </div>
            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" class="form-control" placeholder="Key" name="key" id="key" required/>
            </div>
            <div class="form-group">
                <label for="priority">Prioriteit</label>
                <input type="number" class="form-control" placeholder="Prioriteit" name="priority" id="priority" required/>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>