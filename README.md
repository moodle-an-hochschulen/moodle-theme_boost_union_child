moodle-theme_boost_union_child
==============================

[![Moodle Plugin CI](https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/workflows/Moodle%20Plugin%20CI/badge.svg?branch=master)](https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/actions?query=workflow%3A%22Moodle+Plugin+CI%22+branch%3Amaster)

Boost Union Child is a boilerplate for enhancing Boost Union with custom or local functionality.


Motivation for this plugin
--------------------------

If you ever wanted to benefit from all the / only the Boost Union features you need, but you also had to realize additional local features or settings at the same time, do not look further: Boost Union Child is your friend.

With Boost Union Child, it is quite easy to create a grandchild theme of Boost Union. It will save you the time-consuming and headache-triggering first steps to create a grandchild theme, allowing you to start directly with the implementation of your local features.

But please note: While Boost Union Child will surely help you to realize all your local Boost Union dreams, please do yourself and the whole community a favour and verify that your planned features are indeed not interesting as a pull request or feature request for the whole Boost Union community and could be contributed to Boost Union directly instead.


Requirements
------------

Boost Union Child does not have a real requirement for a particular Boost Union or Moodle core release.

The code which you find in this repository is more or less release-agnostic. It is meant to be used in conjunction with the latest Boost Union release which goes with your Moodle core release.


Installation
------------

Install Boost Union Child like any other plugin to folder
/theme/boost_union_child

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins


Usage
-----

After installing Boost Union Child, it does not do anything to Moodle or Boost Union yet.

Boost Union Child integrates into the Boost Union settings as an additional settings page which you find on:
Site administration -> Appearance -> Boost Union -> Boost Union Child.

There, you find some settings:

### Settings page "Boost Union Child"

#### Tab "General settings"

In this tab there are the following settings:

##### Pre SCSS inheritance

With this setting, you control if the pre SCSS code from Boost Union should be inherited or duplicated.

Most of the time, inheriting will be perfectly fine. However, it may happen that imperfect code is integrated into Boost Union which prevents simple SCSS inheritance for particular Boost Union features. If you encounter any issues with Boost Union features which seem not to work in Boost Union Child as well, try to switch this setting to 'Dupliate' and, if this solves the problem, report an issue on Github (see the 'Bug and problem reports' section below for details how to report an issue).

##### Extra SCSS inheritance

With this setting, you control if the extra SCSS code from Boost Union should be inherited or duplicated.

The reason behind this setting is the same as for the 'Pre SCSS inheritance' setting.


Building your local theme with this boilerplate
-----------------------------------------------

Even though Boost Union Child is a fully working theme, it looks and feels exactly the same as Boost Union itself (well, this is why we build Boost Union Child).

To build your own grandchild theme of Boost with this boilerplate, you have to go further.

### Renaming the grandchild theme (optional)

If you want to run your grandchild theme with a different name than theme_boost_union_child, for example theme_boost_union_foo, you have to take some actions:

* In the whole codebase of Boost Union Child below /theme/boost_union_child,
  * search all occurrences of 'boost_union_child' and replace them with 'boost_union_foo'
  * search all occurrences of 'Boost Union Child' and replace them with 'Boost Union Foo'
* In the language pack directory /theme/boost_union_child/lang,
  * rename the language pack file from en/theme_boost_union.php to en/theme_boost_foo.php
* In the tests directory /theme/boost_union_child/tests/behat,
  * rename the Behat step definition files from behat_theme_boost_union_child_behat_\*.php to behat_theme_boost_union_foo_behat_\*.php

### Add your Boost Union Child features

To add your local features to Boost Union Child, you can more or less follow all coding guidelines for Boost theme development which you find on the net. A good and official starting point is https://docs.moodle.org/dev/Themes.

To help you with the first steps, we have added some markers to Boost Union Child's codebase at the places where you can add your own features. Just search for EXTENSION POINT and you will find the places where you can add your settings, language strings, SCSS code and so on.

In addition to that, have a look at the 'Extensiopn examples' section below.

### Finishing your grandchild theme (optional)

If you want to use Moodle plugin updates properly and especially if you intend to publish your grandchild theme, you set your plugin version information properly:

* In the version file /theme/boost_union_child/version.php,
  * raise $plugin->version to a proper version of your choice (see https://docs.moodle.org/dev/Moodle_versions for an explanation how Moodle version numbers are composed)
  * set $plugin->release to a release string of your choice (in Boost Union, we use release strings like 'v4.3-r1' which means 'First release for Moodle 4.3')
  * set $plugin->requires to the version number of the miniumum Moodle core version which you would like to support (see https://moodledev.io/general/releases for the list of Moodle core versions)
  * likewise, set $plugin->supported to an array with the range of Moodle core versions which you would like to support (for example, to support Moodle 4.3 only officially, set it to '[403, 403]')
  * raise the entry for theme_boost_union in $plugin->dependencies to the version number of the Boost Union version which you tested your grandchild theme against, just to avoid any hickups if someone tries to combine your grandchild theme with a much older version of Boost Union

As an orientation how all these settings should look like, you can compare /theme/boost_union_child/version.php with /theme/boost_union/version.php, of course.

### Congratulate yourself

Now your grandchild theme should be ready to be used in production. Well done!


Extension examples
------------------

### General

Developing for Boost Union means to apply similar techniques for every new feature. In this section, we try to collect some of these techniques for you.

### How to allow the admin to configure a SCSS variable with an admin setting

In the [extension-setting-scss-variable](https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/tree/extension-setting-scss-variable) branch, we prepared some example code which shows you how allow the admin to configure a SCSS variable with an admin setting and without fiddling with SCSS.

In the example, we added a text admin setting into a dedicated admin settings tab. This setting is evaluated in lib.php where the pre-SCSS code is composed and where, based on the setting, a SCSS variable of Boost Core is overwritten. In this example, we chose to allow you to configure the $navbar-height variable. As a result, you can modify the height of the navbar just from within the admin setting if needed.

The example code is completed by a Behat test which verifies now and forever that the admin setting is doing its job properly.

### Modify a mustache template from Moodle core

In the [extension-modify-mustache-template](https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/tree/extension-modify-mustache-template) branch, we prepared some example code which shows you how to modify a mustache template from Moodle core in Boost Union Child.

In the example, we copied the block.mustache template from Moodle core to Boost Union Child and modified in a way that the block controls are shown in the block footer now. The modified template will be used instantly as soon as Boost Union Child is the active theme.

Of course, the example code is completed by a Behat test which verifies now and forever that the modified template is used in Boost Union Child.

### Call for proposals

If you have another good extension example for Boost Union Child, we would be grateful if you would contribute it!

Just fork this repo, compose a branch with the extension example and create an issue in this repository to tell us the URL of your branch. We will then do our best to pick and publish your proposal.


Plugin repositories
-------------------

This boilerplate is not published in the Moodle plugins repository.

The latest development version can be found on Github:
https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child


Bug and problem reports / Support requests
------------------------------------------

This boilerplate is carefully developed and thoroughly tested, but bugs and problems can always appear.

Please report bugs and problems on Github:
https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/issues

We will do our best to solve your problems, but please note that due to limited resources we can't always provide per-case support.


Feature proposals
-----------------

Due to limited resources, the functionality of this boilerplate is primarily implemented for our own local needs and published as-is to the community. We are aware that members of the community will have other needs and would love to see them solved by this boilerplate.

Please issue feature proposals on Github:
https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/issues

Please create pull requests on Github:
https://github.com/moodle-an-hochschulen/moodle-theme_boost_union_child/pulls

We are always interested to read about your feature proposals or even get a pull request from you, but please accept that we can handle your issues only as feature _proposals_ and not as feature _requests_.


Maintainers
-----------

The boilerplate is maintained by\
Moodle an Hochschulen e.V.


Credits
-------

This boilerplate is heavily inspired by the work of Daniel Poggenpohl from FernUniversität in Hagen who was the first to create a Boost Union Child boilerplate.


Copyright
---------

The copyright of this boilerplate is held by\
Moodle an Hochschulen e.V.

Individual copyrights of individual developers are tracked in PHPDoc comments and Git commits.
