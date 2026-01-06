export default `<?php
/**
 * Print Version for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 */
?>

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Print Version</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Print-specific CSS -->
    <link rel="stylesheet" href="css/module-print.css" media="print">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="print-container">
        <header class="print-header">
            <h1>{{lessonTitle}}</h1>
            <p>Lesson ID: {{lessonID}} | Language: {{lessonLang}}</p>
            <p>&copy; {{copyrightYear}} The COMET Program</p>
        </header>
        
        <main class="print-content">
            <!-- Print content goes here -->
            <p>This is the print-friendly version of your lesson content.</p>
        </main>
        
        <footer class="print-footer">
            <p>Generated on: {{generatedDate}}</p>
        </footer>
    </div>
    
    <script>
        var printVersion = true;
        window.print();
    </script>
</body>
</html>`;