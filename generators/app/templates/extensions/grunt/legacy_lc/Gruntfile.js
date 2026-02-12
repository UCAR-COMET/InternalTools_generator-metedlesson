// NEW BUILD: LC LEGACY TEMPLATE VERSION
module.exports = function(grunt) {
  grunt.initConfig({
    // Build project scaffold
    mkdir: {
      all: {
        options: {
          create: [
            "build/media",
            "build/media/graphics",
            "build/media/video",
            "build/assets",
            "dist/src",
            "dist/src/js",
            "dist/src/css",
            "dist/media",
            "dist/media/graphics",
            "dist/media/video"
          ]
        }
      }
    },
    // Copy original SRC files to DIST
    copy: {
      main: {
        files: [
          { //CORE php and htm files
            expand: true,
            flatten: true,
            src: ["build/*.php", "build/index.htm"],
            dest: "dist/.",
            filter: "isFile"
          },
          { //CORE css files -> to /dev
            expand: true,
            flatten: true,
            src: [
              "build/jquery/jquery.min.css",
              "build/bootstrap/css/bootstrap.min.css",
              "build/css/*.css"
            ],
            dest: "dist/dev/css/.",
            filter: "isFile"
          },
          { //defaults.js -> to /src
            expand: true,
            flatten: true,
            src: ["build/jquery/defaults.js"],
            dest: "dist/src/js/.",
            filter: "isFile"
          },
          { //module-custom.* and module-print.css -> to /src
            expand: true,
            flatten: true,
            src: [
              "build/css/module-custom.*",
              "build/css/module-print.css"
            ],
            dest: "dist/src/css/.",
            filter: "isFile"
          }
        ]
      },
      vendor: {
        files: [
          { //Jquery and Bootstrap -> to /dev
            expand: true,
            flatten: true,
            src: [
              "build/jquery/jquery*.min.js",
              "build/bootstrap/js/bootstrap.min.js"
            ],
            dest: "dist/dev/js/.",
            filter: "isFile"
          },
          { //Modernizr -> to /dev
            expand: true,
            flatten: true,
            src: ["build/modernizr/modernizr.min.js"],
            dest: "dist/dev/js/modernizr/.",
            filter: "isFile"
          },
          { //Media Element Player, Fancybox, Image Sweep -> to /dev
            expand: true,
            flatten: true,
            src: [
              "build/jquery/meted-player/mediaelement-and-player.min.js",
              "build/jquery/apps/fancybox/fancybox.min.js",
              "build/jquery/apps/image-sweep/image-sweep.js"
            ],
            dest: "dist/dev/js/.",
            filter: "isFile"
          },
          { //Drag, Draw -> to /dev
            expand: true,
            flatten: true,
            src: [
              "build/jquery/apps/draw/draw.js",
              "build/jquery/apps/drag/drag.js"
            ],
            dest: "dist/dev/js/.",
            filter: "isFile"
          },
          { //LC defaults.js -> to /dev
            expand: true,
            flatten: true,
            src: ["build/jquery/defaults.js"],
            dest: "dist/dev/js/.",
            filter: "isFile"
          },
          { //All vendor CSS -> to /dev
            expand: true,
            flatten: true,
            src: [
              "build/jquery/meted-player/mediaelementplayer.min.css",
              "build/jquery/apps/**/*.css"
            ],
            dest: "dist/dev/css/.",
            filter: "isFile"
          },
          { //Bootstrap static elements -> to /src
            expand: true,
            flatten: true,
            src: ["build/bootstrap/fonts/**", "build/css/fonts/**"],
            dest: "dist/src/css/static/fonts/.",
            filter: "isFile"
          },
          { //Other static elements -> to /src
            expand: true,
            flatten: true,
            src: [
              "build/jquery/img/*",
              "build/jquery/meted-player/mejs-controls.svg",
              "build/jquery/apps/fancybox/*.gif",
              "build/jquery/apps/fancybox/*.png",
              "build/assets/*"
            ],
            dest: "dist/src/css/static/img/."
          },
          { //IE Support -> to /src
            expand: true,
            flatten: true,
            src: ["build/ie-support/**"],
            dest: "dist/src/js/ie-support/.",
            filter: "isFile"
          }
        ]
      }
    },
    // CONCAT AND MINIFY CSS: styles.css
    cssmin: {
      options: {
        mergeIntoShorthands: true,
        roundingPrecision: -1
      },
      target: {
        files: {
          "dist/dev/css/vendor-compiled.min.css": ["dist/dev/css/bootstrap.min.css", "dist/dev/css/fancybox.min.css", "dist/dev/css/jquery.fancybox*.css", "dist/dev/css/mediaelementplayer.min.css"],
          "dist/dev/css/meted-core.css": ["dist/dev/css/meted-base.min.css", "dist/dev/css/image-sweep.css"],
        }
      }
    },
    /*sass: {
      options: {
          implementation: sass,
          sourceMap: true
      },
      dist: {
          files: {
              'dist/src/css/module-custom.css': 'dist/src/css/module-custom.scss'
          }
      }
    },*/
    // CONCAT AND COMPRESS JS: core.js
    concat: {
      options: {
        separator: "\n/** ============================== **/\n/** ============================== **/\n",
        // Replace all 'use strict' statements in the code with a single one at the top
        banner: "'use strict';\n",
        process: function(src, filepath) {
          return (
            "// Source: " +
            filepath +
            "\n" +
            src.replace(/(^|\n)[ \t]*('use strict'|"use strict");?\s*/g, "$1")
          );
        }
      },
      dist: {
        src: [ // List in order instead of * to avoid conflicts
          "dist/dev/js/jquery.min.js",
          "dist/dev/js/jquery-ui.min.js",
          "dist/dev/js/jquery-plugins.min.js",
          "dist/dev/js/bootstrap.min.js",
          "dist/dev/js/fancybox.min.js",
          "dist/dev/js/mediaelement-and-player.min.js",
          "dist/dev/js/image-sweep.js",
          "dist/dev/js/draw.js",
          "dist/dev/js/drag.js",
          "dist/dev/js/modernizr.min.js",
          "!dist/dev/js/defaults.js"
        ],
        dest: "dist/src/js/core.js"
      }
    },
    // ADD JS AND CSS LINK TAGS TO PAGES
    tags: {
      tagIndex: {
        options: {
          linkTemplate: '<link rel="stylesheet" media="screen" href="{{ path }}"/>',
          scriptTemplate: '<script src="{{ path }}"></script>',
          openTag: "<!-- =CORE TAGS START= -->",
          closeTag: "<!-- =CORE TAGS END= -->"
        },
        src: [
          "dist/src/css/styles.css",
          "dist/src/css/module-custom.css",
          "dist/src/js/*.js",
          "!dist/src/css/module-print.css"
        ],
        dest: "dist/index.htm"
      },
      tagDownload: {
        options: {
          linkTemplate: '<link rel="stylesheet" media="screen" href="{{ path }}"/>',
          scriptTemplate: '<script src="{{ path }}"></script>',
          openTag: "<!-- =CORE TAGS START= -->",
          closeTag: "<!-- =CORE TAGS END= -->"
        },
        src: [
          "dist/src/css/styles.css",
          "dist/src/css/module-custom.css",
          "dist/src/js/*.js",
          "!dist/src/css/module-print.css"
        ],
        dest: "dist/download.php"
      },
      tagMedia: {
        options: {
          linkTemplate: '<link rel="stylesheet" media="screen" href="{{ path }}"/>',
          scriptTemplate: '<script src="{{ path }}"></script>',
          openTag: "<!-- =CORE TAGS START= -->",
          closeTag: "<!-- =CORE TAGS END= -->"
        },
        src: [
          "dist/src/css/styles.css",
          "dist/src/css/module-custom.css",
          "dist/src/js/*.js",
          "!dist/src/css/module-print.css"
        ],
        dest: "dist/media_gallery.php"
      },
      tagPageTemplate: {
        options: {
          linkTemplate: '<link rel="stylesheet" media="screen" href="{{ path }}"/>',
          scriptTemplate: '<script src="{{ path }}"></script>',
          openTag: "<!-- =CORE TAGS START= -->",
          closeTag: "<!-- =CORE TAGS END= -->"
        },
        src: [
          "dist/src/css/styles.css",
          "dist/src/css/module-custom.css",
          "dist/src/js/*.js",
          "!dist/src/css/module-print.css"
        ],
        dest: "dist/pageTemplate.php"
      },
      tagPrint: {
        options: {
          linkTemplate: '<link rel="stylesheet" media="print" href="{{ path }}"/>',
          scriptTemplate: '<script src="{{ path }}"></script>',
          openTag: "<!-- =CORE TAGS START= -->",
          closeTag: "<!-- =CORE TAGS END= -->"
        },
        src: [
          "dist/src/css/styles.css",
          "dist/src/css/module-custom.css",
          "dist/src/js/*.js",
          "!dist/src/css/module-print.css"
        ],
        dest: "dist/print.php"
      }
    },
    concat_css: {
      options: {
        assetBaseUrl: "static/",
        baseDir: "dist/src/css/static/(styles|assets)"
      },
      all: {
        src: [ // List in order instead of * to avoid conflicts
          "dist/dev/css/vendor-compiled.min.css",
          "dist/src/css/meted-core.css",
          "!dist/dev/css/module-print.css",
          "!dist/dev/css/module-custom.css"
        ],
        dest: "dist/src/css/styles.css"
      }
    },
    // CLEAN THE BUILDS
    clean: {
      core: ["dist/dev", "./.sass-cache/"],
      dist: ["dist"],
      node: ["node_modules", "package*"],
      grunt: ["./Gruntfile.js"]
    }
  });

  grunt.registerTask("default", [
    "mkdir",
    "copy",
    "cssmin",
    "concat",
    "concat_css",
    "tags",
    "clean"
    /*"sass",*/
  ]);
  // Grunt.registerTask("default", ['mkdir']);
  // grunt.registerTask("optimize", ['mkdir']);
  // grunt.registerTask('conversion', ['mkdir']);
 
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-mkdir");
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-concat-css");
  grunt.loadNpmTasks("grunt-script-link-tags");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
};
