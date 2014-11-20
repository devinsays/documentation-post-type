'use strict';
module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	    makepot: {
	        target: {
	            options: {
	                domainPath: '/languages/', // Where to save the POT file.
	                potFilename: 'documentation-post-type.pot', // Name of the POT file.
	                type: 'wp-plugin',
	                updateTimestamp: true,
	                exclude: [ 'includes/class-dashboard-glancer.php' ]
	            }
	        }
	    }
	});

	grunt.registerTask( 'default', [
		'makepot',
    ]);

};
