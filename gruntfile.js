module.exports = function (grunt) {
	
	// Initialize configuration object
	grunt.initConfig({

		// Read in project settings
		pkg: grunt.file.readJSON('package.json'),

		// User editable project settings & variables
		options: {
			// Base path to your assets folder
			base: 'app/assets',

			// Published assets path
			publish: 'public/assets',

			// Files to be clean on rebuild
			clean: {
				all: ['<%= options.css.concat %>', '<%= options.css.min %>', '<%= options.less.compiled %>', '<%= options.sass.compiled %>', '<%= options.stylus.compiled %>', '<%= options.js.min %>', '<%= options.js.concat %>', '<%= options.less.compiled %>'],
				concat: ['<%= options.css.concat %>', '<%= options.js.concat %>']
			},

			// CSS settings
			css: {
				base: 'app/assets/css',			 				// Base path to your CSS folder
				files: ['app/assets/css/less.css'],							// CSS files in order you'd like them concatenated and minified
				concat: '<%= options.css.base %>/concat.css',	// Name of the concatenated CSS file
				min: '<%= options.publish %>/style.min.css'		// Name of the minified CSS file
			},

			// JavaScript settings
			js: {
				base: 'app/assets/js',							// Base path to you JS folder
				files: ['app/assets/js/bootstrap.js','app/assets/js/restfulizer.js','app/assets/js/selectize.js'],							// JavaScript files in order you'd like them concatenated and minified
				concat: '<%= options.js.base %>/concat.js',		// Name of the concatenated JavaScript file
				min: '<%= options.publish %>/script.min.js'		// Name of the minified JavaScript file
			},

			// LESS Settings
			less: {
				base: 'app/assets/less',							// Base path to you LESS folder
				file: 'app/assets/less/master.less',							// LESS file (ideally, one file which contains imports)
				compiled: '<%= options.css.base %>/less.css'	// Name of the compiled LESS file
			},

			// SASS Settings
			sass: {
				base: 'assets/sass',							// Base path to you SASS folder
				file: 'assets/sass/main.sass',							// SASS file (ideally, one file which contains imports)
				compiled: '<%= options.css.base %>/sass.css'	// Name of the compiled SASS file
			},

			// STYLUS Settings
			stylus: {
				base: 'assets/stylus',							// Base path to you STYLUS folder
				file: 'assets/stylus/main.stylus',							// STYLUS file (ideally, one file which contains imports)
				compiled: '<%= options.css.base %>/stylus.css'		// Name of the compiled STYLUS file
			},

			// Notification messages
			notify: {
				watch: {
					title: 'Live Reloaded!',
					message: 'Files were modified, recompiled and site reloaded'
				}
			},

			// Files and folders to watch for live reload and rebuild purposes
			watch: {
				files: ['<%= options.js.files %>', '<%= options.css.files %>', '<%= options.less.base %>/*.less',
				 '<%= options.sass.base %>/*.sass', '<%= options.stylus.base %>/*.styl',
				 '!<%= option.js.min %>', '!<%= options.less.compiled %>', '!<%= options.sass.compiled %>', '!<%= options.stylus.compiled %>']
			}
		},

		// Clean files and folders before replacement
		clean: {
			all: {
				src: '<%= options.clean.all %>'
			},
			concat: {
				src: '<%= options.clean.concat %>'
			}
		},

		// Concatenate multiple sets of files
		concat: {
			css: {
				files: {
					'<%= options.css.concat %>' : ['<%= options.css.files %>']
				}
			},
			js: {
				options: {
					block: true,
					line: true,
					stripBanners: true
				},
				files: {
					'<%= options.js.concat %>' : '<%= options.js.files %>',
				}
			}
		},

		// Minify and concatenate CSS files
		cssmin: {
			minify: {
				src: '<%= options.css.concat %>',
				dest: '<%= options.css.min %>'
			}
		},

		// Javascript linting - JS Hint
		jshint: {
			files: ['<%= options.js.files %>'],
			options: {
				// Options to override JSHint defaults
				curly: true,
				indent: 4,
				trailing: true,
				devel: true,
				globals: {
					jQuery: true
				}
			}
		},

		// Compile LESS files
		less: {
			main: {
				options: {
					yuicompress: true,
					ieCompat: true
				},
				files: {
					'<%= options.less.compiled %>': '<%= options.less.file %>'
				}
			}
		},

		// Compile SASS files
		sass: {
			main: {
				files: {
					'<%= options.sass.compiled %>': '<%= options.sass.file %>'
				}
			}
		},

		// Compile STYLUS files
		stylus: {
			main: {
				files: {
					'<%= options.stylus.compiled %>': '<%= options.stylus.file %>'
				}
			}
		},

		// Display notifications
		notify: {
			watch: {
				options: {
					title: '<%= options.notify.watch.title %>',
					message: '<%= options.notify.watch.message %>'
				}
			}
		},

		// Javascript minification - uglify
		uglify: {
			options: {
				preserveComments: false
			},
			files: {
				src: '<%= options.js.concat %>',
				dest: '<%= options.js.min %>'
			}
		},

		// Watch for files and folder changes
		watch: {
			options: {
				livereload: true
			},
			files: '<%= options.watch.files %>',
			tasks: ['default', 'notify:watch']
		},

		phpcsfixer: {
			app: {
				dir: 'app'
			},
			options: {
				bin: '/usr/local/bin/php-cs-fixer',
			}
		},

	});

	// Load npm tasks
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-stylus');
	grunt.loadNpmTasks('grunt-contrib-livereload');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-notify');
	grunt.loadNpmTasks('grunt-php-cs-fixer');

	// Register tasks
	grunt.registerTask('default', ['clean:all', 'less',  'concat:css', 'concat:js', 'cssmin', 'uglify', 'clean:concat', 'phpcsfixer']); // Default task
}