<!-- navigation -->
<div class="col-lg-12 space-inside-sm">
    <!-- header -->
    <p class="space-inside-sides-md text-color-main space-outside-sm pointer collapseAble text-color-secondary text-semi-bold" data-toggle="collapse" data-target="#core-admin">
        Entiteiten  
        <i id="core-admin-caret-right" class="material-icons pointer text-hover-light transition-fast" style="position: relative; top: 9px; left: 20px;">keyboard_arrow_right</i>
    </p>

    <div id="core-admin" class="collapse in" v-cloak>
        <nav-link id="/customers" icon="group"> Customers </nav-link>
        <nav-link id="/tenants" icon="group"> Tenants </nav-link>
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
        <nav-link id="/test" icon="build"> Test </nav-link>
        <nav-link id="/nogeentest" icon="feedback"> Nog een test </nav-link>
    </div>  
</div>