<?php
/**
 * Written by David Ajnered
 */
class OptionPage
{
    /**
     * @var object
     */
    private $optionPageHelper;

    /**
     * Construct.
     */
    public function __construct()
    {
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

        $this->optionPageHelper = new SettingsHelper($options);
    }

    /**
     * Options page callback.
     *
     * This is where you add everything you want to the page.
     * The form with all your settings is generated automatically
     * when renderForm() is called.
     */
    public function page()
    {
        $output = '
            <div class="wrap">
                <h2>My Option Page</h2>
                ' . $this->optionPageHelper->renderForm() . '
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
    public function firstOptionFieldCallback()
    {
        // $option = get_option('my-settings_first_option');

        // Build the element here and echo the output
    }

    public function secondOptionFieldCallback()
    {
        // Build the element here and echo the output
    }

    public function uncountableOptionFieldCallback()
    {
        // $option = get_option('my-settings_first_option');

        // Build the element here and echo the output
    }
}
