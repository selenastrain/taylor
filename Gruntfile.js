'use strict';
module.exports = function(grunt) {

  // Load all tasks
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      sass: {
        files: [
          'assets/scss/*.{scss,sass}',
          'assets/scss/**/*.{scss,sass}',
          'assets/scss/**/**/*.{scss,sass}'
        ],
        tasks: 'sass:dev',
      },
      livereload: {
        options: { livereload: true },
        files: ['style.css', 'assets/js/**/*.js', 'assets/images/**/*.{png,jpg,jpeg,gif,web,svg}']
      }
    },

    sass: {
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          'style.css': 'assets/scss/style.scss',
        }
      },
      release: {
        options: {
          style: 'expanded'
        },
        files: {
          'style.css': 'assets/scss/style.scss'
        }
      },
    },

    autoprefixer: {
      options: {
        browers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
      },
      single_file: {
        src: 'style.css',
        dest: 'style.css'
      },
    },

    csscomb: {
      options: {
        config: '.csscomb.json'
      },
      files: {
        expand: true,
        cwd: '/',
        src: 'style.css',
        dest: '/',
      }
    },

    makepot: {
      target: {
        options: {
          domainPath: '/languages',
          potFilename: 'taylor.pot',
          type: 'wp-theme',
          processPot: function( pot, options ) {
            pot.headers['report-msgid-bugs-to'] = 'http://selenastrain.com/contact/';
            pot.headers['last-translator'] = 'Selena Strain';
            pot.headers['language-team'] = 'Selena Strain';
            return pot;
          }
        }
      }
    },

  });

  grunt.registerTask('default', ['watch']);
  grunt.registerTask('release', [
    'sass:release',
    'autoprefixer',
    'csscomb',
    'makepot'
  ]);

};