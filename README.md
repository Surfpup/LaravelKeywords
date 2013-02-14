LaravelKeywords
===============

Create meta tags/keywords and relate them to other tables via a polymorphic relationship.

Installation (WIP)

For the moment, not published as a composer package, so just place (in your project folder) at: workbench/surfpup/keywords
And remember to add to the project's composer.json, in "autoload" -> "classmap": "workbench/surfpup/keywords"
Then to run tests, run:
	phpunit workbench/surfpup/keywords/

For any model that you wish to assign keywords to, simply extend the KeywordObject model class, and use the following methods:

KeywordObject methods
* addKeyword($word) - Assign a keyword
* addKeywords($words) - Assign multiple keywords (with an array or comma-separated string)
* keywords - The relationship method which accesses KeywordMap objects
* getKeywordNames() - Returns an array of keyword names
* getKeywords() - Returns an array of KeywordMap objects joined with the keyword name