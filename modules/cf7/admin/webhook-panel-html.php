<?php

// 
defined( 'ABSPATH' ) or die( 'No script!' );




$activate = '1';
$hook_url = '';
$send_mail = '0';
$special_mail_tags = '';

if ( is_a( $contactform, 'WPCF7_ContactForm' ) ) {
    $properties = $contactform->prop( CFRID_Module_CF7::METADATA );

    if ( isset( $properties['activate'] ) ) {
        $activate = $properties['activate'];
    }

    if ( isset( $properties['hook_url'] ) ) {
        $hook_url = $properties['hook_url'];
    }

    if ( isset( $properties['send_mail'] ) ) {
        $send_mail = $properties['send_mail'];
    }


}

?>

<h2>
    <?php _e( 'Make (Integromat)', CFRID_TEXTDOMAIN ) ?>
</h2>

<fieldset>
    <legend>
        <?php _e( 'Step 1: <a href="https://www.make.com/en/integrations/contact-form-seven?pc=matemplates" target="_blank">Start using a Module or select a template</a>', 'cf7rid' ); ?>
        <br>
        <?php _e( 'Step 2: Copy&Paste the webhook created in the first step', 'cf7rid' ); ?>
    </legend>

    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Active?', CFRID_TEXTDOMAIN ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-activate">
                            <input type="checkbox" id="ctz-webhook-activate" name="ctz-webhook-activate" value="1" <?php checked( $activate, "1" ) ?>>
                            <?php _e( 'Yes. Send all data to Make (Integromat)', CFRID_TEXTDOMAIN ) ?>
                        </label>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Webhook URL', CFRID_TEXTDOMAIN ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-hook-url">
                            <input type="url" id="ctz-webhook-hook-url" name="ctz-webhook-hook-url" value="<?php echo $hook_url; ?>" style="width: 100%;">
                        </label>
                    </p>
                    <?php if ( $activate && empty( $hook_url ) ): ?>
                        <p class="description" style="color: #D00;">
                            <?php _e( 'Paste webhook URL from Watch New Form Submissions trigger here.' ); ?>
                        </p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Sending Mail?', CFRID_TEXTDOMAIN ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-send-mail">
                            <input type="checkbox" id="ctz-webhook-send-mail" name="ctz-webhook-send-mail" value="1" <?php checked( $send_mail, "1" ) ?>>
                            <?php _e( 'Yes', CFRID_TEXTDOMAIN ) ?>
                        </label>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</fieldset>

<h2>
    <?php _e( 'Special Mail Tags', CFRID_TEXTDOMAIN ) ?>
</h2>

<fieldset>
    <legend>
        <?php echo _x( 'You can add <a href="https://contactform7.com/special-mail-tags/" target="_blank">Special Mail Tags</a> to the data sent to webhook.', 'The URL should point to CF7 documentation (someday it can be translated).', CFRID_TEXTDOMAIN ); ?>
    </legend>

    <div style="margin: 20px 0;">
        <label for="ctz-special-mail-tags">
            <?php
                $special_mail_tags = esc_textarea( $special_mail_tags );
                $rows = ( (int) substr_count( $special_mail_tags, "\n" ) ) + 2;
                $rows = max( $rows, 4 );
            ?>
            <textarea id="ctz-special-mail-tags" name="ctz-special-mail-tags" class="large-text code" rows="<?php echo $rows; ?>"><?php echo $special_mail_tags; ?></textarea>
        </label>
        <p class="description"><?php
            printf(
                __( 'Insert Special Tags like in mail body: %s', CFRID_TEXTDOMAIN ),
                '<span style="font-family: monospace; font-size: 12px; font-weight: bold;">[_post_title]</span>'
            );

            echo '<br>';

            printf(
                __( 'Or add a second word to pass as key to Webhook: %s', CFRID_TEXTDOMAIN ),
                '<span style="font-family: monospace; font-size: 12px; font-weight: bold;">[_post_title title]</span>'
            );
        ?></p>
    </div>
</fieldset>

<h2>
    <?php _e( 'Data sent to Webhook', CFRID_TEXTDOMAIN ) ?>
</h2>

<p><?php _e( 'We will send your form data as below:', CFRID_TEXTDOMAIN ) ?></p>

<?php
    $sent_data = array();

    // Special Tags
    $special_tags = array();
    $special_tags = CFRID_Module_CF7::get_special_mail_tags_from_string( $special_mail_tags );
    $tags = array_keys( $special_tags );

    // Form Tags
    $form_tags = $contactform->scan_form_tags();
    foreach ( $form_tags as $tag ) {
        $key = $tag->get_option('webhook');
        if (! empty($key) && ! empty($key[0])) {
            $tags[] = $key[0];
            continue;
        }

        $tags[] = $tag->name;
    }

    foreach ( $tags as $tag ) {
        if ( empty( $tag ) ) continue;

        $sent_data[ $tag ] = 'xxxxxxxxxxxxx';
    }
?>

<pre style="background: #FFF; border: 1px solid #CCC; padding: 10px; margin: 0;"><?php
    echo json_encode( $sent_data, JSON_PRETTY_PRINT );
?></pre>

<p class="description"><?php
    printf(
        __( 'You can add URL parameters into form using this shortcode: %s.', CFRID_TEXTDOMAIN ),
        '<span style="font-family: monospace; font-size: 12px; font-weight: bold;">[hidden example_get default:get]</span>'
    );
?></p>