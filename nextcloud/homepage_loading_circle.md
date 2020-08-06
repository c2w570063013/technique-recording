### solution1:

Same issue here after upgrading to 18.0.4, running behind nginx "proxy" and a standard next cloud install on the other end.
This was not a problem in 18.0.3.

EDIT: Disabling the text app makes the spinner disappear.
EDIT2: Creating README.md also makes the spinner disappear when text app is enabled.
[/data/user/files]# touch README.md

### solution2

Hi,
in my Nginx config I had:

error_page 403 /core/templates/403.php;

error_page 404 /core/templates/404.php;

Removing those, which are no longer in the provided Nginx configuration fixes the Issue for me.

### original problem link:
https://github.com/nextcloud/text/issues/820