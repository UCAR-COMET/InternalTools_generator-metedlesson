export default `<?php
/**
 * Download handler for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 * Generated: {{generatedDate}}
 */

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="{{lessonTitle}}_{{lessonID}}.zip"');
header('Content-Transfer-Encoding: binary');

// Add your download logic here
echo "Download functionality for {{lessonTitle}} (ID: {{lessonID}})";
?>`;