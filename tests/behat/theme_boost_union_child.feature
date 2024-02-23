@theme @theme_boost_union_child
Feature: Extending the theme_boost_union plugin with a child theme
  In order to build a child theme for Boost Union
  As developer
  I need to be able to build several kinds of extensions to Boost Union

  @javascript
  Scenario Outline: Setting: Example setting to set a SCSS variable.
    Given the following config values are set as admin:
      | config              | value     | plugin                  |
      | examplescssvariable | <setting> | theme_boost_union_child |
    And the theme cache is purged and the theme is reloaded
    When I log in as "admin"
    And I follow "Dashboard"
    Then DOM element "nav.navbar" should have computed style "height" "<result>"

    Examples:
      | setting | result |
      # Boost core adds 1px to the $navbar-height setting when defining the navbar height.
      |         | 61px   |
      | 120px   | 121px  |
