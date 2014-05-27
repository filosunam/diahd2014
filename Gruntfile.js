'use strict';

module.exports = function (grunt) {

  // Load all grunt tasks
  require('load-grunt-tasks')(grunt);

  // Config
  grunt.initConfig({

    // Uglify javascript files
    uglify: {
      production: {
        files: {
          'built/js/main.min.js': [
            'assets/scripts/main.js'
          ]
        }
      }
    },

    // Compile less files
    less: {
      development: {
        files: {
          'built/css/styles.css': 'assets/styles/styles.less'
        }
      },
      production: {
        options: {
          cleancss: true
        },
        files: {
          'built/css/styles.css': 'assets/styles/styles.less'
        }
      }
    },

    // Watch
    watch: {
      less: {
        files: [ 'assets/styles/*.less' ],
        tasks: [ 'less:development' ],
        options: { nospawn: true }
      },
      livereload: {
        options: { livereload: true },
        files: [
          '**/*.less',
          '**/*.php'
        ]
      }
    }

  });

  // Build Task
  grunt.registerTask('build', [ 'less:production', 'uglify:production' ]);

  // Default task
  grunt.registerTask('default', 'build');

}
