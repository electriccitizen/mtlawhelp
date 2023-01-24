# THEME-INSTALL.md

## ABOUT CITIZEN DART THEME - something

For Drupal 9, Citizen Dart uses the Stable theme starting place, and is meant to expand on that to theme this website.

This theme is compiled using Dart Sass via the Dart VM. This is the fastest, cleanest, most modern way of using Sass. All Sass is written in partial _scss files which are forwarded to a single _index.scss file in each folder of the theme. These index files are then compiled in the main style.scss file and ouput to compressed CSS using the command line.

## GETTING STARTED

Working with Citizen Dart requires a few things: 

To get started:
(a) get a local site instance spun up following the instructions in the project root.
(b) Make sure you have Dart Sass installed globally.  On Macs and Linux you can install it with a single command using Homebrew.  From your root ./~ folder, run 
```
brew install sass/sass/sass
```
(d) cd into the folder for Citizen Dart and you are ready to start running the theme. The theme can be ran in multiple different ways from the theme root:
(d1) Create a .bash_profile or .zshrc alias for the sass watch command: 
```
sass --watch components:dist  --style compressed 
```
Using a profile will allow your to simply type whatever the profile is and the theme command will run, watch and compile the Sass.
(d2) Add a package.json file to the theme (if you do this, do not commit it to the repo) and create a script to run the same theme command. This is a theme-specific version of creating a profile alias.
(d3) Simply run the verbose theme command from the project root:
```
sass --watch scss:dist  --style compressed
```

Working: 
(a) cd into the Citizen Dart folder
(b) run whichever theme command you prefer from above.

## PHPStorm IDE FileWatcher setup
1. In the citizen_dart theme, open the `components/style.scss` file.
2. Open the Preferences pane and go to Tools > FileWatchers.
3. Create a new SCSS watcher.
4. Complete the fields as follows:
   ```
   Scope: Project Files
   Program: sass
   Arguments: --style=compressed $FileDir$/$FileName$:$FileParentDir$/dist/$FileNameWithoutExtension$.css
   Output paths to refresh: $FileNameWithoutExtension$.css:$FileNameWithoutExtension$.css.map
   ```