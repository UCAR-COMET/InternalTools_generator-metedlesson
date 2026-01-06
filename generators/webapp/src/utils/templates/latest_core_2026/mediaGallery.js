export default `<?php
/**
 * Media Gallery for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 */
?>

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Media Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meted-base.min.css">
</head>
<body>
    <div class="container">
        <h1>Media Gallery - {{lessonTitle}}</h1>
        <p>Lesson ID: {{lessonID}}</p>
        
        <div class="media-gallery">
            <!-- Media items will be added here -->
        </div>
    </div>
</body>
</html>`;