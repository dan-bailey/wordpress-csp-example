# wordpress-csp-example

This file serves as an example in how to insert headers into the front-end of your Wordpress build.  This is useful for sending things like a Content Security Policy (shown) when you don't or can't mess around with your server settings.  Or if you need to do dynamic generation of a nonce (also shown) for inline signing of Javascript.

You can certainly add whatever other headers you'd like instead, should be pretty straightforward.

To implement this, you'll need to update the chunks of the CSP variables, and drop this into your functions.php file.  Up near the top, ideally.
