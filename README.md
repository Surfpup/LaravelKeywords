LaravelKeywords
===============

Create meta tags/keywords and relate them to other tables via a polymorphic relationship.

For any model that you wish to assign keywords to, simply extend the KeywordObject model class, and use the following methods:

KeywordObject methods
* addKeyword($word) - Assign a keyword
* addKeywords($words) - Assign multiple keywords (with an array or comma-separated string)
* keywords - The relationship method which accesses KeywordMap objects
* getKeywords - Returns an array of keyword names