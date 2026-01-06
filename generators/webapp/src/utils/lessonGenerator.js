import JSZip from "jszip";
import { saveAs } from "file-saver";
import {
  indexTemplate,
  downloadTemplate,
  pageTemplateTemplate,
  mediaGalleryTemplate,
  printTemplate
} from "./templates/index.js";

// Template processing function - replaces {{variable}} with actual values
function processTemplate(template, variables) {
  let processed = template;

  Object.keys(variables).forEach(key => {
    const regex = new RegExp(`{{${key}}}`, "g");
    processed = processed.replace(regex, variables[key] || "");
  });

  // Handle conditional rendering for narrated switch
  if (variables.narratedSwitch) {
    processed = processed.replace(
      /{{#if narratedSwitch}}([\s\S]*?){{\/if}}/g,
      "$1"
    );
  } else {
    processed = processed.replace(
      /{{#if narratedSwitch}}[\s\S]*?{{\/if}}/g,
      ""
    );
  }

  return processed;
}

// Generate path structure from metedPath
function generatePathStructure(metedPath) {
  let pathArray = metedPath.split("/").filter(segment => segment.length > 0);
  let structure = pathArray.map(() => "..").join("/");
  return structure;
}

// Get language code for HTML lang attribute
function getLangCode(metedLang) {
  switch (metedLang) {
    case "ES":
      return "es";
    case "FR":
      return "fr";
    default:
      return "en";
  }
}

// Main lesson generation function
export async function generateLesson(formData) {
  const zip = new JSZip();
  const buildFolder = zip.folder("build");

  // Prepare template variables
  const templateVars = {
    templateType: formData.templateType,
    lessonTitle: formData.metedName,
    lessonID: formData.metedID,
    lessonLang: formData.metedLang,
    lessonDesc: formData.metedDesc || "",
    lessonKeys: formData.metedKeys || "",
    lang: getLangCode(formData.metedLang),
    copyrightYear: formData.customYear || new Date().getFullYear(),
    splashImageCredit: formData.splashImageCredit || "The COMET Program",
    narratedSwitch: formData.narratedLesson,
    pathStructure: generatePathStructure(formData.metedPath),
    generatedDate: new Date().toISOString().split("T")[0]
  };

  // Generate main HTML file
  const indexContent = processTemplate(indexTemplate, templateVars);
  buildFolder.file("index.htm", indexContent);

  // Generate PHP files
  const downloadContent = processTemplate(downloadTemplate, templateVars);
  buildFolder.file("download.php", downloadContent);

  const pageTemplateContent = processTemplate(
    pageTemplateTemplate,
    templateVars
  );
  buildFolder.file("pageTemplate.php", pageTemplateContent);

  const mediaGalleryContent = processTemplate(
    mediaGalleryTemplate,
    templateVars
  );
  buildFolder.file("media_gallery.php", mediaGalleryContent);

  const printContent = processTemplate(printTemplate, templateVars);
  buildFolder.file("print.php", printContent);

  // Copy constant files from latest_core templates
  await copyConstantFiles(buildFolder, formData.metedLang);

  // Create package.json for the generated project
  const packageJson = {
    name: `meted-lesson-${formData.metedID}`,
    version: "1.0.0",
    description: formData.metedDesc || formData.metedName,
    main: "index.htm",
    scripts: {
      build: "grunt",
      dev: "grunt watch"
    },
    devDependencies: {
      grunt: "^1.5.3",
      "grunt-cli": "^1.4.3",
      "grunt-concat-css": "^0.3.2",
      "grunt-contrib-clean": "^2.0.1",
      "grunt-contrib-concat": "^2.1.0",
      "grunt-contrib-copy": "^1.0.0",
      "grunt-contrib-cssmin": "^4.0.0",
      "grunt-mkdir": "^1.1.0",
      "grunt-script-link-tags": "^1.0.2"
    }
  };

  zip.file("package.json", JSON.stringify(packageJson, null, 2));

  // Create basic Gruntfile
  const gruntContent = generateGruntfile();
  zip.file("Gruntfile.js", gruntContent);

  // Create README
  const readmeContent = generateReadme(formData);
  zip.file("README.md", readmeContent);

  // Return downloadable zip data
  return {
    download: async () => {
      const zipBlob = await zip.generateAsync({ type: "blob" });
      saveAs(
        zipBlob,
        `meted-lesson-${formData.metedID}-${formData.metedName
          .replace(/[^a-zA-Z0-9]/g, "-")
          .toLowerCase()}.zip`
      );
    },
    files: [
      "build/index.htm",
      "build/download.php",
      "build/pageTemplate.php",
      "build/media_gallery.php",
      "build/print.php",
      "build/css/meted-base.min.css",
      "build/css/module-absorb.css",
      "build/css/module-print.css",
      "build/jquery/jquery.min.js",
      "build/jquery/jquery-ui.min.js",
      "build/jquery/defaults.js",
      "build/bootstrap/css/bootstrap.min.css",
      "build/bootstrap/js/bootstrap.min.js",
      "build/assets/README.txt",
      "build/ie-support/html5shiv.js",
      "build/ie-support/respond.js",
      "build/ie-support/ie-support.css",
      "build/modernizr/modernizr.js",
      "package.json",
      "Gruntfile.js",
      "README.md"
    ],
    metadata: templateVars
  };
}

// Copy constant files from latest_core template directory
async function copyConstantFiles(buildFolder, language = "EN") {
  // Import constant files - these would typically be fetched from the template directory
  // For now, we'll create the structure and add the essential files

  // Create CSS folder with core MetEd styles
  const cssFolder = buildFolder.folder("css");
  cssFolder.file("meted-base.min.css", generateBaseCss());
  cssFolder.file("module-absorb.css", generateAbsorbCss());
  cssFolder.file("module-print.css", generatePrintCss());

  // Create jQuery folder with library files
  const jqueryFolder = buildFolder.folder("jquery");
  jqueryFolder.file("jquery.min.js", await getJqueryLibrary());
  jqueryFolder.file("jquery-ui.min.js", await getJqueryUILibrary());
  jqueryFolder.file("defaults.js", generateDefaultsJs(language));

  // Create Bootstrap folder structure
  const bootstrapFolder = buildFolder.folder("bootstrap");
  const bootstrapCssFolder = bootstrapFolder.folder("css");
  const bootstrapJsFolder = bootstrapFolder.folder("js");
  bootstrapCssFolder.file("bootstrap.min.css", await getBootstrapCSS());
  bootstrapJsFolder.file("bootstrap.min.js", await getBootstrapJS());

  // Create assets folder
  const assetsFolder = buildFolder.folder("assets");
  assetsFolder.file(
    "README.txt",
    "Place your lesson assets (images, videos, etc.) in this folder"
  );

  // Create IE support folder
  const ieFolder = buildFolder.folder("ie-support");
  ieFolder.file("html5shiv.js", getHTML5Shiv());
  ieFolder.file("respond.js", getRespondJS());
  ieFolder.file("ie-support.css", generateIeSupportCss());

  // Create modernizr folder
  const modernizrFolder = buildFolder.folder("modernizr");
  modernizrFolder.file("modernizr.js", getModernizrLibrary());
}

// Get library files - in a real implementation, these would be loaded from files
async function getJqueryLibrary() {
  return `/*! jQuery v3.6.0 | (c) OpenJS Foundation and other contributors */
/* Minified jQuery library would be here in production */
console.log("jQuery library loaded");`;
}

async function getJqueryUILibrary() {
  return `/*! jQuery UI v1.13.2 | (c) OpenJS Foundation and other contributors */
/* Minified jQuery UI library would be here in production */
console.log("jQuery UI library loaded");`;
}

async function getBootstrapCSS() {
  return `/*!
 * Bootstrap v3.4.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under MIT
 */
/* Bootstrap CSS would be here in production */
body { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }`;
}

async function getBootstrapJS() {
  return `/*!
 * Bootstrap v3.4.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under MIT
 */
/* Bootstrap JS would be here in production */
console.log("Bootstrap JS loaded");`;
}

function getHTML5Shiv() {
  return `/*!
 * HTML5 Shiv v3.7.3 | @afarkas @jdalton @jon_neal @rem
 * MIT/GPL2 Licensed
 */
/* HTML5 Shiv for IE support would be here in production */`;
}

function getRespondJS() {
  return `/*!
 * Respond.js v1.4.2: min/max-width media query polyfill
 * Copyright 2013 Scott Jehl
 * Licensed under MIT
 */
/* Respond.js for IE support would be here in production */`;
}

function getModernizrLibrary() {
  return `/*!
 * Modernizr v3.11.2
 * Build https://modernizr.com/download?-setclasses-dontmin
 * Copyright (c) Faruk Ates, Paul Irish, Alex Sexton
 * MIT License
 */
/* Modernizr library would be here in production */`;
}

// CSS generation functions
function generateBaseCss() {
  return `/* MetEd Base Styles - Latest Core */
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

.lesson-header {
  background: #f8f9fa;
  padding: 2rem 0;
  border-bottom: 1px solid #dee2e6;
}

.lesson-title {
  color: #2c3e50;
  font-size: 2.5rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

.lesson-description {
  color: #6c757d;
  font-size: 1.1rem;
  margin-bottom: 0;
}

.lesson-content {
  padding: 2rem 0;
}

.content-placeholder {
  background: #f8f9fa;
  border: 2px dashed #dee2e6;
  padding: 3rem;
  text-align: center;
  margin: 2rem 0;
  border-radius: 0.5rem;
}

.footer {
  background: #343a40;
  color: white;
  padding: 2rem 0;
  margin-top: 4rem;
}`;
}

function generateAbsorbCss() {
  return `/* Absorb Module Styles */
.absorb-container {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
  padding: 2rem 0;
}

.absorb-card {
  background: white;
  border-radius: 1rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  overflow: hidden;
}

.absorb-header {
  background: linear-gradient(45deg, #667eea, #764ba2);
  color: white;
  padding: 2rem;
}

.narration-controls {
  margin: 1rem 0;
}

.narration-controls .btn {
  margin-right: 0.5rem;
}`;
}

function generatePrintCss() {
  return `/* Print Styles */
@media print {
  body {
    font-size: 12pt;
    line-height: 1.4;
    color: black;
  }
  
  .navbar,
  .footer,
  .no-print {
    display: none !important;
  }
  
  .print-header {
    border-bottom: 2px solid black;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
  }
  
  .print-content {
    margin: 2rem 0;
  }
  
  .print-footer {
    border-top: 1px solid black;
    margin-top: 2rem;
    padding-top: 1rem;
    text-align: center;
  }
}`;
}

function generateIeSupportCss() {
  return `/* IE Support Styles */
.lt-ie9 .container {
  width: 960px;
}

.lt-ie9 .navbar-nav {
  float: right;
}

.lt-ie9 .btn {
  border-radius: 0;
}`;
}

function generateDefaultsJs(language) {
  const defaults = {
    EN: {
      labels: {
        home: "Home",
        print: "Print Lesson",
        download: "Download",
        next: "Next",
        previous: "Previous",
        close: "Close"
      }
    },
    ES: {
      labels: {
        home: "Inicio",
        print: "Imprimir Lección",
        download: "Descargar",
        next: "Siguiente",
        previous: "Anterior",
        close: "Cerrar"
      }
    },
    FR: {
      labels: {
        home: "Accueil",
        print: "Imprimer la Leçon",
        download: "Télécharger",
        next: "Suivant",
        previous: "Précédent",
        close: "Fermer"
      }
    }
  };

  return `// MetEd Lesson Defaults - ${language}
var MetEdDefaults = ${JSON.stringify(
    defaults[language] || defaults.EN,
    null,
    2
  )};

// Initialize defaults when document is ready
$(document).ready(function() {
  console.log('MetEd Lesson initialized for language: ${language}');
});`;
}

function generateGruntfile() {
  return `module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    clean: {
      dist: ['dist/']
    },
    
    copy: {
      main: {
        files: [
          {
            expand: true,
            cwd: 'build/',
            src: '**/*',
            dest: 'dist/'
          }
        ]
      }
    },
    
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'build/css',
          src: ['*.css', '!*.min.css'],
          dest: 'dist/css',
          ext: '.min.css'
        }]
      }
    },
    
    concat: {
      css: {
        src: ['build/css/meted-base.min.css', 'build/css/module-absorb.css'],
        dest: 'dist/css/combined.min.css'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('default', ['clean', 'copy', 'cssmin', 'concat']);
};`;
}

function generateReadme(formData) {
  return `# ${formData.metedName}

**Lesson ID:** ${formData.metedID}  
**Language:** ${formData.metedLang}  
**Template:** Latest Core  
**Generated:** ${new Date().toISOString().split("T")[0]}

## Description

${formData.metedDesc || "No description provided"}

## Keywords

${formData.metedKeys || "No keywords provided"}

## Getting Started

1. Install dependencies:
   \`\`\`bash
   npm install
   \`\`\`

2. Build the lesson:
   \`\`\`bash
   npm run build
   \`\`\`

3. Open \`build/index.htm\` in your browser to view the lesson.

## Development

- Edit files in the \`build/\` directory
- Use Grunt tasks for building and optimization
- Place media assets in \`build/assets/\`

## Generated Files

- \`build/index.htm\` - Main lesson page
- \`build/pageTemplate.php\` - Page template for multi-page lessons
- \`build/download.php\` - Download handler
- \`build/media_gallery.php\` - Media gallery page
- \`build/print.php\` - Print-friendly version

## Copyright

© ${formData.customYear ||
    new Date().getFullYear()} ${formData.splashImageCredit ||
    "The COMET Program"}

---

*Generated by MetEd Lesson Generator v1.0.0*`;
}
