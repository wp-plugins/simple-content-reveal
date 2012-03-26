=== Artiss Content Reveal ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: collapse, concertina, content, drop down, hide, menu, reveal, show, slide, toggle, visibility, visible
Requires at least: 2.5
Tested up to: 3.3.1
Stable tag: 2.0.4

Artiss Content Reveal allows you to easily hide and reveal WordPress content, whether it's in the sidebar or in a post or page.

== Description ==

After searching for a method to hide content in my own site's sidebar I found that most of the solutions involved using widgets (which often provide less functionality compared to their direct function call equivalents). As well, they often make use of Scriptaculous, jQuery or mooTools to provide effects, but often add complexity and bloat.

I therefore wrote Artiss Content Reveal (formerly Simple Content Reveal) - it doesn't use any fancy effects, just some simple JavaScript. And it doesn't use widgets. A simple click on a heading causes content below to hide or reveal itself. You can add a button image too to indicate what state it is in (collapsed or revealed).

The plugin has been designed to fallback gracefully if the visitor doesn't have JavaScript installed (all text is revealed and any button images are removed). The output should also be XHTML compliant - although use of the short code can break this, depending on how it's used.

To see it in use please visit my website - I use it on the sidebar and for comments under individual posts or pages.

There are 2 ways to use the plugin - a function call (requires PHP coding, but can be placed anywhere) or a short code (which can be easily placed in a post or page).

Let's go through each of the methods in turn...

**1. Function Call**

For those with access to their theme PHP, a function calls adds total flexibility as it can be added anywhere within your theme.

You need to add a call to the relevant function twice - one before the content that you wish to hide/reveal and then again at the end of the content. You only specify parameters for the first one.

`<?php content_reveal( heading, id, default, imageurl, extension, cookie, title1, title2 ); ?>`

Where...

* *heading* - This is the heading that you click on to hide/reveal the content below. It can contain HTML. If you wish a button image to appear within the heading then you need to add `%image%` within the heading, where you wish it to appear. A default button is included with the plugin, but this can be overridden using further parameters. Additionally, if you wish the heading text to change as the content is hidden or revealed then you can specify the title text as `%title%`. There are 2 further parameters where you then specify the 2 pieces of text.
* *id* - You can have multiple reveals on the same page but each needs its own unique ID - keep this short.
* *default* - Do you want the content to be hidden or shown by default? Specify `hide` or `show` to indicate (default is `hide`).
* *img_url* - If you wish to supply your own images you can specify your own folder here. The two images (one for when the content is hidden, another for when it's shown) must be named image1 and image2. They can either by GIF or PNG images.
* *ext* - Use this specify whether you wish to use PNG or GIF images.
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

**2. Short Code**

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

== URL parameter to change the default state ==

A URL parameter named `acr_state` can be used to override all content on the page which uses this plugin. There are 3 possible values - `show`, `hide` or `off`. The latter will cause the plugin to output as if it wasn't active - all content will be shown and toggle images will be suppressed.

== Cookies ==

A JavaScript cookie can now be used to remember the last state a user had some content in. However, to provide backwards compatibility this option is switched off by default.

In the Administration menu you should now find a new option under "Settings" named "Content Reveal". Within here you can switch the cookies on and state how long they should be stored for.

Additionally, you can control cookies on a case-by-case basis via a new parameter named `cookie`. The value should be set to the number of hours you wish the state to be stored for. To switch cookies off, specify this as zero. For example, with the shortcode you may put...

`[reveal heading="<h2>%image% Some Blah Content Below</h2>" id="id1" cookie="3"]Blah, blah, blah content here[reveal]`

This would save the cookie for 3 hours.

To assist with [recent ICO regulation](http://www.ico.gov.uk/for_organisations/privacy_and_electronic_communications/~/media/documents/library/Privacy_and_electronic/Practical_application/advice_on_the_new_cookies_regulations.pdf "Advice on the new cookies Regulations") in the UK with regard to cookies, 2 features have been additionally added..

1. Setting the cookie time to zero will cause any existing cookies to be deleted and no cookies will be created
2. All cookies for this plugin can be overridden for a page via the URL. Simply append a parameter of `acr_cookies=` to the URL, followed by the number of hours (0 to switch off). e.g. for my site a URL of `artiss.co.uk?acr_cookies=0` would cause all the current user's cookies for this plugin to be deleted

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

= How can I get all the content to display so that it can be printed? =

Using the new URL parameter `acr_state` you can re-display your page with all content hidden, revealed or with the plugin switched off. See the instructions for further details.

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Screenshots ==

1. This demonstrates the plugin in use on my own site's sidebar - the second of the three sections has been revealed, whereas the other two are still hidden. Note the use of the icon to show its status.

== Changelog ==

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