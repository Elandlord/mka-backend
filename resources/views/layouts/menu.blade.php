<!-- navigation -->
<div class="col-lg-12 space-inside-sm">
    <!-- header -->
    <p class="space-inside-sides-md text-color-main space-outside-sm pointer collapseAble text-color-secondary text-semi-bold" data-toggle="collapse" data-target="#core-admin">
        Tenants  
        <i id="core-admin-caret-right" class="material-icons pointer text-hover-light transition-fast" style="position: relative; top: 9px; left: 20px;">keyboard_arrow_right</i>
    </p>

    <div id="core-admin" class="collapse in" v-cloak>
        <nav-link id="/tenants" icon="group"> Tenants </nav-link>
    </div>  
</div>

<!-- content divider -->
<div style="height: 4px;" class="  col-lg-12 space-inside-xs">
    <div style="height: 4px;" class="bg-main-darken-xs"></div>
</div>

<div class="col-lg-12 space-inside-sm">
    <!-- header -->
    <p class="space-inside-sides-md text-color-main space-outside-sm pointer collapseAble text-color-secondary text-semi-bold" data-toggle="collapse" data-target="#users">
        Gebruikers  
        <i id="users-caret-right" class="material-icons pointer text-hover-light transition-fast" style="position: relative; top: 9px; left: 20px;">keyboard_arrow_right</i>
    </p>

    <div id="users" class="collapse in" v-cloak>
        {{-- <nav-link id="/persons" icon="account_circle"> Personen </nav-link> --}}
        <nav-link id="/customers" icon="group"> Customers </nav-link>
        <nav-link id="/users" icon="account_circle"> Users </nav-link>
    </div>  
</div>

<!-- content divider -->
<div style="height: 4px;" class="  col-lg-12 space-inside-xs">
    <div style="height: 4px;" class="bg-main-darken-xs"></div>
</div>

<div class="col-lg-12 space-inside-sm">
    <!-- header -->
    <p class="space-inside-sides-md text-color-main space-outside-sm pointer collapseAble text-color-secondary text-semi-bold" data-toggle="collapse" data-target="#overig">
        Overig  
        <i id="overig-caret-right" class="material-icons pointer text-hover-light transition-fast" style="position: relative; top: 9px; left: 20px;">keyboard_arrow_right</i>
    </p>

    <div id="overig" class="collapse in" v-cloak>
        {{-- <nav-link id="/persons" icon="account_circle"> Personen </nav-link> --}}
        <nav-link id="/modules" icon="add_box"> Modules </nav-link>
    </div>  
</div>