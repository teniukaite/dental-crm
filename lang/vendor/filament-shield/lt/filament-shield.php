<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'Pavadimas',
    'column.guard_name' => 'Apsaugos pavadinimas',
    'column.roles' => 'Rolės',
    'column.permissions' => 'Leidimai',
    'column.updated_at' => 'Atnaujinta',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'Pavadimas',
    'field.guard_name' => 'Apsaugos pavadinimas',
    'field.permissions' => 'Leidimai',
    'field.select_all.name' => 'Pasirinkti visus',
    'field.select_all.message' => 'Įjungti visus šiuo metu <span class="text-primary font-medium">įjungtus</span> šios rolės leidimus',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'Leidimai',
    'nav.role.label' => 'Rolės',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'rolę',
    'resource.label.roles' => 'Rolės',

    /*
    |--------------------------------------------------------------------------
    | Section & Tabs
    |--------------------------------------------------------------------------
    */

    'section' => 'Modeliai',
    'resources' => 'Resursai',
    'widgets' => 'Valdikliai',
    'pages' => 'Puslapiai',
    'custom' => 'Individualūs leidimai',

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    'forbidden' => 'Jūs neturite prieigos teisių pasiekti šio puslapio',

    /*
    |--------------------------------------------------------------------------
    | Resource Permissions' Labels
    |--------------------------------------------------------------------------
    */

    'resource_permission_prefixes_labels' => [
        'view' => 'Peržiūrėti',
        'view_any' => 'Peržiūrėti bet kurį',
        'create' => 'Sukurti',
        'update' => 'Atnaujinti',
        'delete' => 'Ištrinti',
        'delete_any' => 'Ištrinti bet kurį',
        'force_delete' => 'Ištrinti negrįžtamai',
        'force_delete_any' => 'Ištrinti bet kurį negrįžtamai',
        'restore' => 'Atkurti',
        'reorder' => 'Perrikiuoti',
        'restore_any' => 'Atkurti bet kurį',
        'replicate' => 'Kopijuoti',
    ],
];
