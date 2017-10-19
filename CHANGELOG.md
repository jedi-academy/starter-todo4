# Changelog
All notable changes to this project will be documented in this file.
 - Style Conventions
   - 4 space indentation
   - Changes are grouped by commit date in descending order.
   - Oldest changes come first within each group but the order don't really matter.

# [latest version 1.0.0]

## [2.0.0] - 2017-10-19
 - Fixed Bootstrap bug.
 - Added Mtce controller for Maintenance page.
 - Added itemlist view and oneitem view to format data for the Maintenance page.
 - Updated config/config.php to include link to Maintenance page.
 - Added pagination in maintenance page.
 - Enabled task-completion in task list page.

## [version 1.0.0 released] - 2017-10-12

## [1.0.0] - 2017-10-12
 - Initialized the project by forking from: https://github.com/jedi-academy/starter-todo4.
 - Added a data model to retrieve data from a csv file.
 - Updated base controller to allow for pre-rendered content.
 - Updated homepage view to include alert of unfinished tasks and table of 5 tasks to do.
 - Updated Welcome controller to count unfinished tasks and get 5 tasks to do.
 - Updated Help wanted page to be able to display a markdown style wanting ad list.
 - Added template_secondary view to display sorted task panels.
 - Updated base controller to fix bug.
 - Added Views controller to display sorted task panels.
 - Added by_priority view for tasks list sorted by priority.
 - Added by_category view for tasks list sorted by category.
 - Updated Tasks model with function to generate tasks list ordered by category.