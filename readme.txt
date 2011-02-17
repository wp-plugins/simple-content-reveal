=== Simple Content Reveal ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: Content, Reveal, Hide, Dropdown, Menu, Slide, Collapse, Concertina
Requires at least: 2.5
Tested up to: 3.0.5
Stable tag: 1.2.1

Simple Content Reveal allows you to easily hide and reveal WordPress content, whether it be in the sidebar or in a post or page.

== Description ==

After searching for a method to hide content in my own site's sidebar, I found that most of the solutions involved using widgets (which often provide less functionality compared to their direct function call equivalents). As well, they often make use of Scriptaculous, jQuery or mooTools to provide effects, but often add complexity and bloat.

I therefore wrote Simple Content Reveal - it doesn't use any fancy effects, just some simple JavaScript. And it doesn't use widgets.

A simple click on a heading causes content below to hide or reveal itself. You can add a button image too to indicate what state it is in (collapsed or revealed).

The plugin has been designed to fallback gracefully if the visitor doesn't have JavaScript installed (all text is revealed and any button images are removed). The output should also be XHTML compliant - although use of the short code can break this, depending on how it's used.

For examples of usage, please visit my website - I use it on the sidebar and for comments under individual posts or pages.

There are 2 ways to use the plugin - a function call (requires PHP coding, but can be placed anywhere) or a short code (which can be easily placed in a post or page).

Let's go through each of the methods in turn...

**1. Function Call**

For those with access (and the requirement) to their theme PHP, a function calls adds total flexibility as it can be added anywhere within your theme.

You need to add a call to the relevant function twice - one before the content that you wish to hide/reveal and then again at the end of the content. You only specify parameters for the first one.

`<?php simple_content_reveal(heading,id,default,imageurl,extension); ?>`

Where...

* *heading* - This is the heading that you click on to hide/reveal the content below. It can contain HTML. If you wish a button image to appear within the heading then you need to add `%image%` within the heading, where you wish it to appear. A default button is included with the plugin, but this can be overridden using further parameters.
* *id* - You can have multiple reveals on the same page but each needs its own unique ID - keep this short.
* *default* - Do you want the content to be hidden or shown by default? Specify `hide` or `show` to indicate (default is `hide`).
* *img_url* - If you wish to supply your own images you can specify your own folder here. The two images (one for when the content is hidden, another for when it's shown) must be named image1 and image2. They can either by GIF or PNG images.
* *ext* - Use this specify whether you wish to use PNG or GIF images.

Only the first two parameters are required.

So, for example...

`<?php simple_content_reveal("<h2>%image% Some Blah Content Below</h2>","id1"); ?>
Blah, blah, blah content here
<?php simple_content_reveal(); ?>`

This will display a heading, complete with image and hide the content below it (between the two function calls). It has been given an ID of `id1`.

**Plugin Checking - Please Note**

If you place a plugin check around your function calls, bear in mind that you will need to output the heading (if appropriate) if the function doesn't exist. So, using the example above you'd need to do this...

`<?php if (function_exists('simple_content_reveal')) {simple_content_reveal("<h2>%image% Some Blah Content Below</h2>","id1");} else {echo "<h2>Some Blah Content Below</h2>";} ?>
Blah, blah, blah content here
<?php if (function_exists('simple_content_reveal')) {simple_content_reveal();} ?>`

**2. Short Code**

This is used just like the function call and has the same parameters - the short code is `[reveal]`. Do *NOT* use the short code terminator (i.e. `[/reveal]`) as this will not work - like the function call, you simply use the same short code twice to encapsulate the content, only specifying parameters for the second one.

So, here's the previous example as a short code...

`[reveal heading="<h2>%image% Some Blah Content Below</h2>" id="id1"]
Blah, blah, blah content here
[reveal]`

Important: Make sure you add this using the html/code editor in WordPress, not the visual editor. In new versions of WordPress, just click the 'html' button above the edit box. If you use the visual editor it will not work, as the actual code you entered will be seen on the page, instead of being processed by the script.

== Licence ==

This WordPRess plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License
").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly, follow [my news feed](http://www.artiss.co.uk/feed "RSS News Feed") or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/simple-content-reveal "Simple Content Reveal") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

Alternatively, please [contact me directly](http://www.artiss.co.uk/contact "Contact Me"). 

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Reviews & Mentions ==

[Using Simple Content Reveal to report changes to the factual content of articles](http://caramboo.com/2011/02/post-reporting-i/ "Post Reporting I")

== Installation ==

1. Upload the entire `simple-content-reveal` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it, you're done - you just need to add the function call or short code!

== Frequently Asked Questions ==

= Are there any known problems? =

You can't have a shortcode within a shortcode, hence any entered as content within the `reveal` section will not work. For example, if you add a caption to an image then this uses a shortcode and, if used within a `reveal` section will not work.

= The output doesn't validate correctly =

This is because I use JavaScript to output XHTML to ensure compatibility if a user has JavaScript turned off. However, this combination causes many validators to get confused and think an error exists. In reality the code generated is XHTML valid.

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me via [my forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum") or [my contact form](http://www.artiss.co.uk/contact "Contact Me"). However, please check the [dedicated plugin page](http://www.artiss.co.uk/simple-content-reveal "Simple Content Reveal") first for any known bugs or planned enhancements.

== Screenshots ==

1. This demonstrates the plugin in use on my own site's sidebar - the second of the three sections has been revealed, whereas the other two are still hidden. Note the use of the icon to show its status.

== Changelog ==  
  
= 1.0 =
* Initial release

= 1.1 =
* Now using `wp_enqueue_script` to handle script in header

= 1.2 =
* Fixed critical bug that prevented image from  working with Internet Explorer

= 1.2.1 =
* Fixed bug where users own image folder was not working
* Fixed version number reporting
* Improved number of CLASS' used to assist with CSS styling

== Upgrade Notice ==

= 1.0 =
* Initial release

= 1.1 =
* Upgrade if you find this plugin breaks your theme

= 1.2 =
* Upgrade to get the image to work with Internet Explorer

= 1.2.1 =
* Upgrade to improve your styling abilities or if you wish to override the image folder