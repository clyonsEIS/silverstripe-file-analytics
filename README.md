# Comments

## Maintainers

 * Craig Lyons
  <clyons at execproinc dot com>

## Introduction

This module provides the ability to fire google analytics events when files are directly requested (i.e. PDFs)
Client-side approach allows for simple install & negates the need for a separate analytics account (which is required for server-side solutions).

## Requirements

 * SilverStripe 3.1
 * Page must properly include jquery & google analytics (Classic, ga.js)
 
## Installation

For apache, your .htaccess file will need to reroute requests to PDFs so they can hit a server-side FileAnalyticsController
The RewriteRule is skipped query string for processed=1; this query string is provided by the JS redirect after tracking the event.

```
### PDF Tracking ###
RewriteCond %{QUERY_STRING} !processed=1
RewriteRule ^(.*\.pdf)$ file-analytics?seg=$1 [R=302,L,NC]
####################
```

## Limitations
 * Because of the client-side redirect, a 301 status cannot be sent, so this will likely prevent PDFs from being indexed by search engines.
 * Only Classic Analytics is supported (ga.js).  Look for Universal Analytics (analytics.js) in a future version.
