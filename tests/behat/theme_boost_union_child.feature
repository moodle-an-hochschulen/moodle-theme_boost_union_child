@theme @theme_boost_union_child
Feature: Extending the theme_boost_union plugin with a child theme
  In order to build a child theme for Boost Union
  As developer
  I need to be able to build several kinds of extensions to Boost Union

  Scenario: Modify block.mustache template
    When I log in as "admin"
    And I turn editing mode on
    And I add the "Admin bookmarks" block
    Then ".block_admin_bookmarks .footer .block-controls" "css_element" should exist
    And ".block_admin_bookmarks .card-body > .block-controls" "css_element" should not exist
