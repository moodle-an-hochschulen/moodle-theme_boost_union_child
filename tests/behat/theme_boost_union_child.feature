@theme @theme_boost_union_child
Feature: Extending the theme_boost_union plugin with a child theme
  In order to build a child theme for Boost Union
  As developer
  I need to be able to build several kinds of extensions to Boost Union

  @javascript
  Scenario: Allow admins to use the tertiary navigation to navigate between the individual Boost Union admin pages in Boost Union Child as well
    When I log in as "admin"
    And I navigate to "Appearance > Boost Union > Accessibility" in site administration
    And I should see "Accessibility" in the ".admin_settingspage_tabs_with_tertiary .dropdown-toggle" "css_element"
    And I set the field "List of Boost Union settings pages" to "Boost Union Child"
    Then "body#page-admin-setting-theme_boost_union_child" "css_element" should exist
    And ".admin_settingspage_tabs_with_tertiary" "css_element" should exist
    And ".admin_settingspage_tabs_with_tertiary" "css_element" should be visible
    And I should see "Boost Union Child" in the ".admin_settingspage_tabs_with_tertiary .dropdown-toggle" "css_element"
    And "h2:has(+ .admin_settingspage_tabs_with_tertiary)" "css_element" should not be visible
    And I set the field "List of Boost Union settings pages" to "Accessibility"
    And I should see "Accessibility" in the ".admin_settingspage_tabs_with_tertiary .dropdown-toggle" "css_element"

  #################################################################
  # EXTENSION POINT:
  # Add your Behat scenarios here.
  # They will be tested alongside Boost Union's
  # scenarios in Github Actions.
  #################################################################
