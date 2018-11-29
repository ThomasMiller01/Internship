module.exports = function (grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		jsdoc: {
			dist: {
				src: ['js/*.js'],
				options: {destination: '/doc'}
			}
		},

		// Task watch
		watch: {
			css: {
				files: ['css/src/*.less'],
				tasks: ['less','cssmin'] 
				//options: {livereload: 35729}
			},
			js: {
				files: ['js/**/*.js'],
				tasks: ['uglify:jsmin'] 
				//options: {livereload: 35729}
			},
			hbs: {
				files: ['html/src/*.hbs'],
				tasks: ['assemble'] 
				//options: {livereload: 35729}
			},

		},

		assemble: {
			options: {
				flatten: true,
				layout: 'layout.hbs',
				layoutdir: 'html/assemble/layout'
			},
			pages: {
				expand: true,
    			cwd: 'html/assemble/src',
    			src: ['**/*.hbs'],
				dest: 'dist/html'
			}
		},

		uglify: {
			jsmin: {
				src: ['js/src/*.js'],
				dest: 'dist/js/script.min.js'
			}
		},

		cssmin: {
			minify: {
				options: {
					noAdvanced: true
				},
				src: ['css/style.css'],
				dest: 'dist/css/style.min.css'
			}
		},

		less: {
			main: {
				expand: true,
				ext: '.css',
				cwd: 'css/src/',
				src: '*.less',
				dest: 'css/'
			}
		}
	});


	grunt.loadNpmTasks('grunt-assemble');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-jsdoc');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Tasks
	grunt.registerTask('default', ['watch']);
	grunt.registerTask('build', ['watch']);

};