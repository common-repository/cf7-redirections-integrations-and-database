=== Contact Form 7 - Redirections, Integrations, and Database ===
Contributors: tomasbanik
Tags: cf7, contact form, make, integromat, integration, redirection, database, contact form 7, webhook, Caldera Forms, Elementor Pro Form, Everest Forms, Formidable Forms, Formcraft, Forminator, Form Maker, Gravity Forms, Happy Forms, Kali Forms, Ninja Forms, Planso Forms, Smart Forms, Ultimate Form Builder Lite, Visual Form Builder, Visual Form Builder Pro (VFB Pro), WPForms, weForms, 
Requires at least: 4.7
Tested up to: 6.0.2
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Connect Contact Form 7 to hundreds of other SaaSes for free.

== Description ==
Connect Contact Form 7 to hundreds of other SaaSes for free.

[Start with Contact Form 7](https://www.make.com/en/integrations/contact-form-seven?pc=matemplates) 

= How to Use =

Install and Activate this plugin.
CF7 will activate automatically in Integrations tab.

= Configuration =

Follow these steps:

1.  In Make, [create a new scenario](https://www.make.com/en/integrations/contact-form-seven?pc=matemplates) from Contact Form 7 module.
2.  Choose a trigger as "Watch New Form Submissions".
3.  Add new webhook.
4.  Copy the given URL into your Contact Form configuration, paste and activate integration.

= Creating your workflow =

Click small "+" sign "Add another module" and continue creating your
workflow with filters and other apps.

= Review =

We would be grateful for a [review here](https://wordpress.org/plugins/cf7-redirections-integrations-and-database/#reviews).

= Support =
Please, send us an email to info@1-clicksetup.com

== Installation ==

`Install [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) and activate it.`

* Install "CF7 Redirections, Integrations and Database" by plugins dashboard.

Or

* Upload the entire `cf7-redirections-integrations-database.zip` file to the `/wp-content/plugins/` directory.

Then

* Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Does it works with Gutenberg? =

Yes. We support WordPress 5+ and CF7 too.

= Does it works for forms sent out of CF7? =

Nope. The intention here is to integrate CF7.

= Can I use it without Make? =

Yep. We are creating a integration to Make webhook, but you can insert any URL to receive a JSON formated data.

= My sent data is empty =

Please, send us an email to cf7integrated@1-clicksetup.com

= How can I upload files and send link to webhook? =

If you send a form with file, we will copy this to a directory before CF7 remove it and send the link to Make.

= How can I rename a field to webhook? =

You can add a "webhook" option to your field on form edit tab.

It's like the "class" option: `[text your-field class:form-control id:field-id webhook:webhook-key]`.

This will create a text field with name "your-field", class "form-control", id "field-id" and will be sent to webhook with key "webhook-key".

= How I can get the free text value? =

We will replace the value for last option (which is the free_text input) with the value.

This way your webhook will receive the free text value and other options if you allow it (like in checkbox).

== Screenshots ==

== Changelog ==

== Upgrade Notice ==
