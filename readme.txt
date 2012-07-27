=== Artiss Content Reveal ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: collapse, concertina, content, drop down, hide, menu, reveal, show, slide, toggle, visibility, visible
Requires at least: 2.5
Tested up to: 3.4.1
Stable tag: 2.1.1

Artiss Content Reveal allows you to easily hide and reveal WordPress content, whether it's in the sidebar or in a post or page.

== Description ==

After searching for a method to hide content in my own site's sidebar I found that most of the solutions involved using widgets (which often provide less functionality compared to their direct function call equivalents). As well, they often make use of Scriptaculous, jQuery or mooTools to provide effects, but often add complexity and bloat.

I therefore wrote Artiss Content Reveal (formerly Simple Content Reveal) - it doesn't use any fancy effects, just some simple JavaScript. And it doesn't use widgets. A click on a heading causes content below to hide or reveal itself. You can add a button image too to indicate what state it is in (collapsed or revealed).

Features include...

* Shortcode or PHP function call options
* Individual content states are saved via cookies (switchable via an options screen)
* URL and parameter options to override cookie options
* Ability to specify own icons for collapsing/revealing content
* Title can change too depending on current content state
* Graceful "fallback" if the visitor doesn't have JavaScript switched on - all text is revealed and any button images are removed
* Option to show title seperately
* Additional shortcode to output cookie storage length - useful for adding to a cookie policy document
* Support for Do Not Track
* XHTML compliant output (although use of the short code, depending on how it's used, can break this)
* Fully internationalized ready for translations. **If you would like to add a translation to his plugin then please [contact me](http://artiss.co.uk/contact "Contact")**

For more information and advanced options please read the "Other Notes" tab.

**Note for those upgrading from version 2**
Version 2.1 includes new cookie code, including a new cookie name. To keep code size and risks of failure to a minimum no backwards compatibilty was added. The consequence of this is that, after upgrading, user's existing cookies will be lost.

== Using a Function Call ==

For those with access to their theme PHP, a function calls adds total flexibility as it can be added anywhere within your theme.

You need to add a call to the relevant function twice - one before the content that you wish to hide/reveal and then again at the end of the content. You only specify parameters for the first one.

`<?php content_reveal( heading, id, default, imageurl, extension, cookie, title1, title2 ); ?>`

Where...

* *heading* - This is the heading that you click on to hide/reveal the content below. It can contain HTML. If you wish a button image to appear within the heading then you need to add `%image%` within the heading, where you wish it to appear. A default button is included with the plugin, but this can be overridden using further parameters. Additionally, if you wish the heading text to change as the content is hidden or revealed then you can specify the title text as `%title%`. There are 2 further parameters where you then specify the 2 pieces of text.
* *id* - You can have multiple reveals on the same page but each needs its own unique ID - keep this short.
* *default* - Do you want the content to be hidden or shown by default? Specify `hide` or `show` to indicate (default is `hide`).
* *img_url* - If you wish to supply your own images you can specify your own folder here. The two images (one for when the content is hidden, another for when it's shown) must be named image1 and image2. They can either by GIF or PNG images.
* *ext* - Use this to specify whether you wish to use PNG or GIF images.
* *cookie* - How many hours to retain the cookie for - see the instructions on cookies for further assistance.
* *title1* - If you wish to switch the title text, dependant on states, then this is the text that appears when the text is hidden.
* *title2* - This is the text that will appear when the text is shown.

Only the first parameter is required.

So, for example...

`<?php content_reveal( '<h2>%image% Some Blah Content Below</h2>', 'id1' ); ?>Blah, blah, blah content here<?php content_reveal(); ?>`

This will display a heading, complete with image and hide the content below it (between the two function calls). It has been given an ID of `id1`.

The following shows the title being modified...

`<?php content_reveal( '<h2>%image% %title%</h2>', 'id1', '', '', '', '', 'Click to reveal', 'Click to hide' ); ?>Blah, blah, blah content here<?php content_reveal(); ?>`

**Plugin Checking - Please Note**
If you place a plugin check around your function calls, bear in mind that you will need to output the heading (if appropriate) if the function doesn't exist. So, using the example above you'd need to do this...

`<?php if ( function_exists( 'content_reveal' ) ) { content_reveal( '<h2>%image% Some Blah Content Below</h2>', 'id1' ); } else { echo '<h2>Some Blah Content Below</h2>'; } ?>
Blah, blah, blah content here
<?php if ( function_exists( 'content_reveal' ) ) { content_reveal(); } ?>`

== Using a Short Code ==

This is used just like the function call and has the same parameters - the short code is `[reveal]`. You can either use the start and end shortcode method or, like the function call, you can simply use the same short code twice to encapsulate the content, only specifying parameters for the second one.

So, here's the previous example as a short code...

`[reveal heading="<h2>%image% Some Blah Content Below</h2>" id="id1"]Blah, blah, blah content here[reveal]`

Or you can specify it as...

`[reveal heading="<h2>%image% Some Blah Content Below</h2>" id="id1"]Blah, blah, blah content here[/reveal]`

Important: Make sure you add this using the html/code editor in WordPress, not the visual editor. In new versions of WordPress, just click the 'html' button above the edit box. If you use the visual editor it will not work, as the actual code you entered will be seen on the page, instead of being processed by the script.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Show title separately ==

If you wish to show the title separately from the hidden/reveal text then an alternative function and shortcode is available. Both the function call and the shortcode is named `reveal_link`. It uses the same parameters as before.

To get this to work you must specify your text as usual BUT give it a heading of "noheading". For example...

`[reveal heading="noheading" id="id1"]Blah, blah, blah content here[/reveal]
[reveal_link heading="<h2>%image% Some Blah Content Below</h2>" id="id1"]`

This is the same example as previously uses BUT the text to hide/reveal appears BEFORE the title.

In previous use the ID does not need to be specified - if it isn't, one will be generated automatically. However, for this method to use both IDs must match and, hence, you must specify them.

**Note:** WordPress does not support square brackets in shortcode parameters so you cannot, for instance, use square brackets in the title when using the shortcode option. This is [a limitation of WordPress](http://codex.wordpress.org/Shortcode_API#Square_Brackets "Square Brackets") and not this plugin.

== URL parameter to change the default state ==

A URL parameter named `acr_state` can be used to override all content on the page which uses this plugin. There are 3 possible values - `show`, `hide` or `off`. The latter will cause the plugin to output as if it wasn't active - all content will be shown and toggle images will be suppressed.

== Cookies ==

A JavaScript cookie can be used to remember the last state a user had some content in. This option is switched off by default.

In the Administration menu you should now find a new option under "Settings" named "Content Reveal". Within here you can switch the cookies on and state how long they should be stored for.

Additionally, you can control cookies on a case-by-case basis via a new parameter named `cookie`. The value should be set to the number of hours you wish the state to be stored for. To switch cookies off, specify this as zero. For example, with the shortcode you may put...

`[reveal heading="<h2>%image% Some Blah Content Below</h2>" id="id1" cookie="3"]Blah, blah, blah content here[reveal]`

This would save the cookie for 3 hours.

To assist with [recent ICO regulation](http://www.ico.gov.uk/for_organisations/privacy_and_electronic_communications/~/media/documents/library/Privacy_and_electronic/Practical_application/advice_on_the_new_cookies_regulations.pdf "Advice on the new cookies Regulations") in the UK with regard to cookies a number of additional features exist...

1. Setting the cookie time to zero will cause any existing cookies to be deleted and no cookies will be created
2. All cookies for this plugin can be overridden for a page via the URL. Simply append a parameter of `acr_cookies=` to the URL, followed by the number of hours (0 to switch off). e.g. for my site a URL of `artiss.co.uk?acr_cookies=0` would cause all the current user's cookies for this plugin to be deleted
3. So that you can display how long cookies are stored for, say on a cookie policy page, a new shortcode of `[acr_cookies]` exists. An example of output may be `7 days`

The cookie is named `content_reveal_x`, where `x` is the ID of the given content section.

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/content-reveal "Artiss Content Reveal") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

Alternatively, please [contact me directly](http://www.artiss.co.uk/contact "Contact Me").

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Reviews & Mentions ==

[Using Simple Content Reveal to report changes to the factual content of articles](http://caramboo.com/2011/02/post-reporting-i/ "Post Reporting I")

[Example usage on the Beat Struggles website](http://beatstruggles.com/scripture-of-the-week/ "Scriptures Of The Week")

== Installation ==

1. Upload the entire `simple-content-reveal` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to add the function call or short code!

== Frequently Asked Questions ==

= I can't get a shortcode within the Content Reveal shortcode to work =

Sorry, shortcodes within the hide/show text cannot be processed.

= The output doesn't validate correctly =

This will probably be if you are generating your output using the shortcode.

Usually, JavaScript generating HTML will cause errors, so you can use CDATA instead to suppress this. However, WordPress (for fuzzy reasons) modifies the CDATA command so that it no longer works.

However, [this is under investigation](http://core.trac.wordpress.org/ticket/3670 "Removing CDATA close tag unbalances the CDATA block") and, it is hoped, will be fixed in WordPress in the future. When this happens I'll be able to update this plugin to use CDATA and to play nicely with validators.

= The links to click on are appearing but clicking on them doesn't do anything =

Check in your Writing settings in Administration that you don't have "WordPress should correct invalidly nested XHTML automatically" ticked, otherwise WordPress may incorrectly attempt to "fix" the output of the plugin.

= How can I get all the content to display so that it can be printed? =

Using the new URL parameter `acr_state` you can re-display your page with all content hidden, revealed or with the plugin switched off. See the instructions for further details.

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Screenshots ==

1. This demonstrates the plugin in use on my own site's sidebar - the second of the three sections has been revealed, whereas the other two are still hidden. Note the use of the icon to show its status.

== Changelog ==

= 2.1.1 =
* Bug: Fixed incorrect include

= 2.1 =
* Maintenance: Add suffix to files and improve code quality (including resolution of any known debug errors)
* Bug: Fix JavaScript error when image tag not used
* Bug: Fix issue where initial state of title, if alternative titles are being used, was not being set
* Enhancement: Will now work in Administration screens, allowing other plugins to access it
* Enhancement: Now appears in Adminstration as own main menu option, rather than under "settings". Both options and support sub-pages exist
* Enhancement: If you have the [Artiss README Parser plugin](http://wordpress.org/extend/plugins/wp-readme-parser/ "README Parser") installed then a new sub-menu will display the README instructions
* Enhancement: Brought menu and help screen code up-to-date including adding feature pointer
* Enhancement: Now supports Do Not Track. If a browser has this switched on you can force the plugin to not use cookies
* Enhancement: Added shortcode to output cookie storage length
* Enhancement: Nested shortcode now allowed so a shortcode can be used with the Content Reveal shortcode
* Enhancement: Complete re-write of cookie functionality to combine all saved information into one cookie per saved section (it was previously four!). However, I've not added backwards compatibility to keep code size to a minimum and to reduce the risk of the extra code causing issues.
* Enhancement: Converted spaces to underscores in IDs
* Enhancement: Improved the JavaScript code compression
* Enhancement: Added internationalisation

= 2.0.4 =
* Maintenance: Removed the dashboard widget

= 2.0.3 =
* Maintenance: Removed the sponsorship

= 2.0.2 =
* Bug: Fixed parameter passing bug in function call
* Bug: Corrected URL in HTML comment
* Bug: Fixed incorrect function name call in JavaScript
* Enhancement: Made a number of small improvements to the JavaScript
* Enhancement: Updated Artiss dashboard widget & added sponsorship to options page
* Enhancement: Improved editor button icon

= 2.0.1 =
* Bug: Fixed a bug in the JavaScript that meant that not all cookie data was saved in some circumstances

= 2.0 =
* Maintenance: Renamed from Simple Content Reveal to Artiss Content Reveal
* Maintenance: Brought all code up to current standards and checked via WP_DEBUG
* Enhancement: Modified default icons - now black & white to suit more sites
* Enhancement: Added button to editor which can be toggled in new option screen
* Enhancement: JavaScript cookies will now store the state of each section - again, can be switched via option screen
* Enhancement: Added parameters and URL to allow overriding of cookie option
* Enhancement: User can now specify the title separately, allowing option to hide/reveal to be placed elsewhere
* Enhancement: Improved shortcode method
* Enhancement: New URL parameter which allows all sections to be shown/hidden en-masse. Can also switch off plugin operation using the same
* Enhancement: If user doesn't specify an ID one will be generated for them

= 1.2.1 =
* Bug: Fixed bug where users own image folder was not working
* Bug: Fixed version number reporting
* Enhancement: Improved number of CLASS' used to assist with CSS styling

= 1.2 =
* Bug: Fixed critical bug that prevented image from  working with Internet Explorer

= 1.1 =
* Enhancement: Now using `wp_enqueue_script` to handle script in header

= 1.0 =
* Initial release

== Upgrade Notice ==

= 2.1.1 =
* Upgrade to fix critical bug in 2.1

= 2.1 =
* Upgrade to add assorted improvements including support for Do Not Track

= 2.0.4 =
* Upgrade to remove the dashboard widget

= 2.0.3 =
* Upgrade to remove the sponsorship

= 2.0.2 =
* Upgrade if you use the function call option

= 2.0.1 =
* Fixed bug in JavaScript that affected cookies

= 2.0 =
* Upgrade to add many new options, including remembering the state of the hidden/revealed content

= 1.2.1 =
* Upgrade to improve your styling abilities or if you wish to override the image folder

= 1.2 =
* Upgrade to get the image to work with Internet Explorer

= 1.1 =
* Upgrade if you find this plugin breaks your theme

= 1.0 =
* Initial release