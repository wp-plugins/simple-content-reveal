=== Simple Content Reveal ===
Contributors: dartiss
Donate link: http://tinyurl.com/bdc4uu
Tags: Content, Reveal, Hide, Dropdown, Menu, Slide, Collapse, Concertina
Requires at least: 2.5
Tested up to: 3.0
Stable tag: 1.0

Simple Content Reveal allows you to easily hide and reveal WordPress content, whether it be in the sidebar or in a post or page.

== Description ==

After searching for a method to hide content in my own site's sidebar, I found that most of the solutions involved using widgets (which often provide less functionality compared to their direct function call equivalents). As well, they often make use of Scriptaculous, jQuery or mooTools to provide effects, but often add complexity and bloat.

I therefore wrote Simple Content Reveal - it doesn't use any fancy effects, just some simple JavaScript. And it doesn't use widgets.

A simple click on a heading causes content below to hide or reveal itself. You can add a button image too to indicate what state it is in (collapsed or revealed).

The plugin has been designed to fallback gracefully if the visitor doesn't have JavaScript installed (all text is revealed and any button images are removed). The output should also be XHTML compliant - although use of the short code can break this, depending on how it's used.

For examples of usage, please visit my website - I use it on the sidebar and for comments under individual posts or pages.

== Usage ==

There are 2 ways to use the plugin - a function call (requires PHP coding, but can be placed anywhere) or a short code (which can be easily placed in a post or page).

Let's go through each of the methods in turn...

*1. Function Call*

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

`<?php simple_content_reveal("%image% <h2>Some Blah Content Below</h2>","id1"); ?>
Blah, blah, blah content here
<?php simple_content_reveal(); ?>`

This will display a heading, complete with image and hide the content below it (between the two function calls). It has been given an ID of `id1`.

*Plugin Checking - Please Note*

If you place a plugin check around your function calls, bear in mind that you will need to output the heading (if appropriate) if the function doesn't exist. So, using the example above you'd need to do this...

`<?php if (function_exists('simple_content_reveal')) {simple_content_reveal("%image% <h2>Some Blah Content Below</h2>","id1");} else {echo "<h2>Some Blah Content Below</h2>";} ?>
Blah, blah, blah content here
<?php if (function_exists('simple_content_reveal')) {simple_content_reveal();} ?>`

*2. Short Code*

This is used just like the function call and has the same parameters - the short code is `[reveal]`. Do *NOT* use the short code terminator (i.e. `[/reveal]`) as this will not work - like the function call, you simply use the same short code twice to encapsulate the content, only specifying parameters for the second one.

So, here's the previous example as a short code...

`[reveal heading="%image% <h2>Some Blah Content Below</h2>" id="id1"]
Blah, blah, blah content here
[reveal]`

== Installation ==

1. Upload the entire `simple-content-reveal` folder to your wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. That's it, you're done - you just need to add the function call or short code!

== Frequently Asked Questions ==

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via [my contact form](http://www.artiss.co.uk/contact "Contact Me") or by [the plugins homepage](http://www.artiss.co.uk/simple-content-reveal "Simple Content Reveal").

== Screenshots ==

1. This demonstrates the plugin in use on my own site's sidebar - the second of the three sections has been revealed, whereas the other two are still hidden. Note the use of the icon to show its status.

== Changelog ==  
  
= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
* Initial release