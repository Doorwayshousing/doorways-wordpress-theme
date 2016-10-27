# doorways-wordpress-theme
Wordpress theme for the doorways org's website

##Install
1. Clone the repo to wherever your /wp-content/themes folder is in your local environemnt (or Production)
2. `cd doorways-wordpress-theme`
3. `npm install`
4. Work!  You can run jshint by running the default `grunt` task.


##Development
Doing `grunt build` will combine all the css files and minify as one `custom.min.css` file in the `dist/` folder.  It will do the same for all .js files, producing `custom.min.js`.  The header.php file uses these minified files when you serve the site locally.

`jshint` will be run before during the `build` task and will fail if there are syntax errors (so fix them).

### Make feature branches
For a change, make a new branch and merge it into the Master branch in origin.

##Deployment to Production
1.  ssh into the bluehost.com web hosting space.  cd into `public_html/wp-content/themes`.  You should find the `doorways-wordpress-theme` folder there.  `cd` into that, ensure that only master branch is there (check by doing `git branch`), and then pull latest from origin's Master (`git pull`, for example).
2. Do `npm install` to get packages for grunt.
3. Do `grunt build` to produce minified resources in the `dist/` folder.
4. All done!
