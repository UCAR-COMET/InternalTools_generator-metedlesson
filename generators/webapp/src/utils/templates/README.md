# MetEd Lesson Templates

This directory contains organized template collections for different MetEd lesson types.

## Directory Structure

```
templates/
├── index.js                    # Main template collection exports
├── latest_core_2026/          # Latest Core 2026 template collection
│   ├── index.js               # Collection index
│   ├── indexHtml.js          # Main lesson page template
│   ├── download.js           # Download handler template
│   ├── pageTemplate.js       # Page template for multi-page lessons
│   ├── mediaGallery.js       # Media gallery template
│   └── print.js              # Print-friendly version template
└── README.md                 # This file
```

## Usage

### Import All Templates (Recommended)
```javascript
import {
  indexTemplate,
  downloadTemplate,
  pageTemplateTemplate,
  mediaGalleryTemplate,
  printTemplate
} from './templates/index.js'
```

### Import Specific Collection
```javascript
import * as latestCore2026 from './templates/latest_core_2026/index.js'
```

### Import Individual Template
```javascript
import indexTemplate from './templates/latest_core_2026/indexHtml.js'
```

## Template Types

### Latest Core 2026
- **indexHtml.js**: Main lesson homepage with Bootstrap layout
- **download.js**: PHP download handler for lesson packages
- **pageTemplate.js**: Reusable page template for lesson content
- **mediaGallery.js**: Media gallery for lesson assets
- **print.js**: Print-optimized version of lesson content

## Adding New Templates

1. Create a new directory for your template collection (e.g., `legacy_2024/`)
2. Add individual template files using the same naming convention
3. Create an `index.js` file in the collection directory to export all templates
4. Update the main `templates/index.js` to include your new collection
5. Update the generator logic to support the new template type

## Template Variables

All templates support these standard variables:
- `{{lessonTitle}}` - Lesson title
- `{{lessonID}}` - Unique lesson identifier
- `{{lessonLang}}` - Language code (EN/ES/FR)
- `{{lang}}` - HTML language attribute (en/es/fr)
- `{{lessonDesc}}` - Lesson description
- `{{lessonKeys}}` - Comma-separated keywords
- `{{copyrightYear}}` - Copyright year
- `{{splashImageCredit}}` - Image credit text
- `{{narratedSwitch}}` - Boolean for narrated mode
- `{{generatedDate}}` - Generation date

## File Naming Convention

- Use camelCase for JavaScript filenames
- Use descriptive names that match the output file purpose
- End all files with `.js` extension
- Use `default export` for template strings