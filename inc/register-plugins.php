<?php
function tap_register_required_plugins(){

$plugin = array(
  array(
    'name'         => 'Advanced Custom Fields', // The plugin name.
    'slug'         => 'advanced-custom-fields', // The plugin slug (typically the folder name).
    'required'     => true, // If false, the plugin is only 'recommended' instead of required.
  )
);

$config = array(
  'id'           => 'tap_tgmpa',             // Unique ID for hashing notices for multiple instances of TGMPA.
  'menu'         => 'tgmpa-install-plugins', // Menu slug.
  'parent_slug'  => 'themes.php',            // Parent menu slug.
  'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
  'has_notices'  => true,                    // Show admin notices or not.
  'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
);
tgmpa($plugin, $config);
}
