# Capstone

_A custom WordPress theme._

## Building the Project

Building assets for this project requires a few little tools.

### Setup

* **[Sass](http://sass-lang.com):** a “CSS preprocessor” that extends regular ol’ CSS with some goodies
* **[Gulp](http://gulpjs.com/):** a command line build system

#### Installing Sass

1. You need to have [Ruby running on your machine](https://www.ruby-lang.org/en/downloads/) (most systems come with it pre-installed).
2. Open a [shell window](http://en.wikipedia.org/wiki/Shell_(computing)) and run `gem install sass`. (You may need to run `sudo gem install sass` if it doesn’t work.)

#### Getting Gulp Up and Running

1. Gulp runs on [Node.js](http://nodejs.org/). [Download and install Node.js](http://nodejs.org/download/).
2. To install Gulp and its dependencies, navigate to this project’s root folder in a shell window and run `npm install`.

### Generating Assets

Run `gulp` in the project’s root folder to build the theme’s stylesheets and scripts.
