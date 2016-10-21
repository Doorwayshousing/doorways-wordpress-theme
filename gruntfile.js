module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      files: ['Gruntfile.js', 'js/**/*.js'],
      options: {
        globals: {
          jQuery: true
        }
      }
    },
    watch: {
      files: ['<%= jshint.files %>'],
      tasks: ['jshint']
    },
    concat: {
      js: {
        src: 'js/*.js',
        dest: 'dist/js/custom.js'
      },
      css: {
        src: 'css/*.css',
        dest: 'dist/css/custom.css'
      }
    },
    uglify: {
        my_target: {
            files: {
                'dist/js/custom.min.js': ['dist/js/custom.js']
            }
        }
    },
    cssmin: {
      css:{
        src: 'dist/css/custom.css',
        dest: 'dist/css/custom.min.css'
      }
    }
  });

  grunt.loadNpmTasks('grunt-css');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('default', ['jshint']);
  grunt.registerTask('build', ['jshint', 'concat', 'uglify', 'cssmin']);

};
