=== Object Cache 4 everyone ===
Contributors: fpuenteonline
Tags: Memcached, cache, object cache, WPO
Requires at least: 5.0
Tested up to: 7.0
Stable tag: 2.3.3
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Memcached or disk-based WP Object Cache. Boosts performance and reduces DB queries. Auto-configures and supports custom servers.

== Description ==

Improve your server performance by using Memcached for object caching or by using disk support for object caching.

Fewer resources needed and better PageSpeed.

Fewer database queries needed.

Automatically detects any running Memcached server and adds an object-cache.php file to your WordPress site.

Default memcached servers tested:
- 127.0.0.1:11211
- 127.0.0.1:11212
- 127.0.0.1:11213
- 127.0.0.1:20000
- 127.0.0.1:20001
- Any SiteGround Memcached setup

Since 1.4, you can declare your own Memcached Server instance in the wp-config.php file.
Example: 
define('OC4EVERYONE_MEMCACHED_SERVER', '127.0.0.1:11211');

Starting from version 1.6, you have the option to declare in the wp-config.php file whether you want to use the external disk object cache if the Memcached Server is not present.
Outdated or malfunctioning disks can negatively impact website performance.
Example:
define('OC4EVERYONE_DISABLE_DISK_CACHE', true);

This plugin includes a modified template from this project:
https://github.com/humanmade/wordpress-pecl-memcached-object-cache
A WordPress object cache that uses the memcached (not memcache) PECL extension.
Thanks to Zack Tollman & 10up

== Changelog ==
= 2.3.3 - 2026-06-11 =
* Improved: The "Flush cache" action now requires an explicit administrator capability check (manage_options) in addition to the existing nonce.
* Improved: All Memcached statistics shown on the Plugins screen are escaped on output and item counters are cast to integers.
* Improved: The detected Memcached server address is now written to the generated object-cache.php drop-in with a safe encoder, and a server set via OC4EVERYONE_MEMCACHED_SERVER is validated against a strict host:port pattern.
* Improved: Disk object cache files are now protected from direct web access (deny-all rules and a non-PHP file extension) and verified with an HMAC integrity signature before being unserialized.
* Fix: Removed a debug log call that ran on every cache flush.
* Fix: Replaced the deprecated current_time('timestamp') call used when stamping the generated drop-in.
* Fix: Corrected malformed HTML tags in the Plugins-screen statistics output.

= 2.3.2 - 2026-05-08 =
Template updated

= 2.3.1 - 2026-05-08 =
Security fixes. Plugin Check (PCP) review

= 2.3 - 2025-03-20 =
WPCS review
Added WordPress 6.9 compatibility
Happy birthday

For older changelog entries, please check the [changelog.txt](https://plugins.svn.wordpress.org/object-cache-4-everyone/trunk/changelog.txt) file

== Upgrade Notice ==
= 2.3.3 =
Security hardening: capability check on cache flush, output escaping on the Plugins screen, safer drop-in generation and integrity-verified disk cache. Recommended update.

== Frequently Asked Questions ==
