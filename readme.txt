=== Count All ===
Contributors: 
Donate link: 
Tags: counter baby count age
Requires at least: 2.8
Tested up to: 3.0
Stable tag: 0.1

Highly customizable counter widget. Allows HTML in title and body. Can count up and down. Supports multiple instances.

== Description ==

The options in the widget are:

* *Title* is the widget's title. It can contain HTML; its value is simply embedded into the resulting HTML page.

* *Content* is the widget content field. It uses the [DateInterval::format](http://www.php.net/manual/en/dateinterval.format.php)
function to format the field contents. You can use any field specifiers from that function. Its contents are also embedded into the resulting HTML
page, so over the %-tags, you are free to use any HTML you want.

* *Date* specifies the date we should count distance from. Since this plugin simply takes the difference between 'now' and the specified date, it can
be used for counting down (for dates in the future), or counting up (for dates in the past). It's all up to you.

You can have multiple instances of this widget, of course.

== Installation ==

The plugin consists of a single .php file, so it's very easy:

1. Upload `count_all.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Start using it on the 'Widgets' submenu of 'Appearance'

== Requirements ==

The plugin *requires* PHP 5.3+ (for the DateInterval class). For the WordPress widget support, it also requires WordPress 2.8+.

== Frequently Asked Questions ==

None yet.

== Screenshots ==

1. Widget configuration (observe multiple instances)
2. This is how it looks in browser

== Changelog ==

= 0.1 =
* Initial release