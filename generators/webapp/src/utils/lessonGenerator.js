import JSZip from "jszip";
import { saveAs } from "file-saver";
import {
  indexTemplate,
  pageTemplateTemplate,
  mediaGalleryTemplate,
  navmenuTemplate

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
    lessonPath: formData.metedPath,
    copyrightYear: formData.customYear || new Date().getFullYear(),
    splashImageCredit: formData.splashImageCredit || "The COMET Program",
    narratedSwitch: formData.narratedLesson,
    pathStructure: generatePathStructure(formData.metedPath),
    generatedDate: new Date().toISOString().split("T")[0]
  };

  // Generate [index.htm] file
  const indexContent = processTemplate(indexTemplate, templateVars);
  buildFolder.file("index.htm", indexContent);

  // Generate [pageTemplate.php] file
  const pageTemplateContent = processTemplate(pageTemplateTemplate, templateVars);
  buildFolder.file("pageTemplate.php", pageTemplateContent);

  // Generate [media_gallery.php] file
  const mediaGalleryContent = processTemplate(mediaGalleryTemplate, templateVars);
  buildFolder.file("media_gallery.php", mediaGalleryContent);

  // Generate [navmenu.php] file
  const navmenuContent = processTemplate(navmenuTemplate, templateVars);
  buildFolder.file("navmenu.php", navmenuContent);

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
      "build/pageTemplate.php",
      "build/media_gallery.php",
      "build/assets/",
      "build/bootstrap/",
      "build/css/",
      "build/jquery/",
      "build/ie-support/",
      "build/media/",
      "build/modernizr/",
      "package.json",
      "Gruntfile.js",
      "README.md"
    ],
    metadata: templateVars
  };
}

// Copy constant files from latest_core template directory
async function copyConstantFiles(buildFolder, language = "EN") {
  // Make [assets], [bootstrap], [css], [jquery], [ie-support], and [modernizr] folders
    buildFolder.folder("assets");
    const bootstrapFolder = buildFolder.folder("bootstrap");
      bootstrapFolder.folder("css");
      bootstrapFolder.folder("js");
    buildFolder.folder("css");
    buildFolder.folder("jquery");
    buildFolder.folder("ie-support");
    buildFolder.folder("media");
    buildFolder.folder("modernizr");

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

## Generated Files
- \`index.htm\`
- \`pageTemplate.php\` 
- \`media_gallery.php\`

## Copyright

© ${formData.customYear ||
    new Date().getFullYear()} ${formData.splashImageCredit ||
    "The COMET Program"}

---

*Generated by MetEd Lesson Generator*`;
}
