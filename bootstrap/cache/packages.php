<?php return array (
  'consoletvs/charts' => 
  array (
    'providers' => 
    array (
      0 => 'ConsoleTVs\\Charts\\ChartsServiceProvider',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'kreait/laravel-firebase' => 
  array (
    'providers' => 
    array (
      0 => 'Kreait\\Laravel\\Firebase\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'FirebaseAuth' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseAuth',
      'FirebaseDatabase' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseDatabase',
      'FirebaseDynamicLinks' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseDynamicLinks',
      'FirebaseFirestore' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseFirestore',
      'FirebaseMessaging' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseMessaging',
      'FirebaseRemoteConfig' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseRemoteConfig',
      'FirebaseStorage' => 'Kreait\\Laravel\\Firebase\\Facades\\FirebaseStorage',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/ui' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Ui\\UiServiceProvider',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
  ),
  'mohammad-fouladgar/eloquent-builder' => 
  array (
    'providers' => 
    array (
      0 => 'Fouladgar\\EloquentBuilder\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'EloquentBuilder' => 'Fouladgar\\EloquentBuilder\\Facade',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
);