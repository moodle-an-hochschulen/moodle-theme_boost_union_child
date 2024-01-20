@theme @theme_boost_union_child
Feature: Extending the theme_boost_union plugin with a child theme
  In order to build a child theme for Boost Union
  As developer
  I need to be able to build several kinds of extensions to Boost Union

  Scenario: Skeleton scenario
    # This Behat scenario is just a skeleton which is ready for extension.
    # Grunt in Github actions would not be happy with a feature file without any scenario.
    # Thus, we log in as admin to keep it happy.
    When I log in as "admin"

    #################################################################
    # EXTENSION POINT:
    # Add your Behat scenarios here.
    # They will be tested alongside Boost Union's
    # scenarios in Github Actions.
    #################################################################
