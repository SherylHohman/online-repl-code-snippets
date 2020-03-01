Example of how to parse $_SERVER['HTTP_HOST'] variable into parts useful for a master config file.  
Also example on using implode (join), and explode (split) with it's optional `limit` parameter.

For a master config file, I'm interested in whether or not the SERVER's HTTP_HOST is defined with or without the `www.` included in the url.  This way when setting (WP_SITE or WP_HOME) variables, I know whether or not to ADD `www.` to the server variable, in order to properly compost the Preferred CANONICAL url for the site.  The Preferred Canonical url for the site is a decision that must be made when initially creating the site.  Decide if you prefer urls to include www or not.  Then redirect any incoming urls to the preferred version.  
Depending on the server, it may be defined one way or the other, and it can be independent of the desired canonical version.  

I can use the remaining subdomain (www is technically a subdomain, but it is not to be included in this piece)  
to determine if the "site" is a DEV site or a LIVE site, by whitelisting/defining subdomains as being dev vs live sites.  
I can also use particular subdomains to indicate whether the domain/server is LOCAL to my laptop, or if it belongs
  to a server on the cloud, and even which server it belongs to.  
  This can further be used to set the DATABASE.  

Finally, the main domain name (second-level domain + top-level domain, eg `example.com`)  
  can be used to indicate whether the site's canonical url is SUPPOSED to include `www.` or not.  
  By defining a list of sites that do/dont, I can further eliminate user error in the CONFIG file.  

HOWEVER, these are only as good as the maintained list of domains is kept up to date.  
  - main domains CANONICAL url supposed to include `www` vs not.  
  - subdomains are DEV vs LIVE  
  - subdomains or IP's use which databases  

