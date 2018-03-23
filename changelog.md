## Change Log

Team membership:  Li-Yan Tong (Captain) & Jeffrey Chou (Mate)  
Team conventions: Allman notation, markdown for changelog  
Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

## [Released]

## *Version 4.0*
Update based on Lab 8 - Modified data access from CSV_Model to XML_Model.
Release Date: March 23, 2018

## *Version 3.0*
Update based on Lab 7 - Added unit testing functionality to site.
Release Date: March 11, 2018

## *Version 2.0*
Update based on Lab 6 - Add task completion functionality to site.
Release Date: March 4, 2018

## Updated Components
- Updated changelog for master release 2.0.

## *Version 1.0*
Release Date: Feb 17, 2018

## Updated Components
- Updated changelog for master release.

## [Unreleased]
## *Version 3.1*

Release Date: March 22, 2018

## New Components
- Add tasks.xml file

## Updated Components
- Modified Tasks.php to extend XML_Model
- Modified XML_Model load() function to utilize simplexml_load_file


## *Version 2.2*

Release Date: March 11, 2018

## New Components
- Link to Travis CI
- Create task folder with Bootstrap.php, TaskTest.php, TaskListTest.php files
- Add phpunit.xml file

## Updated Components
- Update Task tests and TaskList collection tests.

## *Version 2.1*

Release Date: March 8, 2018

## New Components
- Create Task.php entity model
- Installed phpunit 6 test files to project

## Updated Components
- Update Entity.php with magic getter
- Update .gitignore to ignore local composer and phpunit test files

## *Version 1.3*

Release Date: March 4, 2018

## New Components
- Create views/itemadd.php which contains a link to add a new item
- Create views/oneitemx.php so owner has clickable tasks to enable updating
- Create views/itemedit.php to display the form

## Updated Components
- Update controller/Mtce to show owner specific features
- Updated controller/Mtce to add, edit, and delete tasks using a form, to handle showing the form, and to handle form submission and cancellation
- Update models/App.php to provide default values when one is not found
- Updated models/Task.php to validate fields

## *Version 1.2*

Release Date: March 3, 2018

## New Components
-

## Updated Components
- Update View controller to link list checkboxes on work page to update task
  items in tasks.csv file.
- Update Work page to have checkboxes to indicate task completion.
- Update by_priority and by_category lists on Work page to have
  form buttons for submmission.

## *Version 1.1*

Release Date: March 3, 2018

## New Components
- Create Roles.php to track user login and tracking pages
- Create itemnav.php for pagination navigation

## Updated Components
- Update maintenance view to show user role associated with tasks.
- Update config and autoload to work with user login fucntions
- Update constants.php with Guest and Owner user roles
- Update Mtce.php controller to work with paginating 10 tasks per page.

## *Version 0.2*

Release Date: Feb 15, 2018

## New Components
- Create Mtce.php controller for maintenance page
- Create itemlist.php view for maintenance page.
- Created Views.php controller and model; by_category.php and by_priority.php views
- Added Helpme.php controller to load help me page.
- Added jobs.md data which is the help ad
- Added Parsedown library to parse markdown files

## Updated Components
- Seperate maintenance page elements into modular (one item) template elements & update controller to work with new templates.
- Update Tasks.php to order unfished tasks by category
- Update Views.php to grab tasks by priority
- Update homepage to display a table with TODO .csv data
- Update homepage content to show total task alerts
- Update MY_Controller to display team name for page title
- Update MY_Controller template rendering to provide pre rendered content

## *Version 0.1*

Release Date: Feb 15, 2018

## New Components
- Add Task.php model
- Create changelog

## Updated Components
- Update autoload.php to include the task model
- Update README.md
