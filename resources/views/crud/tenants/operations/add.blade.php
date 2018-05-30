<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="/tenants">
            @csrf
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" placeholder="Naam" name="name" id="name" required/>
            </div>
            <div class="form-group">
                <label for="subdomain">Subdomein</label>
                <input type="text" class="form-control" placeholder="Subdomein" name="subdomain" id="subdomain" required/>
            </div>
            <div class="form-group">
                <label for="hexcolor-primary">Primaire kleur</label>
                <input type="color" id="colorpicker-primary" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#5c42af"> 
                <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="primary_color" value="#5c42af" id="hexcolor-primary"></input>
            </div>
            <div class="form-group">
                <label for="hexcolor-primary-text-color">Primaire tekstkleur</label>
                <input type="color" id="colorpicker-primary-text" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff"> 
                <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="primary_color_text" value="#ffffff" id="hexcolor-primary-text-color"></input>
            </div>
            <div class="form-group">
                <label for="hexcolor-secondary-color">Secundaire kleur</label>
                <input type="color" id="colorpicker-secondary" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#e7cb00"> 
                <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="secondary_color" value="#e7cb00" id="hexcolor-secondary-color"></input>
            </div>
            <div class="form-group">
                <label for="hexcolor-secondary-text-color">Secundaire tekstkleur</label>
                <input type="color" id="colorpicker-secondary-text" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff"> 
                <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="secondary_color_text" value="#ffffff" id="hexcolor-secondary-text-color"></input>
            </div>
            <div class="form-group">
                <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
            </div>
        </form>
    </div>
</div>