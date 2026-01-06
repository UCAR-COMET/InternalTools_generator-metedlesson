export default `<?php
/**
 * Page Template for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 * Narrated Version: {{narratedSwitch}}
 */

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Page Template</title>
    <meta name="description" content="{{lessonDesc}}">
    <meta name="keywords" content="{{lessonKeys}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meted-base.min.css">
    
    <!-- Core JS -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>{{lessonTitle}}</h1>
            {{#if narratedSwitch}}
            <div class="narration-controls">
                <button id="textMode" class="btn btn-default">Text Mode</button>
                <button id="narratedMode" class="btn btn-default">Narrated Mode</button>
            </div>
            {{/if}}
        </header>
        
        <main>
            <!-- Page content goes here -->
        </main>
        
        <footer>
            <p>&copy; {{copyrightYear}} The COMET Program</p>
        </footer>
    </div>
</body>
</html>`;