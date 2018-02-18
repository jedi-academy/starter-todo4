## Change Log

Team membership:  Li-Yan Tong (Captain) & Jeffrey Chou (Mate)  
Team conventions: Allman notation, markdown for changelog  
Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

## [Released]

## *Version 1.0*
Release Date: Feb 17, 2018

## Updated Components
- Updated changelog for master release.

## Updated Components

## [Unreleased]

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
