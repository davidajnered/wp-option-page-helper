=== Option Page Helper ===
Contributors: davidajnered
Donate link: http://davidajnered.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: option page, admin page, settings page, option, admin, settings, developer, development, class, object, object oriented programming, dev, code, framework
Requires at least: 3.9
Tested up to: 3.9
Stable tag: 0.1

== Description ==
Option Page Helper is a developer tool that wraps all necessary function calls to create a option page. It stores variables and auto-generate callbacks to minimize the development time.

[More on github](https://github.com/davidajnered/wp-option-page-helper)

== Installation ==
I thought I was a bit complicated to add option pages so I wrote a helper that simplify thing a bit. The helper stores recurring variables like page slug so you don't have to pass it with all function calls. It created callback automatically based on the section or field name, so you don't have to care about that eigher. This is a simple example on how to create a options page

`
$options = array(
    'page_title' => 'Settings Admin',                   // Page title
    'menu_title' => 'My Settings',                      // Menu title
    'capability' => 'manage_options',                   // Capability
    'menu_slug' => 'my-settings',                       // Menu slug
    'callback' => array($this, 'page'),                 // Callback object
    'form' => array(
        array(
            'name' => 'First Section',                  // Section name
            'fields' => array(
                'first_option' => 'First option'        // Field id and name
            )
        )
    ),
);

$this->optionPageHelper = new OptionPageHelper($options);
`

You're page is created, but there are some callbacks to take care of.

`
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
`

And then we have the field(s) callback...
`
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
    // Get saved field values
    $option = get_option('my-settings_first_option');

    // Build element and print
    echo '<input name="my-settings_first_option" value="' . $option . '">';
}
`
Don't forget to read the code comments here, they're useful :)

The Utils class contains some formatting helpers, so you need that file to. The OptionPage class is just an example on how to implement this, just like this readme.

== Frequently Asked Questions ==
Nope

== Changelog ==
* 0.1 first version

== Upgrade Notice ==
Nothung

== Screenshots ==
It's just a class...