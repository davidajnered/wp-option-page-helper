<?php
/**
 * Example of implementation in functions.php or similar.
 */

// Global variable
$optionPageHelper;

function create_option_page()
{
    global $optionPageHelper;

    $options = array(
        'page_title' => 'Settings Admin',                   // Page title
        'menu_title' => 'My Settings',                      // Menu title
        'capability' => 'manage_options',                   // Capability
        'menu_slug' => 'my-settings',                       // Menu slug
        'callback' => array($this, 'page'),                 // Callback object
        'form' => array(
            array(                                          // First section
                'name' => 'First Section',                  // Section name
                'fields' => array(
                    'first_option' => 'First option'        // Field
                ),
                'fields' => array(
                    'second_option' => 'Some other option'  // Field
                ),
            ),
            array(                                          // Second section
                'name' => 'Second Section',                 // Section name
                'fields' => array(
                    'uncountable_option' => 'Third option'  // Field
                ),
            ),
        ),
    );

    $optionPageHelper = new OptionPageHelper($options);
}

/**
 * Options page callback.
 *
 * This is where you add everything you want to the page.
 * The form with all your settings is generated automatically
 * when renderForm() is called.
 */
function page()
{
    global $optiopnPageHelper;

    $output = '
        <div class="wrap">
            <h2>My Option Page</h2>
            ' . $optionPageHelper->renderForm() . '
        </div>
    ';

    echo $output;
}

/**
 * Callback for an option field.
 *
 * The field callback will be generated automatically based on the id of your field.
 * If your field id is first_option, the callback will be firstOptionFieldCallback.
 *
 * The option key for your setting will also be generated automatically.
 * It will be prefixed with the menu_slug in your options array.
 * first_option will be saved as my-settings_first_option.
 */
function firstOptionFieldCallback()
{
    // Get saved field values
    $option = get_option('my-settings_first_option');

    // Build element and print
    echo '<input name="my-settings_first_option" value="' . $option . '">';
}

function secondOptionFieldCallback()
{
    // Build element and print
}

function uncountableOptionFieldCallback()
{
    // Build element and print
}
