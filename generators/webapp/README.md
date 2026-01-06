# MetEd Lesson Generator - Web Application

A React-based web application for generating MetEd lessons, providing the same functionality as the CLI Yeoman generator but through a user-friendly web interface.

## Features

- **Template Support**: Currently supports Latest Core 2026 template
- **Multi-language**: Support for English, Spanish, and French lessons
- **Interactive Form**: Easy-to-use form for entering lesson metadata
- **Instant Generation**: Generate and download lesson packages as ZIP files
- **Responsive Design**: Built with Tailwind CSS for modern, responsive UI

## Getting Started

### Prerequisites

- Node.js (v16 or higher)
- npm or yarn

### Installation

1. Navigate to the webapp directory:
   ```bash
   cd generators/webapp
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Start the development server:
   ```bash
   npm run dev
   ```

4. Open your browser to `http://localhost:3000`

### Building for Production

```bash
npm run build
```

The built files will be in the `dist/` directory.

## Usage

1. **Fill out the form** with your lesson details:
   - Lesson Title (required)
   - Lesson ID (required)
   - Language (English, Spanish, or French)
   - Description and Keywords
   - MetEd Path Structure

2. **Optional Settings**: Enable additional options for:
   - Custom copyright year
   - Splash image credit
   - Narrated/Text switch functionality

3. **Generate**: Click "Generate Lesson" to create your lesson package

4. **Download**: Preview the generated files and download the ZIP package

## Generated Package Structure

```
lesson-package.zip
├── build/
│   ├── index.htm              # Main lesson page
│   ├── pageTemplate.php       # Page template
│   ├── download.php          # Download handler
│   ├── media_gallery.php     # Media gallery
│   ├── print.php             # Print version
│   ├── css/                  # Stylesheets
│   ├── jquery/               # JavaScript libraries
│   ├── bootstrap/            # Bootstrap framework
│   ├── assets/               # Media assets folder
│   ├── ie-support/           # IE compatibility
│   └── modernizr/            # Feature detection
├── package.json              # Project configuration
├── Gruntfile.js             # Build automation
└── README.md                # Project documentation
```

## Technology Stack

- **React 18** - UI framework
- **Vite** - Build tool and dev server
- **Tailwind CSS** - Styling framework
- **JSZip** - ZIP file generation
- **FileSaver.js** - File download functionality

## Customization

### Adding New Templates

To add support for new lesson templates:

1. Add template definitions in `src/utils/templates.js`
2. Update the form options in `src/components/LessonForm.jsx`
3. Modify the generation logic in `src/utils/lessonGenerator.js`

### Styling

The application uses Tailwind CSS with custom COMET brand colors:
- Primary: `comet-600` (#0284c7)
- Hover: `comet-700` (#0369a1)

## Development

### Project Structure

```
src/
├── components/
│   ├── LessonForm.jsx        # Main form component
│   └── PreviewModal.jsx      # Results preview modal
├── utils/
│   ├── lessonGenerator.js    # Core generation logic
│   └── templates.js          # Template definitions
├── App.jsx                   # Main app component
├── main.jsx                  # Entry point
└── index.css                 # Global styles
```

### Available Scripts

- `npm run dev` - Start development server
- `npm run build` - Build for production
- `npm run lint` - Run ESLint
- `npm run preview` - Preview production build

## Contributing

1. Make changes to the webapp components
2. Test the generation process
3. Ensure responsive design works on all screen sizes
4. Update documentation as needed

## License

© 2026 The COMET Program - UCAR

---

*Part of the MetEd Lesson Generator project*